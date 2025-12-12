<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\Notifications\PostCommented;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Unused
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Post $post)
    {
        // Unused currently as we switched the comment creation 
        // to be done using a livewire component within the post show view
        return view('comments.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post)
    {
        // Validating the input length and type to make sure the comment is meaningful
        $validatedData = $request->validate([
            'text' => 'required|string|min:4',
        ]);

        $comment = $post->comments()->create([
            'text' => $validatedData['text'],
            'user_id' => auth()->id(),
        ]);

        // Notifing the post creator about the new comment only if the commenter is not the post creator
        if ($post->user_id !== auth()->id()) {
            $post->user->notify(new PostCommented($post, $comment));
        }

        return redirect()->route('posts.show', $post->id)->with('message', 'Comment added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Unused
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comment = Comment::findOrFail($id);

        return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comment = Comment::findOrFail($id);

        // Validating the input length and type to make sure the comment is meaningful
        $validatedData = $request->validate([
            'text' => 'required|string|min:4',
        ]);

        $comment->text = $validatedData['text'];
        $comment->save();

        return redirect()->route('posts.show', $comment->post_id)->with('message', 'Comment updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('posts.show', $comment->post_id)->with('message', 'Comment deleted successfully!');
    }
}
