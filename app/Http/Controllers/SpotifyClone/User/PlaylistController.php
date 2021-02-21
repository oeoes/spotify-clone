<?php

namespace App\Http\Controllers\SpotifyClone\User;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Library;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlaylistController extends Controller
{
    public function view (Playlist $playlist) {
        $liked_songs = Library::where('type', 'song')->pluck('model_id')->toArray();
        return view('app.pages.user.view-playlist')->with(['playlist' => $playlist, 'liked_songs' => $liked_songs]);
    }

    public function store (Request $request) {
        $dir = 'playlist/user';
        $file_name = Str::uuid() . '.' . $request->file('cover')->extension();
        Playlist::create([
            'user_id' => auth()->user()->id,
            'genre_id' => Genre::where('name', 'General')->first()->id,
            'title' => $request->title,
            'description' => $request->description,
            'cover' => asset('storage') . '/' . uploadPublicFile($request, 'cover', $dir, $file_name)
        ]);

        return back();
    }
}
