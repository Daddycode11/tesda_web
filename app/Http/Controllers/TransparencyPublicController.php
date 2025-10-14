<?php

namespace App\Http\Controllers;

use App\Models\Transparency;
use Illuminate\Http\Request;

class TransparencyPublicController extends Controller
{
    // Show landing page transparency records and optional submission form
  public function index()
{
    $transparencies = Transparency::latest()->get();
    return view('nav.transparency', compact('transparencies'));
}

    // Optional: handle public submission (if needed)
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

        return redirect()->back()->with('success', 'Transparency record submitted successfully!');
    }
}
