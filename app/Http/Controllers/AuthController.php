<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostLoginRequest;
use App\Http\Requests\PostRegisterRequest;
use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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


        try {
            DB::beginTransaction();

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            Mail::to($user->email)->send(new WelcomeEmail($user));

            DB::commit();

            return redirect()->route('ideas.index')->with('success', 'Account created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('register')->with('error', 'Failed to create idea: ' . $e->getMessage());
        }
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(PostLoginRequest $request)
    {
        if (auth()->attempt($request->validated())) {
            request()->session()->regenerate();
            return redirect()->route('ideas.index')->with('success', 'Logged in successfully.');
        }
        return redirect()->route('login')->with('error', 'Something went wrong please try again.');
    }

    public function logout()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
}
