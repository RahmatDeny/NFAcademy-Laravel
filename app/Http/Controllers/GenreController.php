<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * GET /api/genres
     * Tampilkan SEMUA data genre (tanpa limit).
     */
    public function index()
    {
        $genres = Genre::orderBy('id')->get();

        return response()->json([
            'status' => 'success',
            'count'  => $genres->count(),
            'data'   => $genres,
        ]);
    }

    /**
     * GET /api/genres/{id}
     */
    public function show($id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Genre not found',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data'   => $genre,
        ]);
    }

    /**
     * POST /api/genres
     * body JSON: { name, description }
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);

        $genre = Genre::create($validated);

        return response()->json([
            'status' => 'created',
            'data'   => $genre,
        ], 201);
    }

    /**
     * PUT /api/genres/{id}
     */
    public function update(Request $request, $id)
    {
        $genre = Genre::find($id);
        if (!$genre) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Genre not found',
            ], 404);
        }

        $validated = $request->validate([
            'name'        => ['sometimes', 'required', 'string', 'max:255'],
            'description' => ['sometimes', 'required', 'string'],
        ]);

        $genre->update($validated);

        return response()->json([
            'status' => 'success',
            'data'   => $genre,
        ]);
    }

    /**
     * DELETE /api/genres/{id}
     */
    public function destroy($id)
    {
        $genre = Genre::find($id);
        if (!$genre) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Genre not found',
            ], 404);
        }

        $genre->delete();

        return response()->json([
            'status'  => 'success',
            'message' => 'Genre deleted',
        ]);
    }
}
