@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="container mt-5">
    <div class="text-center mb-4">
        <h1 style="font-family: 'Poppins', sans-serif;">{{ $post->title }}</h1>
        <img src="{{ $post->image_url }}" class="img-fluid" alt="{{ $post->title }}" style="max-height: 400px; object-fit: cover;">
    </div>

    <div>
        <p style="font-family: 'Poppins', sans-serif;">{!! nl2br(e($post->content)) !!}</p>
    </div>

    <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary mt-3">Back to Posts</a>
</div>
@endsection
