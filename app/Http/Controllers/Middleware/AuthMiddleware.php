<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para acceder.');
        }

        return $next($request);
    }
}