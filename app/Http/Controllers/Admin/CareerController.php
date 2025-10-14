<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Career;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::latest()->get();
        return view('admin.careers.index', compact('careers'));
    }

    public function create()
    {
        return view('admin.careers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $career = new Career();
        $career->title = $request->title;
        $career->description = $request->description;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('careers', 'public');
            $career->image = $imagePath;
        }

        $career->save();

        return redirect()->route('admin.careers.index')->with('success', 'Career created successfully.');
    }

    public function edit(Career $career)
    {
        return view('admin.careers.edit', compact('career'));
    }

    public function update(Request $request, Career $career)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $career->title = $request->title;
        $career->description = $request->description;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('careers', 'public');
            $career->image = $imagePath;
        }

        $career->save();

        return redirect()->route('admin.careers.index')->with('success', 'Career updated successfully.');
    }

    public function destroy(Career $career)
    {
        if ($career->image && file_exists(public_path('storage/' . $career->image))) {
            unlink(public_path('storage/' . $career->image));
        }
        $career->delete();

        return redirect()->route('admin.careers.index')->with('success', 'Career deleted successfully.');
    }
}
