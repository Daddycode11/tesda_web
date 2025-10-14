<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transparency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TransparencyController extends Controller
{
    // Display all transparency records for admin
    public function index()
    {
        $transparencies = Transparency::latest()->get();
        return view('admin.transparency.index', compact('transparencies'));
    }

    // Show form to create a new transparency record
    public function create()
    {
        return view('admin.transparency.create');
    }

    // Store new transparency record
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|mimes:pdf,doc,docx,png,jpg,jpeg|max:10240',
        ]);

        $filePath = $request->file('file') ? $request->file('file')->store('transparency', 'public') : null;

        Transparency::create([
            'title' => $request->title,
            'description' => $request->description,
            'file' => $filePath,
        ]);

        return redirect()->route('admin.transparency.index')->with('success', 'Transparency record added successfully!');
    }

    // Show edit form
    public function edit(Transparency $transparency)
    {
        return view('admin.transparency.edit', compact('transparency'));
    }

    // Update transparency record
    public function update(Request $request, Transparency $transparency)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|mimes:pdf,doc,docx,png,jpg,jpeg|max:10240',
        ]);

        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($transparency->file && Storage::disk('public')->exists($transparency->file)) {
                Storage::disk('public')->delete($transparency->file);
            }
            $transparency->file = $request->file('file')->store('transparency', 'public');
        }

        $transparency->update([
            'title' => $request->title,
            'description' => $request->description,
            'file' => $transparency->file,
        ]);

        return redirect()->route('admin.transparency.index')->with('success', 'Transparency record updated successfully!');
    }

    // Delete a transparency record
    public function destroy(Transparency $transparency)
    {
        if ($transparency->file && Storage::disk('public')->exists($transparency->file)) {
            Storage::disk('public')->delete($transparency->file);
        }

        $transparency->delete();

        return redirect()->route('admin.transparency.index')->with('success', 'Transparency record deleted successfully!');
    }
}
