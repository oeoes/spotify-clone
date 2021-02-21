<?php

namespace App\Http\Controllers\SpotifyClone\User;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use App\Models\Collection;
use App\Models\Library;
use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function storeToLibrary($type, $model_id)
    {
        try {
            $library = $this->findOrCreate($type, $model_id);
    
            if($library) {
                $library->delete();
                return returnResponse(true, 200, 'Removed from your library.');
            }
    
            return returnResponse(true, 201, 'Added to your library.');
        } catch (\Throwable $th) {
            return returnResponse(false, 400, $th->getMessage());
        }
    }

    public function getModelPath($type)
    {
        switch ($type) {
            case 'collection':
                return Collection::class;
                break;
            case 'artist':
                return Artist::class;
                break;
            case 'song':
                return Song::class;
                break;
            case 'playlist':
                return Playlist::class;
                break;
            default:
                break;
        }
    }

    public function findOrCreate ($type, $model_id) {
        $library = Library::where(['type' => $type, 'user_id' => auth()->user()->id, 'model_id' => $model_id])->first();
        if ($library) return $library;

        Library::create([
            'type' => $type,
            'user_id' => auth()->user()->id,
            'model' => $this->getModelPath($type),
            'model_id' => $model_id
        ]);
        return false;
    }
}
