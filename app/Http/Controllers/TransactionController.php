<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * GET /api/transactions
     * Admin only: list all transactions with relations.
     */
    public function index()
    {
        $tx = Transaction::with(['customer', 'book'])->orderBy('id')->get();

        return response()->json([
            'status' => 'success',
            'count'  => $tx->count(),
            'data'   => $tx,
        ]);
    }

    /**
     * GET /api/transactions/{id}
     * Customer only: can view own transaction.
     */
    public function show($id)
    {
        $transaction = Transaction::with(['customer', 'book'])->find($id);
        if (!$transaction) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Transaction not found',
            ], 404);
        }

        $user = Auth::user();
        if (($user->role ?? null) === 'customer' && $transaction->customer_id !== $user->id) {
            return response()->json([
                'status'  => 'forbidden',
                'message' => 'You can only view your own transactions.',
            ], 403);
        }

        return response()->json([
            'status' => 'success',
            'data'   => $transaction,
        ]);
    }

    /**
     * POST /api/transactions
     * Customer only: create a transaction for the authenticated user.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'order_number' => ['required', 'string', 'max:255', 'unique:transactions,order_number'],
            'book_id'      => ['required', 'integer', 'exists:books,id'],
            'total_amount' => ['required', 'numeric', 'min:0'],
        ]);

        $payload = array_merge($validated, [
            'customer_id' => $user->id,
        ]);

        $tx = Transaction::create($payload)->load(['customer', 'book']);

        return response()->json([
            'status' => 'created',
            'data'   => $tx,
        ], 201);
    }

    /**
     * PUT /api/transactions/{id}
     * Customer only: update own transaction.
     */
    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);
        if (!$transaction) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Transaction not found',
            ], 404);
        }

        $user = Auth::user();
        if ($transaction->customer_id !== $user->id) {
            return response()->json([
                'status'  => 'forbidden',
                'message' => 'You can only update your own transactions.',
            ], 403);
        }

        $validated = $request->validate([
            'order_number' => ['sometimes', 'required', 'string', 'max:255', 'unique:transactions,order_number,' . $transaction->id],
            'book_id'      => ['sometimes', 'required', 'integer', 'exists:books,id'],
            'total_amount' => ['sometimes', 'required', 'numeric', 'min:0'],
        ]);

        $transaction->update($validated);

        return response()->json([
            'status' => 'success',
            'data'   => $transaction->fresh()->load(['customer', 'book']),
        ]);
    }

    /**
     * DELETE /api/transactions/{id}
     * Admin only: delete any transaction.
     */
    public function destroy($id)
    {
        $transaction = Transaction::find($id);
        if (!$transaction) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Transaction not found',
            ], 404);
        }

        $transaction->delete();

        return response()->json([
            'status'  => 'success',
            'message' => 'Transaction deleted',
        ]);
    }
}

