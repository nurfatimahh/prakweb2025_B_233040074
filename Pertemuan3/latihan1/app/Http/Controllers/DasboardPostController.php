<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;

class DasboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //menggunakan user_id dari user yang sednag login
        $posts = Post::where('user_id', auth()->user()->id);

        //fitur search
        if(request('search')) {
            $posts->where('title', 'like', '%'.request('search').'%');
        }

        //menampilkan 5 data per halaman dengan pagination
        return view('dasboard.index', ['posts'=> $posts->paginate(5)->withQueryString()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Ambil data category untuk ditampilkan di form create post
        $categories = Category::all();
        return view('dasboard.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Generate slug dari title
        $slug = Str::slug($request->title);

        //Pastikan slug unique -jika sudah ada tambahkan angka di belakangnya
        $originalSlug = $slug;
        $counter = 1;
        while(Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        //Handle file upload 
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        //validasi input dengan custom massage
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'title.required' => 'The title field is required.',
            'excerpt.required' => 'The excerpt field is required.',
            'body.required' => 'The body field is required.',
            'category_id.required' => 'The category field is required.',
            'category_id.exists' => 'Category yang dipilih tidak valid.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg.',
            'image.max' => 'The image size must not exceed 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

    //Create post
    Post::create([
        'title' => $request->title,
        'slug' => $slug,
        'image' => $imagePath,
        'excerpt' => $request->excerpt,
        'body' => $request->body,
        'category_id' => $request->category_id,
        'user_id' => auth()->user()->id,
    ]);
        return redirect()->route('dashboard.index')->with('success', 'Post created successfully!');
        }




    /**
     * Display the specified resource.
     */
        public function show(Post $post) {
        return view('dashboard.show', [
            'post' => $post
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
