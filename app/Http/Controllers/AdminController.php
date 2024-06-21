<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function index()
    {
        if (!Gate::allows('admin')) {
            return redirect()->route('ideas.index')->with('error', 'Just admin can access this page.');
        }

        return view('admin.index');
    }
}
