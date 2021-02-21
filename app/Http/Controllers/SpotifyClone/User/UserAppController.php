<?php

namespace App\Http\Controllers\SpotifyClone\User;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Library;
use App\Models\Playlist;
use Illuminate\Http\Request;

class UserAppController extends Controller
{
    public function home () {
        $playlists = Playlist::limit(3)->orderBy('title', 'DESC')->get();
        $mood = Genre::where(['type' => 'mood', 'name' => 'Mood'])->first();
        return view('app.pages.user.home')->with(['playlists' => $playlists, 'mood' => $mood]);
    }

    public function browses () {
        $genres = Genre::where('name', '!=', 'General')->get();
        $podcasts = [];
        return view('app.pages.user.browse')->with(['genres' => $genres, 'podcasts' => $podcasts]);
    }

    public function albums()
    {
        $liked_collections = Library::where(['type' => 'collection', 'user_id' => auth()->user()->id])->get();
        return view('app.pages.user.album')->with('liked_collections', $liked_collections);
    }

    public function artists()
    {
        $lib_artists = Library::where(['user_id' => auth()->user()->id, 'type' => 'artist'])->get();
        $artists = [];
        foreach ($lib_artists as $lib) {
            $artist = $lib->model::find($lib->model_id);
            
            array_push($artists, $artist);
        }
        return view('app.pages.user.artist')->with('artists', $artists);
    }

    public function likedSongs () {
        $liked_songs = Library::where('type', 'song')->get();
        return view('app.pages.user.liked-song')->with('liked_songs', $liked_songs);
    }

    public function queue () {
        return view('app.pages.user.queue');
    }
}
