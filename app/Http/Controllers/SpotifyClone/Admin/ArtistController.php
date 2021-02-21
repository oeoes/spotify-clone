<?php

namespace App\Http\Controllers\SpotifyClone\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::all();
        return view('app.pages.admin.artist')->with(['artists' => $artists]);
    }

    public function view(Artist $artist)
    {
        $albums = Collection::where('artist_id', $artist->id)->album()->get()->makeHidden(['created_at', 'updated_at']);
        $single_eps = Collection::where('artist_id', $artist->id)->singleAndEp()->get()->makeHidden(['created_at', 'updated_at']);

        return view('app.pages.admin.view-artist')->with(['artist' => $artist, 'albums' => $albums, 'single_eps' => $single_eps, 'popular' => [], 'fans' => []]);
    }

    public function store(Request $request)
    {
        $dir = 'artist';
        $pict_file_name = Str::uuid() . '.' . $request->file('profile_picture')->extension();
        $bann_file_name = Str::uuid() . '.' . $request->file('profile_banner')->extension();

        Artist::create([
            'full_name' => $request->full_name,
            'bio' => $request->bio,
            'profile_picture' => asset('storage') . '/' . uploadPublicFile($request, 'profile_picture', $dir, 'picture_' . $pict_file_name),
            'profile_banner' => asset('storage') . '/' . uploadPublicFile($request, 'profile_banner', $dir, 'banner_' . $bann_file_name),
        ]);
        return back();
    }

    public function update(Request $request, Artist $artist)
    {
        $dir = 'artist';

        if ($request->profile_picture) {
            removeUploadedFile([extractUrl($artist->profile_picture, 4)]);
            $artist->update([
                'full_name' => $request->full_name,
                'bio' => $request->bio,
                'profile_picture' => asset('storage') . '/' . uploadPublicFile($request, 'profile_picture', $dir, 'picture_' . Str::uuid() . '.' . $request->file('profile_picture')->extension()),
            ]);
        } else if ($request->profile_banner) {
            removeUploadedFile([extractUrl($artist->profile_banner, 4)]);
            $artist->update([
                'full_name' => $request->full_name,
                'bio' => $request->bio,
                'profile_banner' => asset('storage') . '/' . uploadPublicFile($request, 'profile_banner', $dir, 'banner_' . Str::uuid() . '.' . $request->file('profile_banner')->extension()),
            ]);
        } else {
            $artist->update([
                'full_name' => $request->full_name,
                'bio' => $request->bio,
            ]);
        }
        return back();
    }

    public function delete(Artist $artist)
    {
        removeUploadedFile([
            extractUrl($artist->profile_picture, 4),
            extractUrl($artist->profile_banner, 4)
        ]);

        $artist->delete();
        return back();
    }
}
