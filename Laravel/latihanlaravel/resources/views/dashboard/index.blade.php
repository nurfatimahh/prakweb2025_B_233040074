@extends('layout.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10">
    <h1 class="text-2xl font-semibold mb-6">Dashboard Admin</h1>

    <a href="{{ route('laptop.index') }}"
    class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Kelola Laptop
    </a>
</div>
@endsection
