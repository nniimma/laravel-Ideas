<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;
use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class IdeaController extends Controller
{
    public function index()
    {
        try {
            $ideas = Idea::with('user:id,name,image', 'comments.user')->orderBy('created_at', 'DESC');

            // search
            if (request()->has('search')) {
                $ideas = $ideas->where('content', 'like', '%' . request()->get('search') . '%');
            }
            // search

            return view('ideas.index', ['ideas' => $ideas->paginate(5)]);
        } catch (\Exception $e) {
            return redirect()->route('ideas.index')->with('error', 'Failed to load ideas: ' . $e->getMessage());
        }
    }

    public function show(Idea $idea)
    {
        return view('ideas.show', compact('idea'));
    }

    public function edit(Idea $idea)
    {
        try {
            $this->authorize('update', $idea);
            $editing = true;
            return view('ideas.show', compact('idea', 'editing'));
        } catch (\Exception $e) {
            return redirect()->route('ideas.index')->with('error', 'Just admin or owner can edit this idea.' . $e->getMessage());
        }
    }

    public function store(StoreIdeaRequest $request)
    {
        try {
            Idea::create([
                'content' => $request->idea,
                'user_id' => auth()->id()
            ]);

            return redirect()->route('ideas.index')->with('success', 'Idea created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('ideas.index')->with('error', 'Failed to create idea: ' . $e->getMessage());
        }
    }

    public function update(UpdateIdeaRequest $request, Idea $idea)
    {
        try {
            $this->authorize('update', $idea);

            $idea->update([
                'content' => $request->content,
            ]);

            return redirect()->route('ideas.show', $idea->id)->with('success', 'Idea updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('ideas.index')->with('error', 'Failed to update idea: ' . $e->getMessage());
        }
    }

    public function destroy(Idea $idea)
    {
        try {
            $this->authorize('delete', $idea);

            $idea->delete();

            return redirect()->route('ideas.index')->with('success', 'Idea deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('ideas.index')->with('error', 'Failed to delete idea: ' . $e->getMessage());
        }
    }
}
