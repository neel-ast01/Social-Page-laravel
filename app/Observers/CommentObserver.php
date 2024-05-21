<?php

namespace App\Observers;

use App\Models\Comment;
use App\Models\Notification;

class CommentObserver
{
    /**
     * Handle the Comment "created" event.
     */
    public function created(Comment $comment): void
    {
        $user = $comment->user; // Retrieve the user who commented on the post
        Notification::create([
            'user_id' => $user->id,
            'post_id' => $comment->post_id,
            'type' => 'comment',
        ]);
    }

    /**
     * Handle the Comment "updated" event.
     */
    public function updated(Comment $comment): void
    {
        //
    }

    /**
     * Handle the Comment "deleted" event.
     */
    public function deleted(Comment $comment): void
    {
        //
    }

    /**
     * Handle the Comment "restored" event.
     */
    public function restored(Comment $comment): void
    {
        //
    }

    /**
     * Handle the Comment "force deleted" event.
     */
    public function forceDeleted(Comment $comment): void
    {
        //
    }
}
