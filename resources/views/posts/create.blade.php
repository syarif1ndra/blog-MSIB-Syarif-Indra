@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    <h1>Create Post</h1>
    <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary mb-3">Back</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label> <!-- Ubah 'Content' menjadi 'content' -->
            <textarea name="content" id="content" class="form-control" required></textarea> <!-- Ubah 'Content' menjadi 'content' -->
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select name="category_id" class="form-control" required>
                <option value="">Choose</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="image">Upload Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="is_published" value="1" id="isPublished">
            <label class="form-check-label" for="isPublished">Publish</label>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
@endsection
