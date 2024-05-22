@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Book</h1>
    <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" name="author" class="form-control" value="{{ $book->author }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ $book->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <select name="genre" class="form-select" required>
                @foreach($genres as $genre)
                    <option value="{{ $genre }}" {{ $book->genre == $genre ? 'selected' : '' }}>{{ $genre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="publication_year" class="form-label">Publication Year</label>
            <select name="publication_year" class="form-select" required>
                @for($year = date('Y'); $year >= 1900; $year--)
                    <option value="{{ $year }}" {{ $book->publication_year == $year ? 'selected' : '' }}>{{ $year }}</option>
                @endfor
            </select>
        </div>
        <div class="mb-3">
            <label for="cover_image" class="form-label">Cover Image</label>
            <input type="file" name="cover_image" class="form-control">
            @if($book->cover_image)
                <p>Current cover: <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }} cover" style="max-width:200px;"></p>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update Book</button>
    </form>
</div>
@endsection
