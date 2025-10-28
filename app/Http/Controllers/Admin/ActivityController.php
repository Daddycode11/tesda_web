<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
{
    /**
     * Display a listing of activities (Admin view)
     */
    public function index()
    {
        $activities = Activity::latest()->get();
        return view('admin.activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new activity
     */
    public function create()
    {
        return view('admin.activities.create');
    }

    /**
     * Store a newly created activity
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        Activity::create($request->only(['title', 'date', 'description']));

        return redirect()->route('admin.activities.index')->with('success', 'Activity added successfully.');
    }

    /**
     * Show the form for editing an activity
     */
    public function edit(Activity $activity)
    {
        return view('admin.activities.edit', compact('activity'));
    }

    /**
     * Update an activity
     */
    public function update(Request $request, Activity $activity)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        $activity->update($request->only(['title', 'date', 'description']));

        return redirect()->route('admin.activities.index')->with('success', 'Activity updated successfully.');
    }

    /**
     * Delete an activity
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();
        return redirect()->route('admin.activities.index')->with('success', 'Activity deleted.');
    }
}
