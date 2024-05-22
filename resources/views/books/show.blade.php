@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $book->title }}</h1>
    <p><strong>Author:</strong> {{ $book->author }}</p>
    <p><strong>Genre:</strong> {{ $book->genre }}</p>
    <p><strong>Publication Year:</strong> {{ $book->publication_year }}</p>
    <p><strong>Description:</strong> {{ $book->description }}</p>
    @if($book->cover_image)
        <p><img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }} cover" style="max-width:200px;"></p>
    @endif
    <a href="{{ route('books.index') }}" class="btn btn-primary">Back to List</a>
    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
</div>
@endsection
