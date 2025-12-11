@extends('layouts.myapp')

@section('title', 'Posts List')

@section('content')
    <div class="container mt-3">

    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">
        Create New Post
    </a>

    @foreach ($posts as $post)
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h3 class="card-title">
                    <a href="{{ route('posts.show', $post->id) }}">
                        {{ $post->title }}
                    </a>
                </h3>

                <p class="text-muted">
                    By {{ optional($post->user)->name ?? 'Unknown' }}
                </p>

                <p class="card-text">
                    {{ $post->content }}
                </p>

                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>

                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                </form>
            </div>
        </div>
    @endforeach

    <div class="d-flex justify-content-center mt-4">
        {{ $posts->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection