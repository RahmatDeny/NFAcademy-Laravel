<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Author;

class HomeController extends Controller
{
    public function index()
    {
        $genres = Genre::orderBy('id')->limit(5)->get();
        $authors = Author::orderBy('id')->limit(5)->get();

        return view('welcome', compact('genres', 'authors'));
    }
}
