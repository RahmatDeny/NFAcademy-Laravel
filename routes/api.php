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

// Books routes (tetap default — belum dibatasi dalam instruksi)
Route::apiResource('books',   BookController::class);

// PUBLIC: Author & Genre - index + show dapat diakses semua orang
Route::get('authors', [AuthorController::class, 'index']);
Route::get('authors/{id}', [AuthorController::class, 'show']);
Route::get('genres', [GenreController::class, 'index']);
Route::get('genres/{id}', [GenreController::class, 'show']);

// ADMIN ONLY: Author & Genre - create, update, destroy
Route::middleware(['auth.basic', 'admin'])->group(function () {
    // Authors
    Route::post('authors', [AuthorController::class, 'store']);
    Route::put('authors/{id}', [AuthorController::class, 'update']);
    Route::delete('authors/{id}', [AuthorController::class, 'destroy']);

    // Genres
    Route::post('genres', [GenreController::class, 'store']);
    Route::put('genres/{id}', [GenreController::class, 'update']);
    Route::delete('genres/{id}', [GenreController::class, 'destroy']);
});
