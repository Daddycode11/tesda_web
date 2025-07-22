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

/*
|--------------------------------------------------------------------------
| Public routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/schedules', function() {
    return view('user.schedules', [
        'schedules' => \App\Models\Schedule::latest()->get()
    ]);
})->name('user.schedules');

Route::get('/announcements', function() {
    return view('user.announcements', [
        'announcements' => \App\Models\Announcement::latest()->get()
    ]);
})->name('user.announcements');

// Public view list of services
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');

/*
|--------------------------------------------------------------------------
| Authenticated user routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    // User dashboard
    Route::get('/user', [UserDashboardController::class, 'index'])->name('user.dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User applies to schedule
    Route::post('/schedules/{schedule}/enroll', [EnrollmentController::class, 'store'])->name('enrollments.store');

    // Feedback
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store'); // general feedback
    Route::post('/services/{service}/feedback', [FeedbackController::class, 'storeForService'])->name('feedback.storeForService');
});

/*
|--------------------------------------------------------------------------
| Admin routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // CRUD resources
    Route::resource('services', ServiceController::class)->except(['index', 'show']);
    Route::resource('schedules', ScheduleController::class);
    Route::resource('announcements', AnnouncementController::class);

    // Enrollments manage
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
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Auth scaffolding
require __DIR__.'/auth.php';
