<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Author;
use App\Models\Book;

class HomeController extends Controller
{
    public function index()
    {
        $genres = Genre::orderBy('id')->get();
        $authors = Author::orderBy('id')->get();
        $books = Book::with(['genre', 'author'])->orderBy('id')->get();

        return view('welcome', compact('genres', 'authors', 'books'));
    }
}