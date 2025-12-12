@extends('layouts.myapp')

@section('title', 'Cryptotalk')

@section('content')
<div class="container mt-4">
    <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary mb-3">&larr; Back to posts</a>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>{{ $user->name }}'s activity</h2>

        <a href="{{ route('profile.show', $user->id) }}" class="btn btn-secondary">
            View profile
        </a>
    </div>

    <!-- Section showing all of the user's posts -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h4 class="card-title">Posts</h4>

            @forelse ($user->posts as $post)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5>
                            <a href="{{ route('posts.show', $post->id) }}">
                                {{ $post->title }}
                            </a>
                        </h5>
                        <p class="text-muted small">
                            Posted on {{ $post->created_at->format('d M Y') }}
                        </p>
                        <p>{{ $post->content }}</p>
                    </div>
                </div>
            @empty
                <p class="text-muted">This user has not created any posts.</p>
            @endforelse
        </div>
    </div>

    <!-- Section showing all of the user's comments -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h4 class="card-title">Comments</h4>

            @forelse ($user->comments as $comment)
                <div class="card mb-3" style="max-width: 900px; margin-left:auto; margin-right:auto;">
                    <div class="card-body">
                        <p class="mb-1">{{ $comment->text }}</p>

                        <div class="d-flex justify-content-between">
                            <small class="text-muted">
                                On post: 
                                <a href="{{ route('posts.show', $comment->post_id) }}">
                                    {{ $comment->post->title }}
                                </a>
                            </small>

                            <small class="text-muted">
                                {{ $comment->created_at->format('d M Y H:i') }}
                            </small>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted">This user has not made any comments yet.</p>
            @endforelse

        </div>
    </div>

</div>
@endsection