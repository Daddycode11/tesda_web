<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Feedback;
use App\Models\Schedule;
use App\Models\Enrollment;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalServices' => Service::count(),
            'totalFeedback' => Feedback::count(),
            'totalSchedules' => Schedule::count(),
            'totalEnrollments' => Enrollment::count(),
        ]);
    }
}
