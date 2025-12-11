<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DasboardCategoryController extends Controller
{
    // Controller untuk manajemen kategori di dashboard (sesuai penamaan proyek)
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::orderBy('id','desc')->get();
        return view('dashboard.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|alpha_dash|unique:categories,slug',
            'image' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = Storage::disk('public')->put('categories', $request->file('image'));
        }

        Category::create($data);
        return redirect()->route('dashboard.categories.index')->with('success', 'Kategori dibuat');
    }

    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|alpha_dash|unique:categories,slug,' . $category->id,
            'image' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            if ($category->image && Storage::disk('public')->exists($category->image)) {
                Storage::disk('public')->delete($category->image);
            }
            $data['image'] = Storage::disk('public')->put('categories', $request->file('image'));
        }

        $category->update($data);
        return redirect()->route('dashboard.categories.index')->with('success', 'Kategori diperbarui');
    }

    public function destroy(Category $category)
    {
        if ($category->image && Storage::disk('public')->exists($category->image)) {
            Storage::disk('public')->delete($category->image);
        }
        $category->delete();
        return redirect()->route('dashboard.categories.index')->with('success', 'Kategori dihapus');
    }
}
