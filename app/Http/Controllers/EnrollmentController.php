<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    public function store(Schedule $schedule)
    {
        Enrollment::create([
            'user_id' => Auth::id(),
            'schedule_id' => $schedule->id,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Application submitted!');
    }

    // ✅ Only this index method:
    public function index(Request $request)
    {
        $query = Enrollment::with('user', 'schedule');

        if ($search = $request->input('search')) {
            $query->whereHas('user', function($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            })
            ->orWhereHas('schedule', function($q) use ($search) {
                $q->where('title', 'like', "%$search%");
            })
            ->orWhere('status', 'like', "%$search%");
        }

       $enrollments = $query->latest()->paginate(10);

        return view('admin.enrollments.index', compact('enrollments'));
    }

    public function approve(Enrollment $enrollment)
    {
        $enrollment->update(['status' => 'approved']);
        return back()->with('success', 'Enrollment approved.');
    }

    public function reject(Enrollment $enrollment)
    {
        $enrollment->update(['status' => 'rejected']);
        return back()->with('success', 'Enrollment rejected.');
    }

    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();
        return back()->with('success', 'Enrollment deleted.');
    }
    public function exportPdf()
{
    $enrollments = Enrollment::with('user', 'schedule')->latest()->get();

    $pdf = Pdf::loadView('admin.enrollments.pdf', compact('enrollments'));
    return $pdf->download('enrollments.pdf');
}
}
