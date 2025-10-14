<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    /**
     * Display all programs & services
     */
  public function index()
    {
        $programs = Program::all(); // get all programs
        return view('admin.programs', compact('programs'));
    }

    /**
     * Show create page (optional)
     */
    public function create()
    {
        return view('admin.programs.create');
    }

    /**
     * Store new program / service
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only('name', 'description');

        // ✅ Store uploaded image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/programs', $filename);
            $data['image'] = $filename;
        }

        Program::create($data);

        return redirect()
            ->route('programs.index')
            ->with('success', 'Program created successfully!');
    }

    /**
     * Update existing program
     */
    public function update(Request $request, Program $program)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only('name', 'description');

        // ✅ Replace old image if new one uploaded
        if ($request->hasFile('image')) {
            if ($program->image && Storage::exists('public/programs/' . $program->image)) {
                Storage::delete('public/programs/' . $program->image);
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/programs', $filename);
            $data['image'] = $filename;
        }

        $program->update($data);

        return redirect()
            ->route('programs.index')
            ->with('success', 'Program updated successfully!');
    }

    /**
     * Delete program
     */
    public function destroy(Program $program)
    {
        if ($program->image && Storage::exists('public/programs/' . $program->image)) {
            Storage::delete('public/programs/' . $program->image);
        }

        $program->delete();

        return redirect()
            ->route('programs.index')
            ->with('success', 'Program deleted successfully!');
    }
}
