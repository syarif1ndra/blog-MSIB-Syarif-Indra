@extends('layouts.app')

@section('title', 'Users')

@section('content')
<div class="col-md-8 offset-md-2">
    <h1>Users</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-2">Create User</a>

    <div class="list-group">
        @foreach ($users as $user)
            <div class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <h5><a href="{{ route('users.profile', $user->id) }}">{{ $user->name }}</a></h5>
                    <p>Email: {{ $user->email }}</p>
                </div>
                <div>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
