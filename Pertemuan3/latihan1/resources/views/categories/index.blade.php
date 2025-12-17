@extends('components.layout')

@section('title', 'Kategori Donasi')

@section('content')
<section class="max-w-6xl mx-auto py-16 px-6">
    <h2 class="text-3xl font-bold text-center mb-10">Kategori Donasi</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

        <!-- Donasi Pendidikan -->
        <a href="{{ route('categories.show', 'donasi-pendidikan') }}"
            class="p-6 bg-white shadow rounded-lg text-center hover:shadow-lg transition block">
            <h3 class="text-xl font-semibold mb-3 text-blue-600">
                Donasi Pendidikan
            </h3>
            <p class="text-gray-700">
                Membantu akses pendidikan bagi yang membutuhkan.
            </p>
        </a>

        <!-- Donasi Kesehatan -->
        <a href="{{ route('categories.show', 'donasi-kesehatan') }}"
            class="p-6 bg-white shadow rounded-lg text-center hover:shadow-lg transition block">
            <h3 class="text-xl font-semibold mb-3 text-green-600">
                Donasi Kesehatan
            </h3>
            <p class="text-gray-700">
                Dukungan untuk biaya pengobatan dan layanan kesehatan.
            </p>
        </a>

        <!-- Donasi Bencana -->
        <a href="{{ route('categories.show', 'donasi-bencana') }}"
            class="p-6 bg-white shadow rounded-lg text-center hover:shadow-lg transition block">
            <h3 class="text-xl font-semibold mb-3 text-red-600">
                Donasi Bencana
            </h3>
            <p class="text-gray-700">
                Bantuan cepat untuk korban bencana alam.
            </p>
        </a>

    </div>
</section>
@endsection
