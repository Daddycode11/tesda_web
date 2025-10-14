<?php

namespace App\Http\Controllers;

use App\Models\Program;

class ProgramPublicController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        return view('nav.programs-services', compact('programs'));
    }
}
