<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;


Route::get('/', fn () => view('home'));

Route::get('/about', fn () => view('about'))->name('about');

Route::get('/blog', fn () => redirect()->route('categories.index'))->name('blog');

Route::get('/categories', [CategoryController::class,'index'])->name('categories.index');
Route::get('/categories/{category:slug}', [CategoryController::class,'show'])->name('categories.show');

Route::get('/login', [LoginController::class,'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class,'login']);
Route::post('/logout', [LoginController::class,'logout'])->middleware('auth')->name('logout');

Route::get('/register', [RegisterController::class,'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class,'register']);

Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardPostController::class,'index'])->name('dashboard.index');
});
Route::get('/blog', function () {return view('blog.blog');})->name('blog');

Route::get('/blog/{slug}', function ($slug) { return view('blog.detail', compact('slug'));
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    });
});
