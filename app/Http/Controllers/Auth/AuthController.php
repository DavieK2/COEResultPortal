<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login()
    {
        $data = request()->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if (! auth()->attempt( $data ) ) {
            return back()->withErrors([
                'error' => 'The provided credentials do not match our records.',
            ]);
        }

        return redirect()->intended('/upload-result');

    }
}
