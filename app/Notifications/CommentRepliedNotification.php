<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommentRepliedNotification extends Notification
{
    use Queueable;

    protected $comment;
    protected $replier;

    public function __construct($comment, $replier)
    {
        $this->comment = $comment;
        $this->replier = $replier;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'post_id' => $this->comment->post->id,
            'post_title' => $this->comment->post->title,
            'replier_name' => $this->replier->name,
            'message' => "{$this->replier->name} replied to your comment",
            'image' => $this->replier->profile_picture,
            'time' => now()->toDateTimeString()
        ];
    }
}
