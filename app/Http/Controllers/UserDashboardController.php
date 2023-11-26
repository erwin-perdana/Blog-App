<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function dashboard() {
        $posts = Post::where('user_id', Auth::id())->get();
        return view('user.dashboard.index', compact('posts'));
    }
}
