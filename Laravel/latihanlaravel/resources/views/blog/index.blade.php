@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-bold mb-8 text-center text-gray-800">LaptopHub Blog</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($posts as $post)
        <div class="bg-white rounded-lg shadow hover:shadow-lg transition p-6 flex flex-col">
            @if($post->image)
                <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}" class="rounded mb-4 w-full h-48 object-cover">
            @else
                <div class="bg-gray-200 h-48 rounded mb-4 flex items-center justify-center text-gray-500">
                    No Image
                </div>
            @endif
            <h2 class="text-xl font-semibold mb-2 text-gray-800">
                <a href="{{ route('blog.show', $post) }}" class="hover:text-blue-600 transition">
                    {{ $post->title }}
                </a>
            </h2>
            <p class="text-gray-600 mb-4">{{ Str::limit($post->content, 120) }}</p>
            <div class="mt-auto text-sm text-gray-400">
                Diposting pada {{ $post->created_at->format('d M Y') }}
            </div>
        </div>
    @endforeach
</div>
@endsection
