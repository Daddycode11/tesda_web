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
    // Monthly data example (keep yours)
    $monthlyData = [
        'months'       => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        'services'     => [5, 8, 7, 10, 9, 12],
        'feedback'     => [3, 5, 4, 6, 5, 7],
        'schedules'    => [2, 3, 3, 4, 3, 5],
        'enrollments'  => [4, 6, 5, 8, 7, 9]
    ];

    // Total counts
    $totalFeedback         = \App\Models\Feedback::count();
    $pendingFeedbackCount  = \App\Models\Feedback::where('status', 'pending')->count();
    $approvedFeedbackCount = \App\Models\Feedback::where('status', 'view')->count();
    $rejectedFeedbackCount = \App\Models\Feedback::where('status', 'rejected')->count(); // optional if you have this status

    return view('admin.dashboard', [
        'totalServices'          => \App\Models\Service::count(),
        'totalFeedback'         => $totalFeedback,
        'pendingFeedbackCount'  => $pendingFeedbackCount,
        'approvedFeedbackCount' => $approvedFeedbackCount,
        'rejectedFeedbackCount' => $rejectedFeedbackCount,
        'totalSchedules'        => \App\Models\Schedule::count(),
        'totalEnrollments'      => \App\Models\Enrollment::count(),
        'monthlyData'           => $monthlyData,
    ]);
}

}
