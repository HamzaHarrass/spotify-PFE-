<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        // dd($user->role_id);
        if ($user->role_id == 1) {
            return $next($request);
        }
        return response()->json([
            'error' => 'Unauthorized',
            'message' => 'you don\'t have access to this operation.'
        ], 403);

    }
}
