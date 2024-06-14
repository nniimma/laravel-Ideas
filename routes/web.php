<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\CommentController;
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
Route::get('/', [IdeaController::class, 'index'])->name('idea.index');
Route::get('/ideas/{idea}', [IdeaController::class, 'show'])->name('idea.show');
Route::get('/ideas/{idea}/edit', [IdeaController::class, 'edit'])->name('idea.edit');
Route::post('/ideas', [IdeaController::class, 'store'])->name('idea.store');
Route::put('/ideas/{idea}', [IdeaController::class, 'update'])->name('idea.update');
Route::delete('/ideas/{idea}', [IdeaController::class, 'destroy'])->name('idea.destroy');
// ideas

// comments
Route::post('/ideas/{idea}/comment', [CommentController::class, 'store'])->name('idea.comment.store');
// comments

// Auth
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');
// Auth