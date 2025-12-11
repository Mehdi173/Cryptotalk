@extends('layouts.myapp')

@section('title', 'Add Comment')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-body">

            <h2 class="card-title mb-4">Add a comment to '<em>{{ $post->title }}</em>'</h2>

            <form method="POST" action="{{ route('comments.store', $post->id) }}">
                @csrf

                <div class="mb-3">
                    <label for="text" class="form-label">Comment</label>
                    <textarea 
                        name="text" 
                        class="form-control"
                        rows="4" 
                    >{{ old('text') }}</textarea>
                </div>

                <div class="d-flex justify-content-end mt-3">
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-secondary me-2">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        Add Comment
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection