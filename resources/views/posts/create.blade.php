@extends('layouts.myapp')

@section('title', 'Cryptotalk')

@section('content')
<div class="container mt-4">

    <div class="card shadow-sm">
        <div class="card-body">

            <h2 class="card-title mb-4">Create a new post</h2>

            <form method="POST" action="{{ route('posts.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input 
                        type="text" 
                        name="title" 
                        class="form-control"
                        value="{{ old('title') }}"
                    >
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea 
                        name="content" 
                        class="form-control"
                        rows="5" 
                    >{{ old('content') }}</textarea>
                </div>

                <div class="d-flex justify-content-end mt-3">
                    <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary me-2">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        Create Post
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection