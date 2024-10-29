@extends('layouts.app')

@section('title', 'User Profile')

@section('content')
<div class="col-md-8 offset-md-2">
    <h2>User Profile</h2>
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">{{ $user->name }}</h5>
        </div>
        <div class="card-body text-center">
            <img src="{{ $user->profile_photo_url }}" alt="User Photo" class="profile-img mb-3" style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover;">
            <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
            <p class="card-text"><strong>Bio:</strong> {{ $user->bio }}</p>
        </div>
    </div>
    <a href="{{ route('users.index') }}" class="btn btn-primary">Back to Users</a>
</div>
@endsection
