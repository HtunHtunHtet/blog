<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Good Bye!');
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        // validation
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        //attempt to authenticate and login the user
        // based on the provided credentials
        if (! auth()->attempt($attributes)) {
            /**
             * Returning with validation message , Approach 1.
             */
            throw ValidationException::withMessages([
                'email' => 'You provided credential could not be verified.',
            ]);

            /**
             * Returning with validation message , Approach 2.
             */
            //return back()
            //    ->withInput()
            //    ->withErrors(['email' => 'Invalid email credential']);
        }

        session()->regenerate();

        return redirect('/')->with('success', 'Welcome back!');
    }
}
