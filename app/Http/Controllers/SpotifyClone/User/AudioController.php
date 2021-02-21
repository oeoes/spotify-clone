<?php

namespace App\Http\Controllers\SpotifyClone\User;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Http\Request;

class AudioController extends Controller
{
    public function playSong (Song $song) {
        $data = [
            'song' => $song,
            'collection' => $song->collection,
            'artist' => $song->collection->artist,
        ];
        return returnResponse(true, 200, 'OK', $data);
    }

    public function playCollection (Collection $collection) {
        $data = [
            'song' => $collection->songs,
            'collection' => $collection,
            'artist' => $collection->artist,
        ];
        return returnResponse(true, 200, 'OK', $data);
    }

    public function playPlaylist (Playlist $playlist) {
        $songObject = [];
        foreach ($playlist->songs as $key => $song) {
            $song_lists = [];
            $song_lists['id'] = $song->id;
            $song_lists['title'] = $song->title;
            $song_lists['duration'] = $song->duration;
            $song_lists['audio'] = $song->audio;
            $song_lists['collection_id'] = $song->collection_id;
            $song_lists['collection_title'] = $song->collection->title;
            $song_lists['cover'] = $song->collection->cover;
            $song_lists['artist_id'] = $song->collection->artist->id;
            $song_lists['picture'] = $song->collection->artist->profile_picture;
            $song_lists['name'] = $song->collection->artist->full_name;
            array_push($songObject, $song_lists);
        }
        return returnResponse(true, 200, 'OK', $songObject);
    }

    public function scrubbing ($contentType, $path) {
        $fullsize = filesize($path);
        $size = $fullsize;
        $stream = fopen($path, "r");
        $response_code = 200;
        $headers = array("Content-type" => $contentType);

        // Check for request for part of the stream
        $range = Request::header('Range');
        if ($range != null) {
            $eqPos = strpos($range, "=");
            $toPos = strpos($range, "-");
            $unit = substr($range, 0, $eqPos);
            $start = intval(substr($range, $eqPos + 1, $toPos));
            $success = fseek($stream, $start);
            if ($success == 0) {
                $size = $fullsize - $start;
                $response_code = 206;
                $headers["Accept-Ranges"] = $unit;
                $headers["Content-Range"] = $unit . " " . $start . "-" . ($fullsize - 1) . "/" . $fullsize;
            }
        }

        $headers["Content-Length"] = $size;
        return $headers;
    }

}
