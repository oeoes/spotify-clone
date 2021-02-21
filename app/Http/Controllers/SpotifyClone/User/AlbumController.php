<?php

namespace App\Http\Controllers\SpotifyClone\User;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Library;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function view(Collection $album)
    {
        $liked = Library::where(['type' => 'collection', 'model_id' => $album->id])->first() ? true : false;
        $liked_songs = Library::where('type', 'song')->pluck('model_id')->toArray();
        return view('app.pages.user.view-album')->with(['album' =>  $album, 'liked_songs' => $liked_songs, 'liked' => $liked]);
    }
}
