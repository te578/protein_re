<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikesController;
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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('index')->middleware('auth');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create'); 
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show'); 
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store'); 
    Route::post('/like', [LikesController::class, 'toggleLike'])->name('like.toggle');
    Route::get('/mypage',[PostController::class,'mypage'])->name('posts.mypage')->middleware('auth');
    Route::delete('/posts/{post}', [PostController::class,'delete']);
    Route::get('/posts/{post}/edit',[PostController::class,'edit']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/like/{id}', [LikesController::class,'like'])->name('like');
    Route::get('/unlike/{id}',[LikesController::class,'unlike'])->name('unlike');
    Route::get('/ranking',[LikesController::class,'getranking'])->name('ranking');
    
    Route::post('/follow/{user}', [FollowController::class, 'follow'])->name('follow');
    Route::delete('/unfollow/{user}', [FollowController::class, 'unfollow'])->name('unfollow');
    Route::get('/userpage/{user}', [PostController::class, 'userpage'])->name('userpage');
    
});

require __DIR__.'/auth.php';

   