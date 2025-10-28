<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Show the admin dashboard.
     */
    public function dashboard()
    {
        // Example: pass data for stats cards
        $totalServices = 10; // Replace with actual queries
        $totalFeedback = 5;
        $totalSchedules = 7;
        $totalRequest = 3;

        return view('admin.dashboard', compact(
            'totalServices',
            'totalFeedback',
            'totalSchedules',
            'totalRequest'
        ));
    }

    /**
     * Show the admin profile page.
     */
    public function profile()
    {
        $admin = Auth::user(); // Get currently logged-in admin
        return view('admin.profile', compact('admin'));
    }

    /**
     * Show the admin settings page.
     */
    public function settings()
    {
        $admin = Auth::user();
        return view('admin.settings', compact('admin'));
    }
}
