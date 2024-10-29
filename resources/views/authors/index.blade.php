@extends('layouts.app')

@section('title', 'Authors')

@section('content')
    <h1>Authors</h1>
    <a href="{{ route('authors.create') }}" class="btn btn-primary mb-3">Create Author</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <ul class="list-group">
        @foreach ($authors as $author)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <h5>{{ $author->name }}</h5>
                    <p>{{ $author->bio }}</p>
<<<<<<< HEAD
                    
=======
>>>>>>> 3b9aed0d0cebc4a471119d63ed3688d019f301d1
                </div>
                <div>
                    <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
