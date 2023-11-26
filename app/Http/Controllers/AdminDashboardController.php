<?php

namespace App\Http\Controllers;

use App\Models\Post;

class AdminDashboardController extends Controller
{
    public function dashboard() {
        $posts = Post::all();
        return view('admin.dashboard.index', compact('posts'));
    }
}
