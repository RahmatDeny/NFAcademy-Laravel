<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * GET /api/authors
     * Tampilkan SEMUA data author (tanpa limit).
     */
    public function index()
    {
        $authors = Author::orderBy('id')->get();

        return response()->json([
            'status' => 'success',
            'count'  => $authors->count(),
            'data'   => $authors,
        ]);
    }

    /**
     * GET /api/authors/{id}
     */
    public function show($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Author not found',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data'   => $author,
        ]);
    }

    /**
     * POST /api/authors
     * body JSON: { name, photo?, bio? }
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => ['required', 'string', 'max:255'],
            'photo' => ['required', 'string', 'max:255'],
            'bio'   => ['required', 'string'],
        ]);

        $author = Author::create($validated);

        return response()->json([
            'status' => 'created',
            'data'   => $author,
        ], 201);
    }

    /**
     * PUT /api/authors/{id}
     */
    public function update(Request $request, $id)
    {
        $author = Author::find($id);
        if (!$author) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Author not found',
            ], 404);
        }

        $validated = $request->validate([
            'name'  => ['sometimes', 'required', 'string', 'max:255'],
            'photo' => ['sometimes', 'required', 'string', 'max:255'],
            'bio'   => ['sometimes', 'required', 'string'],
        ]);

        $author->update($validated);

        return response()->json([
            'status' => 'success',
            'data'   => $author,
        ]);
    }

    /**
     * DELETE /api/authors/{id}
     */
    public function destroy($id)
    {
        $author = Author::find($id);
        if (!$author) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Author not found',
            ], 404);
        }

        $author->delete();

        return response()->json([
            'status'  => 'success',
            'message' => 'Author deleted',
        ]);
    }
}
