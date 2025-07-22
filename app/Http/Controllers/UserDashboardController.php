<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // ✅ add this
use App\Models\Service;
use App\Models\Enrollment;

class UserDashboardController extends Controller
{
   public function index()
{
    return view('user.dashboard', [
        'totalServices' => \App\Models\Service::count(),
        'myEnrollmentsCount' => \App\Models\Enrollment::where('user_id', Auth::id())->count(),
        'approvedEnrollmentsCount' => \App\Models\Enrollment::where('user_id', Auth::id())->where('status', 'approved')->count(),
        'services' => \App\Models\Service::latest()->take(5)->get(),
        'myEnrollments' => \App\Models\Enrollment::with('schedule')->where('user_id', Auth::id())->latest()->take(5)->get(),
        'myFeedback' => \App\Models\Feedback::where('user_id', Auth::id())->latest()->take(5)->get(),
    ]);
}
}
