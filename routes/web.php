<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;





Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login');

    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
});
Route::group(['middleware' => 'auth'], function () {
    Route::get(
        '/',
        [PostController::class, 'index']
    )->name('home');

    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
    Route::resource('profile', ProfileController::class);
    Route::resource('posts', PostController::class);

    Route::get('/like', [LikeController::class, 'like'])->name('get.like');
    Route::post('/like', [LikeController::class, 'like'])->name('post.like');

    
});
