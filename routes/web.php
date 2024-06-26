<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\IdeaController as AdminIdeaController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\LikeController;
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
})->name('terms');

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
Route::resource('users', UserController::class)->middleware('auth')->only(['edit', 'update']);
Route::resource('users', UserController::class)->only(['show']);
// profile

// follow/unfollow
Route::post('users/{user}/follow', [FollowerController::class, 'follow'])->name('users.follow')->middleware('auth');
Route::post('users/{user}/unfollow', [FollowerController::class, 'unfollow'])->name('users.unfollow')->middleware('auth');
// follow/unfollow

// like/unlike
Route::post('ideas/{idea}/like', [LikeController::class, 'like'])->name('ideas.like')->middleware('auth');
Route::post('ideas/{idea}/unlike', [LikeController::class, 'unlike'])->name('ideas.unlike')->middleware('auth');
// like/unlike

// feed
Route::get('/feed', FeedController::class)->name('feed')->middleware('auth');
// feed

// admin
Route::middleware(['auth', 'can:admin'])->prefix('/admin')->as('admin.')->group(function () {
    // dashboard
    Route::get('/', [AdminController::class, 'index'])->name('index');
    // dashboard

    // users
    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
    Route::patch('/users/{user}/toAdmin', [AdminUserController::class, 'updateToAdmin'])->name('users.updateToAdmin');
    Route::patch('/users/{user}/toUser', [AdminUserController::class, 'updateToUser'])->name('users.updateToUser');
    Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');
    // users

    // ideas
    Route::get('/ideas', [AdminIdeaController::class, 'index'])->name('ideas.index');
    // ideas

});
// admin

// dynamic language
Route::get('lang/{lang}', function ($lang) {
    app()->setLocale($lang);
    session()->put('locale', $lang);

    return redirect()->route('ideas.index');
})->name('lang');
// dynamic language
