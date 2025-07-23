<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TesdaRequest;

class TesdaRequestController extends Controller


{
    public function index()
    {
        
    $newRequests = TesdaRequest::where('status', 'Pending')->latest()->get();
    return view('admin.tesda_requests.index', compact('newRequests'));
}

    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:Pending,Approved,Rejected'
        ]);

        $req = TesdaRequest::findOrFail($id);
        $req->update(['status' => $validated['status']]);

        return redirect()->back()->with('success', 'Status updated!');
    }

    // ✅ NEW: show admin dashboard with recent requests
    public function dashboard()
    {
        // Get latest 10 new TESDA requests
        // pending only
$newRequests = TesdaRequest::where('status', 'Pending')
                ->orderBy('created_at', 'desc')
                ->take(10)
                ->get();

$approvedRequests = TesdaRequest::where('status', 'Approved')
                ->orderBy('created_at', 'desc')
                ->take(10)
                ->get();

return view('admin.dashboard', compact('newRequests', 'approvedRequests'));

    }
}
