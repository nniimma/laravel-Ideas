<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Idea;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalComments = Comment::count();
        $totalIdeas = Idea::count();

        return view('admin.index', compact(['totalUsers', 'totalIdeas', 'totalComments']));
    }
}
