<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::latest()->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('blog-images');
        }

        $data['slug'] = Str::slug($request->title);

        Post::create($data);

        return redirect('/dashboard/posts')
            ->with('success', 'Post berhasil ditambahkan!');
    }
}
