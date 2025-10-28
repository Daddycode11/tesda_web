<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Announcement;
use App\Models\Activity;
use App\Models\News; // <-- add this

class LandingController extends Controller
{
    /**
     * Show the landing page with banners, announcements, activities, and news.
     */
    public function index()
    {
        // Fetch all banners, latest first
        $banners = Banner::latest()->get();

        // Fetch all announcements, latest first
        $announcements = Announcement::latest()->get();

        // Fetch all activities
        $activities = Activity::latest()->get();

        // Prepare JSON-safe activities
        $activitiesJson = $activities->map(function($a) {
            return [
                'id' => $a->id,
                'title' => $a->title,
                'description' => $a->description ?? '',
                'start' => $a->date->format('Y-m-d'),
            ];
        });

        // Fetch all news, latest first
        $news = News::latest()->get(); // <-- added this

        // Pass everything to the view
        return view('welcome', compact('banners', 'announcements', 'activities', 'news', 'activitiesJson'));
    }
}
