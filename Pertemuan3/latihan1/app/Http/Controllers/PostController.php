<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller {
    //menggunakan with untuk mengatasi n+1 problem
    public function index() {
        $posts = Post::with(['outhor', 'category'])->get();
        return view('posts', compact('posts'));
    }
    public function show(Post $post) {
        return view('post', compact('post'));
    }

}