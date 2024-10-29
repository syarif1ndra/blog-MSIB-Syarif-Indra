@extends('layouts.app')

@section('title', 'Create Author')

@section('content')
    <h1>Create Author</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('authors.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
<<<<<<< HEAD
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>


=======
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
        </div>

>>>>>>> 3b9aed0d0cebc4a471119d63ed3688d019f301d1
        <div class="form-group">
            <label for="bio">Bio</label>
            <textarea name="bio" id="bio" class="form-control">{{ old('bio') }}</textarea>
        </div>

<<<<<<< HEAD
=======
        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" name="photo" id="photo" class="form-control">
        </div>

>>>>>>> 3b9aed0d0cebc4a471119d63ed3688d019f301d1
        <button type="submit" class="btn btn-primary mt-3">Create</button>
    </form>
@endsection
