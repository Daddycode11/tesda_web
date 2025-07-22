<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    // User: feedback for specific service
    public function storeForService(Request $request, Service $service)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        Feedback::create([
            'user_id'    => Auth::id(),
            'service_id' => $service->id,
            'comment'    => $request->comment,
            'status'     => 'pending',
        ]);

        return back()->with('success', 'Feedback submitted!');
    }

    // User: general feedback
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        Feedback::create([
            'user_id' => Auth::id(),
            'content' => $request->content,
            'status'  => 'pending',
        ]);

        return back()->with('success', 'Feedback submitted! Thank you.');
    }

    // Admin: list all feedback
    public function index()
    {
        $feedback = Feedback::with('user', 'service')->latest()->get();
        return view('admin.feedback.index', compact('feedback'));
    }

    // Admin: delete feedback
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return back()->with('success', 'Feedback deleted!');
    }
}
