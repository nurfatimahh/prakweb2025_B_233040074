<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaptopController;

Route::get('/', [LaptopController::class, 'index']);

Route::get('/about', function () {
    return view('about');
});

Route::get('/search', [LaptopController::class, 'search'])->name('search');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('/dashboard/laptop', LaptopController::class);
});

Route::get('/blog', function () {
    return view('blog.index');
})->name('blog');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

use App\Http\Controllers\AuthController;

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');

    Route::resource('/dashboard/laptop', LaptopController::class);
});
use App\Http\Controllers\BlogController;

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');
