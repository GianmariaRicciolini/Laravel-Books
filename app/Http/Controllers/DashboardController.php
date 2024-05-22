<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class DashboardController extends Controller
{
    public function index()
    {
        $books = Book::where('user_id', auth()->id())->get();
        $genres = ['Adventure', 'Drama', 'Fantasy', 'Historical', 'Horror', 'Romantic', 'Sci-Fi', 'Other'];
        return view('dashboard', compact('books', 'genres'));
    }
}
