@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="container mt-5">
    <div class="text-center mb-4">
        <h1 style="font-family: 'Poppins', sans-serif;">{{ $post->title }}</h1>
        <img src="{{ $post->image_url }}" alt="Post Image" class="img-fluid" style="max-width: 300px; height: auto;"> <!-- Ukuran gambar diperkecil -->
    </div>

    <div>
        <p style="font-family: 'Poppins', sans-serif;">{!! nl2br(e($post->content)) !!}</p>
    </div>

    <a href="{{ route('home') }}" class="btn btn-outline-secondary mt-3">Back to Home</a>
</div>
@endsection
