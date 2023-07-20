<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'max:255', 'min:3', Rule::unique('user', 'username')],
            'email' => ['required', 'email', 'max:255', Rule::unique('user', 'email')],
            'password' => ['required', 'min:7', 'max:255'],
        ]);

        $user = User::create($attributes);

        // log the user in
        auth()->login($user);

        return redirect('/')->with('success', 'Your account has been created');
    }

    public function create()
    {
        return view('register.create');
    }
}
