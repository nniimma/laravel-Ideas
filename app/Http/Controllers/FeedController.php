<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $followingIds = auth()->user()->followings()->pluck('user_id');

        try {
            $ideas = Idea::whereIn('user_id', $followingIds)->with('user:id,name,image', 'comments.user')->latest();

            // search
            if (request()->has('search')) {
                $ideas = $ideas->search(request('search', ''));
            }
            // search

            return view('ideas.index', ['ideas' => $ideas->paginate(5)]);
        } catch (\Exception $e) {
            return redirect()->route('ideas.index')->with('error', 'Failed to load ideas: ' . $e->getMessage());
        }
    }
}
