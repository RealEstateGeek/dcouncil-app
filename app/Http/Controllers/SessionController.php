<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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

        // attempt to log the user in with supplied credentials
        if (!auth()->attempt($attributes)) {
            // redirect back to login form with errors
            throw ValidationException::withMessages([
                'email' => 'Your credentials could not be verified',
            ]);
        }

        session()->regenerate();

        return redirect('/posts')->with('registerSuccess', 'Welcome back!');
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/posts')->with('registerSuccess', 'Goodbye!');
    }
}
