<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::where('user_id', Auth::id())->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $genres = ['Adventure', 'Drama', 'Fantasy', 'Historical', 'Horror', 'Romantic', 'Sci-Fi', 'Other'];
        return view('books.create', compact('genres'));
    }
    
    public function show(Book $book)
    {
        if (Auth::id() !== $book->user_id) {
            return redirect()->route('books.index')->with('error', 'Unauthorized access.');
        }
        
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        if (Auth::id() !== $book->user_id) {
            return redirect()->route('books.index')->with('error', 'Unauthorized access.');
        }
        
        $genres = ['Adventure', 'Drama', 'Fantasy', 'Historical', 'Horror', 'Romantic', 'Sci-Fi', 'Other'];
        return view('books.edit', compact('book', 'genres'));
    }

    public function update(Request $request, Book $book)
    {
        if (Auth::id() !== $book->user_id) {
            return redirect()->route('books.index')->with('error', 'Unauthorized access.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
            'genre' => 'required|string',
            'publication_year' => 'required|integer',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $coverImagePath = $book->cover_image;
        if ($request->hasFile('cover_image')) {
            $coverImagePath = $request->file('cover_image')->store('cover_images', 'public');
        }

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'genre' => $request->genre,
            'publication_year' => $request->publication_year,
            'cover_image' => $coverImagePath,
        ]);

        return redirect()->route('books.index')->with('success', 'Book updated successfully');
    }

    public function destroy(Book $book)
    {
        if (Auth::id() !== $book->user_id) {
            return redirect()->route('books.index')->with('error', 'Unauthorized access.');
        }

        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully');
    }
}
