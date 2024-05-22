@extends('layouts.app')

@section('content')
<div class="container">
    <h1>My Books</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Add New Book</a>
    @if($books->isEmpty())
        <p>You have no books added yet.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Year</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->genre }}</td>
                        <td>{{ $book->publication_year }}</td>
                        <td>
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
