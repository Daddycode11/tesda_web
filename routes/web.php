<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use App\Models\Feedback;
/*
|--------------------------------------------------------------------------
| Public routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/schedules', function () {
    return view('user.schedules', [
        'schedules' => \App\Models\Schedule::latest()->get()
    ]);
})->name('user.schedules');

Route::get('/announcements', [AnnouncementController::class, 'index'])->name('announcements.index');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/list-services', function () {
    $services = Service::all();
    return view('user.list_service', compact('services'));
})->name('list.services');

/*
|--------------------------------------------------------------------------
| Admin routes
|--------------------------------------------------------------------------
*/

// Eto nilabas sa middleware guamana naman, pero walang data sya saka nav-tapos naka fill sa cnter
// what if yung isa ang i open yung old, tas paano mo sya napa run - ito bago? oo kasi yun problema sa luma eh
//tka may problema ata sa welcome template 
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');


Route::middleware(['auth', 'admin'])->group(function () {
    // Route::get('/admin', function () {
    //     return view('admin.dashboard');
    // })->name('admin.dashboard');

  
    // CRUD resources
    Route::resource('services', ServiceController::class)->except(['index', 'show']);
    Route::resource('schedules', ScheduleController::class);
    Route::resource('announcements', AnnouncementController::class)->except(['index']);
    Route::resource('feedback', FeedbackController::class)->except(['index', 'show']);

    // Public route so all users can see announcements
    // Show create announcement form
    Route::get('/admin/announcements/create', [AnnouncementController::class, 'create'])->name('announcements.create');
    // Handle form submission
    Route::post('/admin/announcements', [AnnouncementController::class, 'store'])->name('announcements.store');

    //Post Announcement
    Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('announcements', AnnouncementController::class)->except(['index']);
});

    // Enrollments management
    Route::get('/admin/enrollments', [EnrollmentController::class, 'index'])->name('enrollments.index');
    Route::post('/admin/enrollments/{enrollment}/approve', [EnrollmentController::class, 'approve'])->name('enrollments.approve');
    Route::post('/admin/enrollments/{enrollment}/reject', [EnrollmentController::class, 'reject'])->name('enrollments.reject');
    Route::delete('/admin/enrollments/{enrollment}', [EnrollmentController::class, 'destroy'])->name('enrollments.destroy');
    Route::get('/admin/enrollments/export-pdf', [EnrollmentController::class, 'exportPdf'])->name('enrollments.exportPdf');

     // Feedback management
    Route::get('/admin/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
    Route::delete('/admin/feedback/{feedback}', [FeedbackController::class, 'destroy'])->name('feedback.destroy');
});

/*
|--------------------------------------------------------------------------
| Other auth routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

//services ng admin

Route::get('/list-services', function () {
    $services = Service::all();
    return view('user.list_service', compact('services'));
})->name('list.services');

    // Feedback
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
    Route::post('/services/{service}/feedback', [FeedbackController::class, 'storeForService'])->name('feedback.storeForService');

    // My feedback page
    Route::get('/my-feedback', function () {
        $myFeedback = Feedback::where('user_id', Auth::id())->latest()->get();
        return view('user.feedback', compact('myFeedback'));
    })->name('user.feedback');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Auth scaffolding
require __DIR__ . '/auth.php';
