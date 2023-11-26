<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function registerProces(RegisterRequest $request){
        $validated = $request->validated();

        DB::beginTransaction();

        try {
            $validated['password'] = Hash::make($validated['password']);
            $validated['role'] = "User";

            User::create($validated);
            DB::commit();
            return redirect()->route('login');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('register');
        }
    }

    public function login(){
        if(Auth::check()){
            return redirect()->route('home');
        }else{
            return view('auth.login');
        }
    }

    public function loginProces(LoginRequest $request)
    {
        $validated = $request->validated();

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            $user = User::where('email', $validated['email'])->first();
            // redirect berdasarkan role
            if($user->role == "Admin") return redirect()->route('admin.dashboard');

            return redirect()->route('user.dashboard');
        }

        return back()->with('status', 'Invalid username or password');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
