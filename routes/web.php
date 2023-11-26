<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register/proces', [AuthController::class, 'registerProces'])->name('register.proces');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login/proces', [AuthController::class, 'loginProces'])->name('login.proces');

Route::get('/', [BlogController::class, 'home'])->name('blog.home');
Route::get('/blog/{post}', [BlogController::class, 'detail'])->name('blog.detail');

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::group(['as' => 'admin.', 'prefix' => '/admin', 'middleware' => 'checkRole:Admin'], function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/user', [UserController::class, 'index'])->name('user.index');
    });
    
    Route::group(['as' => 'user.', 'prefix' => '/user', 'middleware' => 'checkRole:User'], function () {
        Route::get('/dashboard', [UserDashboardController::class, 'dashboard'])->name('dashboard');
    
        Route::resource('post', PostController::class);
    });

    Route::post('/comment/{post}', [BlogController::class, 'addComment'])->name('blog.comment');
    Route::post('/reply/{post_comment}', [BlogController::class, 'addReply'])->name('blog.reply');
});

