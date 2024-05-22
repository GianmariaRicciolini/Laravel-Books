<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Book Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>{{ $book->title }}</h1>
                    <p>Author: {{ $book->author }}</p>
                    <p>Genre: {{ $book->genre }}</p>
                    <p>Published: {{ $book->publication_year }}</p>
                    <p>Description: {{ $book->description }}</p>
                    @if ($book->cover_image)
                        <p><img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }} cover" class="img-fluid"></p>
                    @endif
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <a href="{{ route('books.index') }}" class="btn btn-secondary">Back to list</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
