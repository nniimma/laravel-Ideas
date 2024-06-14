<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostLoginRequest;
use App\Http\Requests\PostRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(PostRegisterRequest $request)
    {
        // to make a new user
        // todo: validation
        // todo: create the user
        // todo: do the login
        // todo: redirect

        $request->validated();

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('idea.index')->with('success', 'Account created successfully.');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(PostLoginRequest $request)
    {
        if (auth()->attempt($request->validated())) {
            request()->session()->regenerate();
            return redirect()->route('idea.index')->with('success', 'Logged in successfully.');
        }
        return redirect()->route('login')->with('error', 'Something went wrong please try again.');
    }
}
