@extends('layouts.myapp')

@section('title', 'Edit comment')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="card-title mb-4">Edit comment</h2>

            <form method="POST" action="{{ route('comments.update', $comment->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="text" class="form-label">Comment</label>
                    <textarea 
                        name="text" 
                        class="form-control"
                        rows="4" 
                    >{{ old('text', $comment->text) }}</textarea>
                </div>

                <div class="d-flex justify-content-end mt-3">
                    <a href="{{ route('posts.show', $comment->post_id) }}" class="btn btn-outline-secondary me-2">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        Update comment
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection