<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardCategoryController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		// include posts count for better overview in the dashboard
		$categories = Category::withCount('posts')->orderBy('id','desc')->get();
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
			'slug' => 'nullable|alpha_dash|unique:categories,slug',
			'image' => 'nullable|image|max:2048',
			'description' => 'nullable|string',
		]);

		// Generate slug from name when not provided and ensure uniqueness
		if (empty($data['slug'])) {
			$base = Str::slug($data['name']);
			$slug = $base;
			$i = 1;
			while (Category::where('slug', $slug)->exists()) {
				$slug = $base . '-' . $i;
				$i++;
			}
			$data['slug'] = $slug;
		}

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
			'slug' => 'nullable|alpha_dash|unique:categories,slug,' . $category->id,
			'image' => 'nullable|image|max:2048',
			'description' => 'nullable|string',
		]);

		// If slug not provided, generate one and ensure uniqueness (ignore current)
		if (empty($data['slug'])) {
			$base = Str::slug($data['name']);
			$slug = $base;
			$i = 1;
			while (Category::where('slug', $slug)->where('id','!=',$category->id)->exists()) {
				$slug = $base . '-' . $i;
				$i++;
			}
			$data['slug'] = $slug;
		}

		if ($request->hasFile('image')) {
			// delete old image if present
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

