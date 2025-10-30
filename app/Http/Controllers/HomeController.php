<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Seminar;

class HomeController extends Controller
{
    public function index()
    {
        $seminars = Seminar::where('date', '>', now())->take(3)->get();
        $about = About::first();
        
        return view('home', compact('seminars', 'about'));
    }

    public function about()
    {
        $about = About::first();
        return view('about', compact('about'));
    }

    public function seminars()
    {
        $seminars = Seminar::where('date', '>', now())->latest()->get();
        return view('seminars', compact('seminars'));
    }
}