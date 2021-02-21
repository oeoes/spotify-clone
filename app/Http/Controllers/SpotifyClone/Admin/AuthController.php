<?php

namespace App\Http\Controllers\SpotifyClone\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index () {
        return view('app.pages.admin.login');
    }

    public function login (Request $request) {
        $remember = $request->remember ? true : false;
        $credentials = ['email' => $request->email, 'password' => $request->password, 'role' => 0];

        if (!Auth::attempt($credentials, $remember)) {
            return back();
        } else {
            return redirect()->route('admin.artists.index');
        }
    }

    public function logout () {
        Auth::logout();
        return redirect()->route('admin.auth.login');
    }
}
