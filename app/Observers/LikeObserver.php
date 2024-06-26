<?php

namespace App\Observers;

use App\Models\Like;
use App\Models\Notification;

class LikeObserver
{
    /**
     * Handle the Like "created" event.
     */
    public function created(Like $like): void
    {
        $user = $like->user; // Retrieve the user who liked the post
        Notification::create([
            'user_id' => $user->id,
            'post_id' => $like->post_id,
            'type' => 'like',
        ]);
    }

    /**
     * Handle the Like "updated" event.
     */
    public function updated(Like $like): void
    {
        //
    }

    /**
     * Handle the Like "deleted" event.
     */
    public function deleted(Like $like): void
    {
        //
    }

    /**
     * Handle the Like "restored" event.
     */
    public function restored(Like $like): void
    {
        //
    }

    /**
     * Handle the Like "force deleted" event.
     */
    public function forceDeleted(Like $like): void
    {
        //
    }
}
