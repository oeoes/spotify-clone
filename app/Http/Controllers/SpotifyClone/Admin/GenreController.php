<?php

namespace App\Http\Controllers\SpotifyClone\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GenreController extends Controller
{
    public function index () {
        return view('app.pages.admin.genre')->with(['genres' => Genre::all()]);
    }

    public function store (Request $request) {
        $dir = 'genre';
        $file_name = Str::uuid() .'.'. $request->file('cover')->extension();
        Genre::create([
            'name' => $request->name,
            'description' => $request->description,
            'type' => $request->type,
            'cover' => asset('storage') .'/'. uploadPublicFile($request, 'cover', $dir, $file_name)
        ]);
        return back();
    }

    public function update (Request $request, Genre $genre) {
        $dir = 'genre';
        if ($request->cover) {
            removeUploadedFile([extractUrl($genre->cover, 4)]);
            $file_name = Str::uuid() . '.' . $request->file('cover')->extension();

            $genre->update([
                'name' => $request->name,
                'description' => $request->description,
                'type' => $request->type,
                'cover' => asset('storage') . '/' . uploadPublicFile($request, 'cover', $dir, $file_name)
            ]);
        } else {
            $genre->update([
                'name' => $request->name,
                'description' => $request->description,
                'type' => $request->type,
            ]);
        }

        return back();
    }

    public function delete (Genre $genre) {
        removeUploadedFile([extractUrl($genre->cover, 4)]);
        $genre->delete();
        return back();
    }
}
