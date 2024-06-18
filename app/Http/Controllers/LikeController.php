<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Idea $idea)
    {
        try {
            $liker = auth()->user();
            $liker->likes()->attach($idea);

            return redirect()->route('ideas.show', $idea->id)->with('success', 'Idea liked successfully.');
        } catch (\Exception $e) {
            return redirect()->route('ideas.show', $idea->id)->with('error', 'Failed to like ideas: ' . $e->getMessage());
        }
    }

    public function unlike(Idea $idea)
    {
        try {
            $liker = auth()->user();
            $liker->likes()->detach($idea);

            return redirect()->route('ideas.show', $idea->id)->with('success', 'Idea unliked successfully.');
        } catch (\Exception $e) {
            return redirect()->route('ideas.show', $idea->id)->with('error', 'Failed to unlike ideas: ' . $e->getMessage());
        }
    }
}
