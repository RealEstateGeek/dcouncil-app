<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function login()
    {
        // Show the login page to accept email/password
        return view('sessions.login');
    }

    public function store()
    {
        // validate POST data
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // log the user in with supplied credentials
        if (auth()->attempt($attributes)) {
            return redirect('/posts')->with('registerSuccess', 'Welcome back!');
        }

        // redirect back to login form with errors
        return back()
            ->withInput()
            ->withErrors([
                'email' => 'Your credentials could not be verified',
            ]);
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/posts')->with('registerSuccess', 'Goodbye!');
    }
}
