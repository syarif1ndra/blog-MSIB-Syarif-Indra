@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="col-md-8 offset-md-2">
    <h1>Edit User Profile</h1>
    <a href="{{ route('users.show', $user->id) }}" class="btn btn-outline-secondary mb-3">Back</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="form-group">
            <label for="bio">Bio</label>
            <textarea name="bio" id="bio" class="form-control">{{ old('bio', $user->bio) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Update Profile</button>
    </form>
</div>
@endsection
