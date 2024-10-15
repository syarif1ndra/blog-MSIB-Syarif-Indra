@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container mt-5">
    <div class="text-center mb-5">
        <h1 style="font-family: 'Poppins', sans-serif;">Blog MSIB</h1> <!-- Tambahkan gaya langsung -->
    </div>

    <div class="row mb-5">
        @foreach ($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card card-hover shadow-sm h-100">
                    <img src="{{ $post->image_url }}" class="card-img-top" alt="{{ $post->title }}">
                    <div class="card-body">
                        <h5 class="card-title" style="font-family: 'Poppins', sans-serif;">{{ $post->title }}</h5> <!-- Tambahkan gaya langsung -->
                        <p class="card-text" style="font-family: 'Poppins', sans-serif;">{{ Str::limit($post->excerpt, 100) }}</p> <!-- Tambahkan gaya langsung -->
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Read more</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
