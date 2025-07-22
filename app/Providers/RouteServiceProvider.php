<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, etc.
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Custom redirect after login
     */
    public static function redirectTo()
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return '/admin';
        }
        return '/user';
    }
}
