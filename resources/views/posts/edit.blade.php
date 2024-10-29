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
<<<<<<< HEAD
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $post->title) }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="content">Content</label> <!-- Ubah 'Content' menjadi 'content' -->
                <textarea name="content" id="content" class="form-control" required>{{ old('content', $post->content) }}</textarea> <!-- Ubah 'Content' menjadi 'content' -->
=======
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $post->title) }}">
            </div>

            <div class="form-group mb-3">
                <label for="Content">Content</label>
                <textarea name="Content" id="Content" class="form-control">{{ old('content', $post->Content) }}</textarea>
>>>>>>> 3b9aed0d0cebc4a471119d63ed3688d019f301d1
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
<<<<<<< HEAD
                <input type="checkbox" class="form-check-input" name="is_published" value="1" id="isPublished" {{ $post->is_published ? 'checked' : '' }}>
                <label class="form-check-label" for="isPublished">Publish</label>
            </div>

=======
                <input type="checkbox" class="form-check-input" name="is_published" value="1" id="isPublished">
                <label class="form-check-label" for="isPublished">Publish</label>
            </div>


>>>>>>> 3b9aed0d0cebc4a471119d63ed3688d019f301d1
            <div class="form-group mb-3">
                <label for="image">Post Image</label>
                <input type="file" name="image" id="image" class="form-control">
                @if ($post->image)
<<<<<<< HEAD
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" style="max-width: 100%; height: auto; margin-top: 10px;">
=======
                <img src="{{ asset('storage/posts/' . $post->image) }}" alt="Post Image">
>>>>>>> 3b9aed0d0cebc4a471119d63ed3688d019f301d1
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>

        <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-3">Back</a>
    </div>
@endsection
