@extends('layouts.myapp')

@section('title', "Cryptotalk")

@section('content')
<div class="container mt-4">
    <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-3">Back to Posts</a>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h2 class="card-title">{{ $post->title }}</h2>
            <p class="text-muted">
                By {{ optional($post->user)->name ?? 'Unknown' }}
            </p>

            <p class="card-text">{{ $post->content }}</p>
        </div>

        @if (auth()->check() && (auth()->id() === $post->user_id || auth()->user()->profile->is_admin))
            <div class="d-flex justify-content-end mb-3">
                <form action="{{ route('posts.edit', $post->id) }}" method="GET" class="me-2">
                    <button class="btn btn-primary btn-sm px-3">
                        Edit
                    </button>
                </form>

                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm px-3">Delete</button>
                </form>
            </div>
        @endif
    </div>

    <a href="{{ route('comments.create', $post->id) }}" class="btn btn-primary mb-3">
        Add Comment
    </a>

    <h4>Comments</h4>

    @forelse ($post->comments as $comment)
    <div class="card mb-3">
        <div class="card-body">

            <strong>{{ optional($comment->user)->name ?? 'Unknown user' }}</strong>

            <p class="mt-2">{{ $comment->text }}</p>

            <div class="d-flex justify-content-end">
                <span class="text-muted small">
                    Posted at {{ $comment->created_at->format('d M Y H:i') }}
                </span>
            </div>

        </div>

        @if (auth()->check() && (auth()->id() === $comment->user_id || auth()->user()->profile->is_admin))
            <div class="d-flex justify-content-end mb-3">
                <form action="{{ route('comments.edit', $comment->id) }}" method="GET" class="me-2">
                    <button class="btn btn-primary btn-sm px-3">
                        Edit
                    </button>
                </form>

                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm px-3">Delete</button>
                </form>
            </div>
        @endif
    </div>
    @empty
        <p>No comments yet.</p>
    @endforelse

</div>
@endsection