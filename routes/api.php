<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;

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
            'GET    /api/genres',
            'GET    /api/genres/{id}',
            'POST   /api/genres',
            'PUT    /api/genres/{id}',
            'DELETE /api/genres/{id}',
        ],
    ]);
})->name('api.root');

// Resource endpoints (tanpa limit) untuk Authors & Books
Route::apiResource('authors', AuthorController::class);
Route::apiResource('books',   BookController::class);
Route::apiResource('genres',  GenreController::class);
