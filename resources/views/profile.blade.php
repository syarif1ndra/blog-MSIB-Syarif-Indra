@extends('layouts.app')

@section('title', 'User Profile')

@section('content')
<div class="container">
    <h1>Profile</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
        </div>
    </div>
</div>
@endsection
