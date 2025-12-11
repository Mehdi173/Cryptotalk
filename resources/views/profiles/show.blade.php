@extends('layouts.myapp')

@section('title', 'Cryptotalk - User Profile')

@section('content')
<div class="container mt-4">
    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary mb-3">
        &larr; Back to user activity
    </a>
    <div class="card shadow-sm">
        <div class="card-body">

            <h2 class="card-title mb-3">
                Profile of <strong>{{ $user->name }}</strong>
            </h2>

            <p><strong>Email:</strong> {{ $user->email }}</p>

            <p>
                <strong>Age:</strong> 
                {{ $profile->age ?? 'Unknown' }}
            </p>

            <p>
                <strong>Account type:</strong> 
                @if ($profile->is_admin)
                    <span class="badge bg-danger">Admin</span>
                @else
                    <span class="badge bg-primary">User</span>
                @endif
            </p>

            <p><strong>Member since:</strong> {{ $user->created_at->format('d M Y') }}</p>

        </div>
    </div>

</div>
@endsection