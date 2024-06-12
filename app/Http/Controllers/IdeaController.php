<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIdeaRequest;
use App\Models\Idea;

class IdeaController extends Controller
{
    public function index()
    {
        $ideas = Idea::orderBy('created_at', 'DESC')->paginate(5);

        return view('ideas.index', ['ideas' => $ideas]);
    }

    public function store(StoreIdeaRequest $request)
    {
        Idea::Create(
            [
                'content' => $request->idea
            ]
        );

        return redirect()->route('idea.index')->with('success', 'Idea created successfully.');
    }
}
