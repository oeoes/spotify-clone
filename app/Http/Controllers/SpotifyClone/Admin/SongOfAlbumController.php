<?php

namespace App\Http\Controllers\SpotifyClone\Admin;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Singer;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SongOfAlbumController extends Controller
{
    public function store (Request $request) {
        $dir = 'collection/audio';
        $file_name = Str::uuid() . '.' . $request->file('audio')->getClientOriginalExtension();
        
        $song = Song::create([
            'collection_id' => $request->collection_id,
            'title' => $request->title,
            'duration' => $request->duration,
            'audio' => asset('storage') .'/'. uploadPublicFile($request, 'audio', $dir, $file_name)
        ]);

        // store singer
        Singer::create([
            'artist_id' => Collection::find($request->collection_id)->artist_id,
            'song_id' => $song->id
        ]);
        return back();
    }

    public function delete (Song $song) {
        removeUploadedFile([extractUrl($song->audio, 4)]);
        $song->delete();
        return back();
    }
}
