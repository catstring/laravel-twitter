<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;
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
// Route::post('/ideas', [IdeaController::class, 'store'])->name('ideas.store');
// Route::get('/ideas/{idea}', [IdeaController::class, 'show'])->name('ideas.show');
// Route::get('/ideas/{idea}/edit', [IdeaController::class, 'edit'])->name('ideas.edit')->middleware('auth');
// Route::put('/ideas/{idea}', [IdeaController::class, 'update'])->name('ideas.update')->middleware('auth');
// Route::delete('/ideas{idea}', [IdeaController::class, 'destroy'])->name('ideas.destroy')->middleware('auth');
// Route::post('/ideas/{idea}/comments', [CommentController::class, 'store'])->name('ideas.comments.store')->middleware('auth');



// Route::group(['prefix' => 'ideas/', 'as' => 'ideas.'], function () {
    // #A
    // Route::get('/ideas/{idea}', [IdeaController::class, 'show'])->name('show');

    // Route::group(['middleware' => ['auth']], function () {
        // #A
        // Route::post('/ideas', [IdeaController::class, 'store'])->name('store');
        // Route::get('/ideas/{idea}/edit', [IdeaController::class, 'edit'])->name('edit');
        // Route::put('/ideas/{idea}', [IdeaController::class, 'update'])->name('update');
        // Route::delete('/ideas{idea}', [IdeaController::class, 'destroy'])->name('destroy');

        // #B
        // Route::post('/ideas/{idea}/comments', [CommentController::class, 'store'])->name('comments.store');
    // });
// });

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
// #A
Route::resource('ideas',IdeaController::class)->except(['index','create','show'])->middleware('auth');
Route::resource('ideas',IdeaController::class)->only(['show']);
// #B
Route::resource('ideas.comments',CommentController::class)->only(['store'])->middleware('auth');

Route::resource('users',UserController::class)->only('show','edit','update')->middleware('auth');

// Route::get('/profile', [ProfileController::class , 'index']);

Route::get('/terms', function () {
    return view('terms');
});
