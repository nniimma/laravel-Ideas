<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function index()
    {
        $ideas = Idea::latest()->paginate(10);

        return view('admin.ideas.index', compact('ideas'));
    }

    public function destroy(Idea $idea)
    {
        try {
            $idea->delete();

            return redirect()->route('admin.ideas.index')->with('success', 'Idea deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.ideas.index')->with('error', 'Failed to delete idea: ' . $e->getMessage());
        }
    }
}
