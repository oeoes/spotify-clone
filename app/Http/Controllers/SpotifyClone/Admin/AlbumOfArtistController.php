<?php

namespace App\Http\Controllers\SpotifyClone\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use App\Models\Collection;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AlbumOfArtistController extends Controller
{
    public function view (Collection $album) {
        $artists = Artist::all();
        return view('app.pages.admin.view-album')->with(['album' => $album, 'artists' => $artists]);
    }

    public function store (Request $request) {
        $dir = 'collection';
        $file_name = Str::uuid() . '.' . $request->file('cover')->extension();
        Collection::create([
            'artist_id' => $request->artist_id,
            'title' => $request->title,
            'year' => $request->year,
            'publisher' => $request->publisher,
            'collection_type' => $request->collection_type,
            'cover' => asset('storage'). '/' . uploadPublicFile($request, 'cover', $dir, $file_name)
        ]);
        return back();
    }

    public function update (Request $request, Collection $album) {
        $dir = 'collection';
        if ($request->cover) {
            removeUploadedFile([extractUrl($album->cover, 4)]);

            $file_name = Str::uuid() . '.' . $request->file('cover')->extension();
            $album->update([
                'title' => $request->title,
                'year' => $request->year,
                'publisher' => $request->publisher,
                'collection_type' => $request->collection_type,
                'cover' => asset('storage') . '/' . uploadPublicFile($request, 'cover', $dir, $file_name)
            ]);
        } else {
            $album->update([
                'title' => $request->title,
                'year' => $request->year,
                'publisher' => $request->publisher,
                'collection_type' => $request->collection_type,
            ]);
        }

        return back();
    }

    public function delete (Collection $album) {
        foreach ($album->songs as $song) {
            removeUploadedFile([extractUrl($song->audio, 4)]);
        }
        $album->delete();
        return back();
    }
}
