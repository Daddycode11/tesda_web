<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->is_admin) { // Make sure you have an is_admin column
            return $next($request);
        }

        abort(403, 'Unauthorized'); // Or redirect somewhere
    }
}
