<?php

use App\Http\Controllers\IdeaController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/terms', function () {
    return view('terms');
});

// ideas
Route::get('/', [IdeaController::class, 'index'])->name('ideas.index');
Route::resource('ideas', IdeaController::class)->middleware('auth')->except(['index', 'show', 'create']);
Route::resource('ideas', IdeaController::class)->only(['show']);
// ideas

// comments
Route::post('/ideas/{idea}/comment', [CommentController::class, 'store'])->name('ideas.comments.store')->middleware('auth');
// the same code above with resource:
// todo: Route::resource('ideas.comments', CommentController::class)->only(['store'])->middleware('auth');
// comments

// profile
Route::resource('users', UserController::class)->middleware('auth')->only(['show', 'edit', 'update']);
// profile