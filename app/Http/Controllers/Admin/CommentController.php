<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::latest()->paginate(10);

        return view('admin.comments.index', compact('comments'));
    }

    public function destroy(Comment $comment)
    {
        try {
            $comment->delete();

            return redirect()->route('admin.comments.index')->with('success', 'Comment deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.comments.index')->with('error', 'Failed to delete idea: ' . $e->getMessage());
        }
    }
}
