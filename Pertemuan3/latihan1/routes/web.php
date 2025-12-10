<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DasboardPostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('home');
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/categories', [CategoryController::class,'index']);

//Project post dan category dengan auth middleware
Route::get('/posts', [PostController::class, 'index'])->middleware('auth')->name('posts.show');

//Route model Binding dnegan slug 
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->middleware('auth')->name('posts.show');

//Route untuk registrasi - middleware guest (hanya untuk user yang belum login)
Route::get('/register', [RegisterController::class, 'showRegisterControllerForm'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'register'])->middleware('guest');

//Route untuk login - middleware guest (hanya untuk user yang belum login)
Route::get('/login', [LoginController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');

//Route untuk logout - middleware auth (hanya untuk user yang sudah login)
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

//Route untuk dasboard post - hanya untuk yng sudah login 
Route::get('/dashboard', [DasboardPostController::class, 'index'])->middleware('auth')->name('dashboard.index');

//Create - form untuk membuat post baru
Route::get('/dashboard/create', [DasboardPostController::class, 'create'])->middleware('auth')->name('dashboard.create');

//Store - menyimpan data post baru
Route::post('/dashboard', [DasboardPostController::class, 'store'])->middleware('auth')->name('dashboard.store');

//Show - menampilkan detail post berdasarkan slug
Route::get('/dashboard/{post:slug}', [DasboardPostController::class, 'show'])->middleware('auth','vefified')->name('dashboard.show');