@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="container mt-5">
    <div class="text-center mb-4">
        <h1 style="font-family: 'Poppins', sans-serif;">{{ $post->title }}</h1>
<<<<<<< HEAD
        <img src="{{ $post->image_url }}" alt="Post Image" class="img-fluid" style="max-width: 300px; height: auto;"> <!-- Ukuran gambar diperkecil -->
=======
        <img src="{{ $post->image_url }}" class="img-fluid" alt="{{ $post->title }}" style="max-height: 400px; object-fit: cover;">
>>>>>>> 3b9aed0d0cebc4a471119d63ed3688d019f301d1
    </div>

    <div>
        <p style="font-family: 'Poppins', sans-serif;">{!! nl2br(e($post->content)) !!}</p>
    </div>

<<<<<<< HEAD
    <a href="{{ route('home') }}" class="btn btn-outline-secondary mt-3">Back to Home</a>
=======
    <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary mt-3">Back to Posts</a>
>>>>>>> 3b9aed0d0cebc4a471119d63ed3688d019f301d1
</div>
@endsection
