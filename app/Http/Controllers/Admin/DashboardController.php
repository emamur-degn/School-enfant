<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_posts' => Post::count(),
            'total_students' => 450,
            'total_teachers' => 32,
            'recent_posts' => Post::latest()->take(5)->get(),
        ];

        return view('backend.dashboard', compact('stats'));
    }
}