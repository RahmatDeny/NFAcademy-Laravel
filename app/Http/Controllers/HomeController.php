<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Author;
use App\Models\Book;

class HomeController extends Controller
{
    // Halaman Genres (default)
    public function genres()
    {
        $genres = Genre::orderBy('id')->get();
        return view('genres.index', compact('genres'));
    }

    // Halaman Authors
    public function authors()
    {
        $authors = Author::orderBy('id')->get();
        return view('authors.index', compact('authors'));
    }

    // Halaman Books
    public function books()
    {
        $books = Book::with(['genre', 'author'])->orderBy('id')->get();
        $authors = Author::orderBy('id')->get();
        $genres  = Genre::orderBy('id')->get();
        return view('books.index', compact('books', 'authors', 'genres'));
    }
}
