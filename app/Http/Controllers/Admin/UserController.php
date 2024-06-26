<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();

            return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
        } catch (Exception $e) {
            return redirect()->route('admin.users.index')->with('error', 'An error occurred while deleting the user');
        }
    }

    public function updateToUser(User $user)
    {
        try {
            if ($user->id == 1) {
                return redirect()->route('admin.users.index')->with('error', "Super admin can't be normal user!");
            }

            $user->is_admin = 0;
            $user->updated_at = Carbon::now();
            $user->save();

            return redirect()->route('admin.users.index')->with('success', 'Admin updated to user successfully');
        } catch (Exception $e) {
            return redirect()->route('admin.users.index')->with('error', 'An error occurred while deleting the user');
        }
    }

    public function updateToAdmin(User $user)
    {
        try {
            $user->is_admin = 1;
            $user->updated_at = Carbon::now();
            $user->save();

            return redirect()->route('admin.users.index')->with('success', 'User Updated to admin successfully');
        } catch (Exception $e) {
            return redirect()->route('admin.users.index')->with('error', 'An error occurred while deleting the user');
        }
    }
}
