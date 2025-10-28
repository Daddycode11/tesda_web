<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Show all banners.
     */
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banners.index', compact('banners'));
    }

    /**
     * Store a new banner (supports AJAX).
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
        ]);

        $path = $request->file('image')->store('banners', 'public');

        $banner = Banner::create([
            'image_path' => $path,
        ]);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'id' => $banner->id,
                'path' => $path,
            ]);
        }

        return back()->with('success', 'Banner uploaded successfully!');
    }

    /**
     * Delete a banner (supports AJAX).
     */
    public function destroy(Request $request, Banner $banner)
    {
        Storage::disk('public')->delete($banner->image_path);
        $banner->delete();

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'id' => $banner->id,
            ]);
        }

        return back()->with('success', 'Banner deleted successfully!');
    }
}
