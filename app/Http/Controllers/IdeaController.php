<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIdeaRequest;
use App\Models\Idea;

class IdeaController extends Controller
{
    public function index()
    {
        $ideas = Idea::orderBy('created_at', 'DESC')->paginate(5);

        return view('ideas.index', compact('ideas'));
    }

    public function show(Idea $idea)
    {
        return view('ideas.show', compact('idea'));
    }

    public function store(StoreIdeaRequest $request)
    {
        try {
            Idea::create([
                'content' => $request->idea,
            ]);

            return redirect()->route('idea.index')->with('success', 'Idea created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('idea.index')->with('error', 'Failed to create idea: ' . $e->getMessage());
        }
    }

    public function destroy(Idea $idea)
    {
        try {
            $idea->delete();

            return redirect()->route('idea.index')->with('success', 'Idea deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('idea.index')->with('error', 'Failed to delete idea: ' . $e->getMessage());
        }
    }
}
