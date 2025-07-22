<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Feedback;
use App\Models\Schedule;
use App\Models\Enrollment;
use App\Models\Announcement;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Just for example; replace with real DB groupBy later
        $monthlyData = [
            'months' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            'services'     => [5, 8, 7, 10, 9, 12],
            'feedback'     => [3, 5, 4, 6, 5, 7],
            'schedules'    => [2, 3, 3, 4, 3, 5],
            'enrollments'  => [4, 6, 5, 8, 7, 9]
        ];

        return view('admin.dashboard', [
            'totalServices' => Service::count(),
            'totalFeedback' => Feedback::count(),
            'totalSchedules' => Schedule::count(),
            'totalEnrollments' => Enrollment::count(),
            'monthlyData' => $monthlyData   // ✅ pass to view
        ]);
    }
}
