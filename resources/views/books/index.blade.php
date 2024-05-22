<div class="mt-8">
    <h2 class="text-xl text-gray-800 dark:text-gray-200">Your Books</h2>
    <div class="row">
        @foreach($books as $book)
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    @if ($book->cover_image)
                        <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }} cover" class="img-fluid">
                    @endif
                    <h4 class="card-title">{{ $book->title }}</h4>
                    <p class="card-text">Author: {{ $book->author }}</p>
                    <p class="card-text">Genre: {{ $book->genre }}</p>
                    <p class="card-text">Published: {{ $book->publication_year }}</p>
                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
