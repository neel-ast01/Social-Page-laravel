<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Models\Follow;
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

    Route::resource('comments', CommentController::class);
    Route::resource('notifications', NotificationController::class);

    Route::post('/follow', [FollowController::class, 'follow'])->name('follow');

    // Route::post('/user/follow', 'FollowController@follow')->name('user.follow');
    // Route::post('/user/unfollow', 'FollowController@unfollow')->name('user.unfollow');
});
