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
use App\Http\Controllers\TesdaRequestController;
use App\Http\Controllers\Admin\TesdaRequestController as AdminTesdaRequestController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Admin\MessageController as AdminMessageController;
use App\Http\Controllers\Admin\TransparencyController;
use App\Http\Controllers\TransparencyPublicController;
use App\Http\Controllers\PublicFeedbackController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\ProgramPublicController;
use App\Http\Controllers\Admin\CareerController;
use App\Models\Career;
use App\Http\Controllers\CareerPublicController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\NewsPublicController;
use App\Models\News;

/*
|--------------------------------------------------------------------------
| Public routes
|--------------------------------------------------------------------------
*/

// Static pages
Route::view('/history', 'nav.history');
Route::view('/mission-vision', 'nav.mission-vision');
Route::view('/structure', 'nav.structure');
// Route::view('/careers', 'nav.careers');
Route::view('/programs-services', 'nav.programs-services');
Route::view('/contacts', 'nav.contacts');

// Landing page
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Public transparency page
Route::get('/transparency', [TransparencyPublicController::class, 'index'])
    ->name('transparency.public');

// Optional: public transparency submission
Route::post('/transparency', [TransparencyPublicController::class, 'store'])
    ->name('transparency.public.store');

// Admin transparency CRUD (protected)
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('transparency', TransparencyController::class);
});

// Admin Routes - Careers Management
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::resource('careers', CareerController::class)->except(['show', 'edit', 'update']);
});
Route::get('/careers', [CareerPublicController::class, 'index'])->name('careers.public');

Route::get('/', function () {
    $news = \App\Models\News::latest()->paginate(6); // 6 news per page
    return view('welcome', compact('news'));
})->name('welcome');

// Landing page: display news
Route::get('/', function () {
    $news = News::latest()->paginate(6);
    return view('welcome', compact('news'));
})->name('welcome');
// Public single news page
Route::get('/news/{id}', [NewsPublicController::class, 'show'])->name('news.show');

// Admin resource routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('news', NewsController::class);
});

// 📰 Public route to show single news
Route::get('/news/{id}', [NewsPublicController::class, 'show'])->name('news.show');

// 🔒 Admin routes (for managing news in dashboard)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('news', NewsController::class);
});
/*
|--------------------------------------------------------------------------
| Public Feedback Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware(['auth'])->group(function() {
    Route::resource('programs', ProgramController::class);
});

Route::get('/programs-services', [ProgramPublicController::class, 'index']);

Route::get('/programs-services', [ProgramPublicController::class, 'index'])->name('programs-services');
// Protected requests
Route::middleware(['auth'])->group(function () {
    Route::get('/request/create', [TesdaRequestController::class, 'create'])->name('request.create');
    Route::post('/request', [TesdaRequestController::class, 'store'])->name('request.store');
});

    // ✅ New: view all submitted requests by this user
    Route::get('/my-requests', [TesdaRequestController::class, 'index'])->name('user.requests.index');

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

Route::middleware('role:user')->group(function () {
    // User dashboard
    Route::get('/user', [UserDashboardController::class, 'index'])->name('user.dashboard');

});
Route::view('/mission', 'mission')->name('mission');
Route::view('/vision', 'vision')->name('vision');

/*
|--------------------------------------------------------------------------
| Admin routes
|--------------------------------------------------------------------------
*/

// Route::get('/admin', function () {
//     return view('admin.dashboard');
// })->name('admin.dashboard');


Route::middleware('role:admin')->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

  
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
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
    Route::post('/feedback/{feedback}/approve', [FeedbackController::class, 'approve'])->name('feedback.approve');
    Route::delete('/feedback/{feedback}', [FeedbackController::class, 'destroy'])->name('feedback.destroy');
});

/*
|--------------------------------------------------------------------------
| TESDA Request Routes
|--------------------------------------------------------------------------
*/

// USER SIDE TESDA REQUESTS
Route::prefix('user')->middleware('role:user')->group(function () {
    Route::get('/requests', [TesdaRequestController::class, 'index'])->name('user.requests.index');
    Route::get('/requests/create', [TesdaRequestController::class, 'create'])->name('user.requests.create');
    Route::post('/requests', [TesdaRequestController::class, 'store'])->name('user.requests.store');
});



// ADMIN SIDE TESDA REQUESTS
Route::prefix('admin')->name('admin.')->middleware('role:admin')->group(function () {
    Route::get('/tesda_requests', [AdminTesdaRequestController::class, 'index'])->name('tesda_requests.index');
    Route::post('/tesda_requests/{id}/status', [AdminTesdaRequestController::class, 'updateStatus'])->name('tesda_requests.updateStatus');
    Route::get('/', [AdminTesdaRequestController::class, 'dashboard'])->name('dashboard');  // dashboard shows new requests
});

/*
|--------------------------------------------------------------------------
| Other auth routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
//services ng admin

Route::get('/list-services', function () {
    $services = Service::all();
    return view('user.list_service', compact('services'));
})->name('list.services');

    // Feedback
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
    Route::post('/services/{service}/feedback', [FeedbackController::class, 'storeForService'])->name('feedback.storeForService');
    Route::get('/admin/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
    // My feedback page
    Route::get('/my-feedback', function () {
        $myFeedback = Feedback::where('user_id', Auth::id())->latest()->get();
        return view('user.feedback', compact('myFeedback'));
    })->name('user.feedback');
/*
|--------------------------------------------------------------------------
| Chat / Messages Routes
|--------------------------------------------------------------------------
*/
// 🔹 User Chat (user ↔ admin)
Route::middleware('auth')->group(function () {
Route::get('/chat', [MessageController::class, 'index'])->name('chat.index');
Route::post('/chat/send', [MessageController::class, 'store'])->name('chat.send');


    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');   
    Route::post('/messages/send', [MessageController::class, 'store'])->name('messages.store'); 
});
// 🔹 Admin Chat
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/messages', [MessageController::class, 'adminIndex'])->name('admin.messages.index');   // list of users
    Route::get('/messages/{userId}', [MessageController::class, 'adminReply'])->name('admin.messages.reply'); // open chat with user
    Route::post('/messages/{userId}/send', [MessageController::class, 'adminSend'])->name('admin.messages.send'); // reply
});


// User side
    Route::middleware(['auth'])->group(function () {
    Route::get('/request/create', [TesdaRequestController::class, 'create'])->name('request.create');
    Route::post('/request', [TesdaRequestController::class, 'store'])->name('request.store');
});

// Admin side
    Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/tesda_requests', [AdminTesdaRequestController::class, 'index'])->name('tesda_requests.index');
    Route::post('/tesda_requests/{id}/status', [AdminTesdaRequestController::class, 'updateStatus'])->name('tesda_requests.updateStatus');
});
    Route::prefix('user')->middleware(['auth'])->group(function () {
    Route::get('/requests', [TesdaRequestController::class, 'index'])->name('user.requests.index');
    Route::get('/requests/create', [TesdaRequestController::class, 'create'])->name('user.requests.create');
    Route::post('/requests', [TesdaRequestController::class, 'store'])->name('user.requests.store');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Auth scaffolding
require __DIR__ . '/auth.php';
