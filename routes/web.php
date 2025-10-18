<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Halaman utama diarahkan ke halaman Genres
Route::get('/', [HomeController::class, 'genres'])->name('page.genres');
Route::get('/authors', [HomeController::class, 'authors'])->name('page.authors');
Route::get('/books', [HomeController::class, 'books'])->name('page.books');
