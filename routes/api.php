<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Models\Genre;

Route::get('/', function () {
    return response()->json([
        'app'      => config('app.name'),
        'message'  => 'API ready',
        'endpoints'=> [
            'GET    /api/authors',
            'GET    /api/authors/{id}',
            'POST   /api/authors',
            'PUT    /api/authors/{id}',
            'DELETE /api/authors/{id}',
            'GET    /api/books',
            'GET    /api/books/{id}',
            'POST   /api/books',
            'PUT    /api/books/{id}',
            'DELETE /api/books/{id}',
            'GET    /api/genres'
        ],
    ]);
})->name('api.root');

/**
 * Read-only endpoint untuk Genres (tanpa limit).
 * Jika nanti ingin filter/sort, cukup tambahkan query params.
 */
Route::get('/genres', function () {
    $genres = Genre::orderBy('id')->get();

    return response()->json([
        'status' => 'success',
        'count'  => $genres->count(),
        'data'   => $genres,
    ]);
})->name('genres.index');

// Resource endpoints (tanpa limit) untuk Authors & Books
Route::apiResource('authors', AuthorController::class);
Route::apiResource('books',   BookController::class);
