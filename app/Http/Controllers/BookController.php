<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::where('user_id', Auth::id())->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $genres = ['Fantasy', 'Horror', 'Sci-Fi', 'Romantic', 'Other'];
        return view('books.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
            'genre' => 'required|string',
            'publication_year' => 'required|integer',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $coverImagePath = null;
        if ($request->hasFile('cover_image')) {
            $coverImagePath = $request->file('cover_image')->store('cover_images', 'public');
        }

        Book::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'genre' => $request->genre,
            'publication_year' => $request->publication_year,
            'cover_image' => $coverImagePath,
        ]);

        return redirect()->route('books.index')->with('success', 'Book added successfully');
    }

    public function show(Book $book)
    {
        $this->authorize('view', $book);

        return view('books.show', compact('book'));
    }
}
