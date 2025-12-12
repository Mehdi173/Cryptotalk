<?php

namespace App\Notifications;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PostCommented extends Notification
{
    use Queueable;

    public $post;
    public $comment;
    public $commenter;

    /**
     * Create a new notification instance.
     */
    public function __construct(Post $post, Comment $comment)
    {
        //
        $this->post = $post;
        $this->comment = $comment;
        $this->commenter = $comment->user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Someone commented on your Cryptotalk post!')
            ->greeting("Hello {$notifiable->name},")
            ->line("{$this->commenter->name} commented on your post:")
            ->line("\"{$this->post->title}\"")
            ->line("Comment:")
            ->line($this->comment->text)
            ->action('View Post', route('posts.show', $this->post->id))
            ->line('Thank you for using Cryptotalk!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
