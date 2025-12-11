<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DasboardPostController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('home');
});

// About page with optional feature query parameter
Route::get('/about', function (Request $request) {
    $feature = $request->query('feature');

    // Load features from DB if table exists, otherwise fallback to defaults.
    try {
        $featuresDB = App\Models\Feature::orderBy('id', 'asc')->get();
        if ($featuresDB->count() > 0) {
            $features = $featuresDB->mapWithKeys(function ($f) {
                return [$f->key => ['title' => $f->title, 'description' => $f->description]];
            })->toArray();
            // pass models keyed by key for easier admin links
            $featuresModels = $featuresDB->keyBy('key');
        } else {
            $features = [
                'ai' => [
                    'title' => 'AI & ML',
                    'description' => 'Discover smart systems and models that power modern apps.',
                ],
                'cloud' => [
                    'title' => 'Cloud & DevOps',
                    'description' => 'Scalable cloud architectures and continuous delivery best practices.',
                ],
                'shield' => [
                    'title' => 'Security',
                    'description' => 'Secure design patterns and threat-resistant solutions.',
                ],
            ];
        }
    } catch (\Throwable $e) {
        // If DB not ready (e.g., migrations not run), fallback to defaults
        $features = [
            'ai' => [
                'title' => 'AI & ML',
                'description' => 'Discover smart systems and models that power modern apps.',
            ],
            'cloud' => [
                'title' => 'Cloud & DevOps',
                'description' => 'Scalable cloud architectures and continuous delivery best practices.',
            ],
            'shield' => [
                'title' => 'Security',
                'description' => 'Secure design patterns and threat-resistant solutions.',
            ],
        ];
    }

    $selected = $feature && isset($features[$feature]) ? array_merge(['key' => $feature], $features[$feature]) : null;

    // Make sure we pass $featuresModels (if available) or empty collection
    if (!isset($featuresModels)) {
        $featuresModels = collect([]);
    }

    return view('about', compact('selected', 'features', 'featuresModels'));
})->name('about');


Route::get('/posts', [PostController::class, 'index']);
Route::get('/categories', [CategoryController::class,'index']);
// Category show page (uses slug)
Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');

//Project post dan category dengan auth middleware
Route::get('/posts', [PostController::class, 'index'])->middleware('auth')->name('posts.show');

//Route model Binding dnegan slug 
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->middleware('auth')->name('posts.show');

//Route untuk registrasi - middleware guest (hanya untuk user yang belum login)
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->middleware('guest')->name('register');
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

// Features CRUD (manage features that appear on About page). Protected by auth.
Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/features', [FeatureController::class, 'index'])->name('dashboard.features.index');
    Route::get('/features/create', [FeatureController::class, 'create'])->name('dashboard.features.create');
    Route::post('/features', [FeatureController::class, 'store'])->name('dashboard.features.store');
    Route::get('/features/{feature}/edit', [FeatureController::class, 'edit'])->name('dashboard.features.edit');
    Route::put('/features/{feature}', [FeatureController::class, 'update'])->name('dashboard.features.update');
    Route::delete('/features/{feature}', [FeatureController::class, 'destroy'])->name('dashboard.features.destroy');
    
    // Category management routes (mengikuti penamaan Dasboard di proyek)
    Route::get('/categories', [App\Http\Controllers\DasboardCategoryController::class, 'index'])->name('dashboard.categories.index');
    Route::get('/categories/create', [App\Http\Controllers\DasboardCategoryController::class, 'create'])->name('dashboard.categories.create');
    Route::post('/categories', [App\Http\Controllers\DasboardCategoryController::class, 'store'])->name('dashboard.categories.store');
    Route::get('/categories/{category}/edit', [App\Http\Controllers\DasboardCategoryController::class, 'edit'])->name('dashboard.categories.edit');
    Route::put('/categories/{category}', [App\Http\Controllers\DasboardCategoryController::class, 'update'])->name('dashboard.categories.update');
    Route::delete('/categories/{category}', [App\Http\Controllers\DasboardCategoryController::class, 'destroy'])->name('dashboard.categories.destroy');
});