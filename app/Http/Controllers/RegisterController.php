<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:255', 'min:4', Rule::unique('users', 'name')],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'min:7', 'max:255'],
        ]);

        $user = User::create($attributes);

        // Here we want to log the user in, using session via Auth helper
        auth()->login($user);

        // Redirect to home page, with message sent to session under registerSuccess key
        return redirect('/posts')->with('registerSuccess', 'Your account was successfully created');
    }
}
