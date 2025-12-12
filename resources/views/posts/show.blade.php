@extends('layouts.myapp')

@section('title', "Cryptotalk")

@section('content')
<div class="container mt-4">
    <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary mb-3">&larr; Back to posts</a>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h2 class="card-title">{{ $post->title }}</h2>
            <p class="text-muted">
                    By @if($post->user)
                            <a href="{{ route('users.show', $post->user->id) }}">
                                {{ $post->user->name }}
                            </a>
                        @else
                            Unknown
                    @endif
            </p>

            <p class="card-text">{{ $post->content }}</p>

            @if ($post->image_path)
                <div class="mb-3">
                    <img src="{{ route('image.serve', $post->image_path) }}" alt="Post image" class="img-fluid rounded">
                </div>
            @endif
        </div>

        <!-- Showing Edit and Delete buttons to the user if they created the post or if they are an admin -->
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

    <!-- Including the Livewire comments section component -->
    <livewire:comments-section :post="$post" />
</div>
@endsection