<?php

namespace App\Http\Controllers;

use App\Models\User;

class FollowerController extends Controller
{
    public function follow(User $user)
    {
        $follower = auth()->user();

        try {
            $follower->followings()->attach($user);

            return redirect()->route('users.show', $user->id)->with('success', 'User followed successfully.');
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', 'Failed to follow the user: ' . $e->getMessage());
        }
    }

    public function unfollow(User $user)
    {
        $follower = auth()->user();

        try {
            $follower->followings()->detach($user);

            return redirect()->route('users.show', $user->id)->with('success', 'User unfollowed successfully.');
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', 'Failed to unfollow the user: ' . $e->getMessage());
        }
    }
}
