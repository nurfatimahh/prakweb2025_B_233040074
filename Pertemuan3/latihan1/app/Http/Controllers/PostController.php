<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // menggunakan eager loading untuk menghindari N+1
    public function index()
    {
        $posts = Post::with(['author', 'category'])->get();
        return view('posts', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('post', compact('post'));
    }
}