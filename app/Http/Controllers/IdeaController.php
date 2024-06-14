<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;
use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function index()
    {
        try {
            $ideas = Idea::orderBy('created_at', 'DESC');

            // search
            if (request()->has('search')) {
                $ideas = $ideas->where('content', 'like', '%' . request()->get('search') . '%');
            }
            // search

            return view('ideas.index', ['ideas' => $ideas->paginate(5)]);
        } catch (\Exception $e) {
            return redirect()->route('idea.index')->with('error', 'Failed to load ideas: ' . $e->getMessage());
        }
    }

    public function show(Idea $idea)
    {
        return view('ideas.show', compact('idea'));
    }

    public function edit(Idea $idea)
    {
        if (auth()->id() !== $idea->user_id) {
            // abort(404, 'Only the writer of the comment can delete it.');
            return redirect()->route('idea.index')->with('error', "You can't edit this idea.");
        }

        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function store(StoreIdeaRequest $request)
    {
        try {
            Idea::create([
                'content' => $request->idea,
                'user_id' => auth()->id()
            ]);

            return redirect()->route('idea.index')->with('success', 'Idea created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('idea.index')->with('error', 'Failed to create idea: ' . $e->getMessage());
        }
    }

    public function update(UpdateIdeaRequest $request, Idea $idea)
    {
        if (auth()->id() !== $idea->user_id) {
            return redirect()->route('idea.index')->with('error', "You can't edit this idea.");
        }

        try {
            $idea->update([
                'content' => $request->content,
            ]);

            return redirect()->route('idea.show', $idea)->with('success', 'Idea updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('idea.index')->with('error', 'Failed to update idea: ' . $e->getMessage());
        }
    }

    public function destroy(Idea $idea)
    {
        if (auth()->id() !== $idea->user_id) {
            return redirect()->route('idea.index')->with('error', "You can't delete this idea.");
        }

        try {
            $idea->delete();

            return redirect()->route('idea.index')->with('success', 'Idea deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('idea.index')->with('error', 'Failed to delete idea: ' . $e->getMessage());
        }
    }
}
