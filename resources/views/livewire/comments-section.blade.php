<div>
    {{-- Comment addition form --}}
    <h4>Add Comment</h4>

    <textarea 
        wire:model="text" 
        class="form-control mb-2" 
        rows="3" 
        placeholder="Write your comment here..."
    ></textarea>

    {{-- Needed here as the livewire errors are not shown by the error display from the myapp layout --}}
    @error('text')
        <div class="text-danger mb-2">{{ $message }}</div>
    @enderror

    <button wire:click="addComment" class="btn btn-primary">
        Add comment
    </button>
    <hr class="my-4">

    {{-- Comments list --}}
    <div>
        @foreach ($post->comments as $comment)
            <div class="card mb-3">
                <div class="card-body">

                    <strong>{{ $comment->user->name }}</strong>

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
        @endforeach
    </div>
</div>
