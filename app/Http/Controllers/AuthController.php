<?php

namespace App\Http\Controllers;

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
}
