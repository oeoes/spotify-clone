<?php

namespace App\Http\Controllers\SpotifyClone\User;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use App\Models\Collection;
use App\Models\Library;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function view (Artist $artist) {
        $liked_collection = Library::where(['type' => 'collection', 'user_id' => auth()->user()->id])->pluck('model_id')->toArray();
        $albums = Collection::where('artist_id', $artist->id)->album()->get()->makeHidden(['created_at', 'updated_at']);
        $single_eps = Collection::where('artist_id', $artist->id)->singleAndEp()->get()->makeHidden(['created_at', 'updated_at']);
        return view('app.pages.user.view-artist')->with(['artist' => $artist, 'albums' => $albums, 'single_eps' => $single_eps, 'popular' => [], 'fans' => [], 'liked_collection' => $liked_collection]);
    }
}
