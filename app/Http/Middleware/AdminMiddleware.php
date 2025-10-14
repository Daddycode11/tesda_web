<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Assuming your User model has an 'is_admin' column
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }

        abort(403, 'Unauthorized'); // or redirect to home
    }
}
