<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicFeedbackController extends Controller
{
    // Show the feedback form
    public function show()
    {
        return view('nav.feedback'); // make sure this matches your Blade path
    }

    // Handle form submission
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Save feedback or send email here
        // Example: session flash for demo
        return redirect()->back()->with('success', 'Thank you for your feedback!');
    }
}
