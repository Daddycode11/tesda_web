<?php

namespace App\Http\Controllers;

use App\Models\Career;

class CareerPublicController extends Controller
{
    public function index()
    {
        $careers = Career::latest()->get();
        return view('nav.careers', compact('careers'));
    }
}
