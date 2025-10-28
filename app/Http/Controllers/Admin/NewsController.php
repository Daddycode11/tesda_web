<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    // ===== ADMIN METHODS =====

    /** 
     * Display all news in admin panel
     */
    public function index()
    {
        $news = News::latest()->get();
        return view('admin.news.index', compact('news'));
    }

    /** 
     * Store a new news record
     * Automatically creates storage/news if missing
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only('title', 'description');

        // Ensure folder exists
        if (!Storage::exists('public/news')) {
            Storage::makeDirectory('public/news', 0775, true);
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $file->storeAs('public/news', $filename);
            $data['image'] = $filename;
        }

        News::create($data);

        return redirect()->back()->with('success', 'News created successfully!');
    }

    /** 
     * Update existing news (safe folder and old image handling)
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only('title', 'description');

        // Ensure folder exists
        if (!Storage::exists('public/news')) {
            Storage::makeDirectory('public/news', 0775, true);
        }

        // Handle new image
        if ($request->hasFile('image')) {
            // Delete old image safely
            if ($news->image && Storage::exists('public/news/' . $news->image)) {
                Storage::delete('public/news/' . $news->image);
            }

            $file = $request->file('image');
            $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $file->storeAs('public/news', $filename);
            $data['image'] = $filename;
        }

        $news->update($data);

        return redirect()->back()->with('success', 'News updated successfully!');
    }

    /** 
     * Delete news
     */
    public function destroy(News $news)
    {
        if ($news->image && Storage::exists('public/news/' . $news->image)) {
            Storage::delete('public/news/' . $news->image);
        }

        $news->delete();
        return redirect()->back()->with('success', 'News deleted successfully!');
    }

    // ===== FRONTEND METHODS =====

    /** 
     * Display paginated news on frontend
     */
    public function frontendIndex()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(9);
        return view('user.news.index', compact('news'));
    }

    /** 
     * Display a single news item (for route: news.frontend.show)
     */
    public function frontendShow($id)
    {
        $news = News::findOrFail($id);
        return view('user.news.show', compact('news'));
    }
}
