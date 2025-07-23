<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TesdaRequest;
use Illuminate\Support\Facades\Auth;

class TesdaRequestController extends Controller
{
    public function index()
    {
        // get only the logged in user's requests, newest first
        $requests = TesdaRequest::where('user_id', Auth::id())
                                ->latest()
                                ->get();

        return view('tesda_requests.index', compact('requests'));
    }

    public function create()
    {
        return view('tesda_requests.create'); // show the fill-up form
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'request_type' => 'required|in:Scholarship,Assessment,Training',
            'message' => 'nullable|string|max:1000',
        ]);

        TesdaRequest::create([
            'user_id'       => Auth::id(),
            'request_type'  => $validated['request_type'],
            'name'          => Auth::user()->name,
            'email'         => Auth::user()->email,
            'message'       => $validated['message'],
            'status'        => 'Pending', // add default status - but dynamic after admin accepted//
        ]);

        return redirect()->route('user.requests.index')->with('success', 'Request submitted successfully!');
    }
}
