@extends('components.layout')

@section('title', $category->name)

@section('content')
<section class="max-w-4xl mx-auto py-20 px-6 text-center">
    <h1 class="text-4xl font-bold text-blue-600 mb-4">
        {{ $category->name }}
    </h1>

    <p class="text-gray-600 text-lg mb-10">
        Ini adalah halaman khusus untuk {{ strtolower($category->name) }}.
    </p>

    <a href="{{ route('categories.index') }}"
    class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
        ← Kembali ke Kategori
    </a>
</section>
@endsection
