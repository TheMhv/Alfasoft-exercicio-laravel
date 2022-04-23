<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'user' => 'required',
            'password' => 'required|alphaNum|min:3'
        ]);

        $user_data = [
            'user' => $request->user,
            'password' => $request->password
        ];

        if (Auth::attempt($user_data)) {
            return redirect('/');
        }

        return redirect()->route('login')->withErrors([
            'user' => 'Wrong Login Details'
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
