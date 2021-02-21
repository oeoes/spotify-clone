<?php

namespace App\Http\Controllers\SpotifyClone\Admin;

use App\Http\Controllers\Controller;
use App\Models\Singer;
use Illuminate\Http\Request;

class SingerOfSongController extends Controller
{
    public function store(Request $request)
    {
        Singer::create([
            'artist_id' => $request->artist_id,
            'song_id' => $request->song_id
        ]);
        return back();
    }

    public function delete ($singer) {
        $singer = Singer::where('artist_id', $singer)->first();
        $singer->delete();
        return back();
    }
}
