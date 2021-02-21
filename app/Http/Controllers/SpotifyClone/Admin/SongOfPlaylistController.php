<?php

namespace App\Http\Controllers\SpotifyClone\Admin;

use App\Http\Controllers\Controller;
use App\Models\PlaylistSong;
use Illuminate\Http\Request;

class SongOfPlaylistController extends Controller
{
    public function store (Request $request) {
        PlaylistSong::create([
            'playlist_id' => $request->playlist_id,
            'song_id' => $request->song_id
        ]);

        return back();
    }

    public function delete ($song) {
        $ps = PlaylistSong::where('song_id', $song)->first();
        $ps->delete();
        return back();
    }
}
