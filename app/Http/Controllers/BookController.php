<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * GET /api/books
     * Tampilkan SEMUA data buku, include relasi genre & author (tanpa limit).
     */
    public function index()
    {
        $books = Book::with(['genre', 'author'])
            ->orderBy('id')
            ->get();

        return response()->json([
            'status' => 'success',
            'count'  => $books->count(),
            'data'   => $books,
        ]);
    }

    /**
     * GET /api/books/{id}
     */
    public function show($id)
    {
        $book = Book::with(['genre', 'author'])->find($id);

        if (!$book) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Book not found',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data'   => $book,
        ]);
    }

    /**
     * POST /api/books
     * body JSON: { title, description, price, stock, cover_photo, genre_id, author_id }
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price'       => ['required', 'numeric', 'min:0'],
            'stock'       => ['required', 'integer', 'min:0'],
            'cover_photo' => ['required', 'string', 'max:255'],
            'genre_id'    => ['required', 'integer', 'exists:genres,id'],
            'author_id'   => ['required', 'integer', 'exists:authors,id'],
        ]);

        $book = Book::create($validated)->load(['genre', 'author']);

        return response()->json([
            'status' => 'created',
            'data'   => $book,
        ], 201);
    }

    /**
     * PUT /api/books/{id}
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Book not found',
            ], 404);
        }

        $validated = $request->validate([
            'title'       => ['sometimes', 'required', 'string', 'max:255'],
            'description' => ['sometimes', 'required', 'string'],
            'price'       => ['sometimes', 'required', 'numeric', 'min:0'],
            'stock'       => ['sometimes', 'required', 'integer', 'min:0'],
            'cover_photo' => ['sometimes', 'required', 'string', 'max:255'],
            'genre_id'    => ['sometimes', 'required', 'integer', 'exists:genres,id'],
            'author_id'   => ['sometimes', 'required', 'integer', 'exists:authors,id'],
        ]);

        $book->update($validated);

        return response()->json([
            'status' => 'success',
            'data'   => $book->fresh()->load(['genre', 'author']),
        ]);
    }

    /**
     * DELETE /api/books/{id}
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Book not found',
            ], 404);
        }

        $book->delete();

        return response()->json([
            'status'  => 'success',
            'message' => 'Book deleted',
        ]);
    }
}
