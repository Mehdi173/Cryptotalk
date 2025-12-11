@extends('layouts.myapp')

@section('title', 'Cryptotalk')

@section('content')
    <div class="container mt-3">

    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">
        Create New Post
    </a>

    <h1>Posts List</h1>

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
            </div>
        </div>
    @endforeach

    <div class="d-flex justify-content-center mt-4">
        {{ $posts->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection