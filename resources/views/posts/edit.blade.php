@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <div class="container mt-4">
        <h1>Edit Post</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $post->title) }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="content">Content</label> <!-- Ubah 'Content' menjadi 'content' -->
                <textarea name="content" id="content" class="form-control" required>{{ old('content', $post->content) }}</textarea> <!-- Ubah 'Content' menjadi 'content' -->
            </div>

            <div class="form-group mb-3">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="is_published" value="1" id="isPublished" {{ $post->is_published ? 'checked' : '' }}>
                <label class="form-check-label" for="isPublished">Publish</label>
            </div>

            <div class="form-group mb-3">
                <label for="image">Post Image</label>
                <input type="file" name="image" id="image" class="form-control">
                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" style="max-width: 100%; height: auto; margin-top: 10px;">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>

        <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-3">Back</a>
    </div>
@endsection
