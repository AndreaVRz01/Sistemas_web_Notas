<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GuestMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            return redirect()->route('notes.index');
        }

        return $next($request);
    }
}