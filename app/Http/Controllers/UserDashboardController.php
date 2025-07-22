<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use App\Models\Enrollment;
use App\Models\Feedback;
use App\Models\Announcement;

class UserDashboardController extends Controller
{
    public function index()
    {
        return view('user.dashboard', [
            'totalServices' => Service::count(),
            'myEnrollmentsCount' => Enrollment::where('user_id', Auth::id())->count(),
            'approvedEnrollmentsCount' => Enrollment::where('user_id', Auth::id())->where('status', 'approved')->count(),
            'services' => Service::latest()->take(5)->get(),
            'myEnrollments' => Enrollment::with('schedule')->where('user_id', Auth::id())->latest()->take(5)->get(),
            'myFeedback' => Feedback::where('user_id', Auth::id())->latest()->take(5)->get(),
            'announcements' => Announcement::latest()->take(5)->get(), // ✅ fetch announcements
        ]);
    }
}
