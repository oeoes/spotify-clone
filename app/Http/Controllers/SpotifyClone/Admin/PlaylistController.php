<?php

namespace App\Http\Controllers\SpotifyClone\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlaylistController extends Controller
{
    public function index()
    {
        $playlists = Playlist::all();
        $genres = Genre::all();
        return view('app.pages.admin.playlist')->with(['playlists' => $playlists, 'genres' => $genres]);
    }

    public function view (Playlist $playlist) {
        $songs = Song::all();
        return view('app.pages.admin.view-playlist')->with(['playlist' => $playlist, 'songs' => $songs]);
    }

    public function store(Request $request)
    {
        $dir = 'playlist';
        $file_name = Str::uuid() .'.'. $request->file('cover')->extension();
        Playlist::create([
            'user_id' => auth()->user()->id,
            'genre_id' => $request->genre_id,
            'title' => $request->title,
            'description' => $request->description,
            'cover' => asset('storage') .'/'. uploadPublicFile($request, 'cover', $dir, $file_name)
        ]);

        return back();
    }

    public function update (Request $request, Playlist $playlist) {
        $dir = 'playlist';
        if ($request->cover) {
            removeUploadedFile([extractUrl($playlist->cover, 4)]);

            $file_name = Str::uuid() . '.' . $request->file('cover')->extension();
            $playlist->update([
                'genre_id' => $request->genre_id,
                'title' => $request->title,
                'description' => $request->description,
                'cover' => asset('storage') . '/' . uploadPublicFile($request, 'cover', $dir, $file_name)
            ]);
        } else {
            $playlist->update([
                'genre_id' => $request->genre_id,
                'title' => $request->title,
                'description' => $request->description,
            ]);
        }

        return back();
    }

    public function delete (Playlist $playlist) {
        removeUploadedFile([extractUrl($playlist->cover, 4)]);
        $playlist->delete();
        return back();
    }
}
