<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::where('role', 'User')->get();
        return view('admin.user.index', compact('users'));
    }
}
