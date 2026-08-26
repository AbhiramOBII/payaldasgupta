<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Service;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $services = Service::where('status', 'active')
            ->orderBy('sort_order')
            ->get();

        $latestPosts = Post::published()
            ->latest()
            ->take(3)
            ->get();

        return view('welcome', compact('services', 'latestPosts'));
    }
}
