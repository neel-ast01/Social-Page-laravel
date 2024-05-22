<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Like;
use App\Models\User;
use App\Observers\CommentObserver;
use App\Observers\LikeObserver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Comment::observe(CommentObserver::class);
        Like::observe(LikeObserver::class);

        View::composer('*', function ($view) {


            $friends = User::where('id', '!=', Auth::id())
                ->whereDoesntHave('followers', function ($query) {
                    $query->where('follower_id', Auth::id());
                })
                ->get();

            // Retrieve all users
            $users = User::all();

            // Pass the $friends and $users variables to all views
            $view->with('friends', $friends)->with('users', $users);
        });
    }
}
