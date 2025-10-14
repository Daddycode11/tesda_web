<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    // ✅ Show list of news
    public function index()
    {
        $news = News::latest()->get();
        return view('admin.news.index', compact('news'));
    }

    // ✅ Store new news
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('image')) {
            $filename = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/news', $filename);
            $data['image'] = $filename;
        }

        News::create($data);

        return redirect()->route('admin.news.index')
            ->with('success', '📰 News created successfully!');
    }

    // ✅ Show individual news (for modal)
    public function show(News $news)
    {
        return response()->json($news);
    }

    // ✅ Update existing news
    public function update(Request $request, News $news)
    {
     $validated = $request->validate([
    'name' => 'required|string|max:255',
    'content' => 'required',
    'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($news->image && Storage::exists('public/news/'.$news->image)) {
                Storage::delete('public/news/'.$news->image);
            }

            $filename = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/news', $filename);
            $data['image'] = $filename;
        }

        $news->update($data);

        return redirect()->route('admin.news.index')
            ->with('success', '✏️ News updated successfully!');
    }

    //  Delete news
    public function destroy(News $news)
    {
        if ($news->image && Storage::exists('public/news/'.$news->image)) {
            Storage::delete('public/news/'.$news->image);
        }

        $news->delete();

        return redirect()->route('admin.news.index')
            ->with('success', '🗑️ News deleted successfully!');
    }
}
