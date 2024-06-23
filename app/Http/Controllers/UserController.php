<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $ideas = $user->ideas()->paginate(5);
        return view('users.show', compact('user', 'ideas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        try {
            $this->authorize('update', $user);

            $ideas = $user->ideas()->paginate(5);
            return view('users.edit', compact('user', 'ideas'));
        } catch (\Exception $e) {
            return redirect()->route('users.show', $user->id)->with('error', 'Failed to update profile: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            $validated = $request->validated();

            if ($request->image) {
                $imagePath = $request->image->store('profile', 'public');
                $validated['image'] = $imagePath;

                if ($user->image) {
                    // delete the last uploaded image:
                    Storage::disk('public')->delete($user->image);
                }
            }

            $user->update($validated);

            return redirect()->route('users.show', $user->id)->with('success', 'Profile updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('users.show', $user->id)->with('error', 'Failed to update profile: ' . $e->getMessage());
        }
    }
}
