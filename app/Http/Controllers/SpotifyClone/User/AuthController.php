<?php

namespace App\Http\Controllers\SpotifyClone\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index () {
        return view('app.pages.user.login');
    }

    public function login (Request $request) {
        $remember = $request->remember ? true : false;
        $credentials = ['email' => $request->email, 'password' => $request->password];

        if (!Auth::attempt($credentials, $remember)) {
            return response()->json(['status' => false, 'code' => 400, 'message' => 'Something went wrong']);
        } else {
            return response()->json(['status' => true, 'code' => 200, 'message' => 'Success']);
        }
    }

    public function signup (Request $request) {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'role' => 1
        ]);

        Auth::login($user);

        if (Auth::check()) {
            return response()->json(['status' => true, 'code' => 200, 'message' => 'Success']);
        }
        return response()->json(['status' => false, 'code' => 401, 'message' => 'Unauthorized']);
    }

    public function logout () {
        Auth::logout();
        return back();
    }
}
