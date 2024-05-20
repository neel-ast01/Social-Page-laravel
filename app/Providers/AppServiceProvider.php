<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Like;
use App\Observers\CommentObserver;
use App\Observers\LikeObserver;
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
        
    }
}
