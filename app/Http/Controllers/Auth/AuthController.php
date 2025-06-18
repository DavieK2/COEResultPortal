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

        
        if( auth()->user()->email === 'lecturer@coe.com' ) {

            return redirect('/uploads');
        }



        if( auth()->user()->email === 'hod@coe.com' ) {
            
            return redirect('/admin/results');
        }

      

    }
}
