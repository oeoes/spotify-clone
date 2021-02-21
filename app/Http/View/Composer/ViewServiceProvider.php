<?php

namespace App\Http\View\Composer;

use App\Models\Library;
use Illuminate\Support\ServiceProvider;
use App\Models\Playlist;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{

    public function regiter () {
        // your code here
    }

    public function boot () {
        View::composer('app.layouts.sidebar', function ($view) {
            $playlists = Playlist::where('user_id', auth()->user()->id)->get(['id', 'title']);
            $libraries = Library::where(['user_id' => auth()->user()->id, 'type' => 'playlist'])->get();
            $lib_collect = [];
            foreach ($libraries as $key => $playlist) {
                $res = $playlist->model::where('id', $playlist->model_id)->select('id', 'title')->first();
                array_push($lib_collect, $res);
            }

            $concatenated = $playlists->concat($lib_collect);
            
            return $view->with('my_playlists', $concatenated);
        });
    }
}