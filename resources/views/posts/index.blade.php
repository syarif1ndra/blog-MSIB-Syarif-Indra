@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <h1>Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-2">Create Post</a>
    <div class="list-group">
        @if ($posts->count() > 0)
            @foreach ($posts as $post)
                <div class="list-group-item justify-content-between align-items-center d-flex">
                    <div class="d-flex">
                        @if ($post->image) 
                            <img src="{{ asset('storage/' . $post->image) }}" alt="Post image" class="img-thumbnail me-3" style="width: 100px; height: 100px;">
                        @else
                            <img src="https://via.placeholder.com/100" alt="Default Image" class="img-thumbnail me-3" style="width: 100px; height: 100px;">
                        @endif

                        <div>
                            <h6><a href="{{ route('home.posts.show', $post->id) }}">{{ $post->title }}</a></h6>
                            <p>in category {{ $post->category->name }}</p>
                            <p>
                                Status:
                                <span class="badge {{ $post->is_published ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $post->is_published ? 'Published' : 'Draft' }}
                                </span>
                            </p>
                        </div>
                    </div>

                    <div class="align-self-center">
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete this data?');">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <div class="list-group-item justify-content-between align-items-center">
                No data
            </div>
        @endif
    </div>
@endsection
