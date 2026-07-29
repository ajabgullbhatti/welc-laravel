<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return response()->file(public_path('index.html'));
    }

    public function about()
    {
        return view('about');
    }

    public function courses()
    {
        return view('courses.index', [
            'courses' => [
                ['title' => 'Graphic Design with AI', 'duration' => '3 Months', 'category' => 'Graphic Design', 'price' => 'Rs 70,000'],
                ['title' => 'Video Editing', 'duration' => '2.5 Months', 'category' => 'Media', 'price' => 'Rs 60,000'],
                ['title' => 'Full Stack MERN Developer', 'duration' => '11 Months', 'category' => 'Development', 'price' => 'Rs 75,000'],
            ],
        ]);
    }

    public function gallery()
    {
        return view('gallery');
    }

    public function contact()
    {
        return view('contact');
    }
}
