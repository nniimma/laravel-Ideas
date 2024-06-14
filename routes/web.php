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
Route::middleware(['auth'])->prefix('ideas')->as('idea.')->group(function () {
    Route::get('/{idea}', [IdeaController::class, 'show'])->name('show')->withoutMiddleware('auth');
    Route::get('/{idea}/edit', [IdeaController::class, 'edit'])->name('edit');
    Route::post('', [IdeaController::class, 'store'])->name('store');
    Route::put('/{idea}', [IdeaController::class, 'update'])->name('update');
    Route::delete('/{idea}', [IdeaController::class, 'destroy'])->name('destroy');
});
// ideas

// comments
Route::post('/ideas/{idea}/comment', [CommentController::class, 'store'])->name('idea.comment.store');
// comments

// Auth
Route::middleware(['guest'])->group(function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store'])->name('register.store');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('login.store');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
// Auth