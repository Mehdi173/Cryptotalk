<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;
use App\Models\Post;
use App\Notifications\PostCommented;

class CommentsSection extends Component
{
    public Post $post;
    public $text = '';

    protected $rules = [
        'text' => 'required|string|min:4',
    ];

    public function addComment()
    {
        $this->validate();

        $comment = $this->post->comments()->create([
            'text' => $this->text,
            'user_id' => auth()->id(),
        ]);

        $this->text = '';

        if ($this->post->user_id !== auth()->id()) {
            $this->post->user->notify(new PostCommented($this->post, $comment));
        }
        $this->post->refresh();
    }

    public function render()
    {
        return view('livewire.comments-section');
    }
}
