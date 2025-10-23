<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsCustomer
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (!$user || ($user->role ?? null) !== 'customer') {
            return response()->json([
                'status'  => 'forbidden',
                'message' => 'Customer access required.'
            ], 403);
        }

        return $next($request);
    }
}

