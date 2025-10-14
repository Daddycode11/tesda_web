<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsPublicController extends Controller
{
    // 🏠 Landing page news display
    public function index()
    {
        // Get all published news
        $news = News::latest()->get();

        // Pass it to welcome.blade.php
        return view('welcome', compact('news'));
    }

    // 🔍 View single news article
    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('nav.news-show', compact('news'));
    }
}
