<?php

namespace App\Http\Controllers\SpotifyClone\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAppController extends Controller
{
    public function home () {
        return view('app.pages.admin.home');
    }

    public function viewArtist () {
        return view('app.pages.admin.view-artist');
    }

    public function viewAlbum () {
        return view('app.pages.admin.view-album');
    }

    public function genre () {
        return view('app.pages.admin.genre');
    }

    public function playlist () {
        return view('app.pages.admin.playlist');
    }

    public function viewPlaylist () {
        return view('app.pages.admin.view-playlist');
    }
}
