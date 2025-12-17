@extends('layout.app')

@section('content')

<!-- HERO -->
<section class="bg-white rounded-lg shadow p-8 mb-10">
    <div class="grid md:grid-cols-2 gap-6 items-center">
        <div>
            <h1 class="text-4xl font-bold mb-4">
                Temukan Laptop <span class="text-blue-500">Terbaik</span> Untuk Kebutuhanmu
            </h1>
            <p class="text-gray-600 mb-6">
                LaptopHub membantu kamu memilih laptop terbaik untuk gaming, kerja,
                kuliah, dan content creation.
            </p>
            <a href="/kategori"
            class="inline-block bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
                Lihat Kategori
            </a>
        </div>

        <div class="hidden md:block">
            <img src="https://cdn-icons-png.flaticon.com/512/841/841364.png"
                class="w-72 mx-auto opacity-90"
                 alt="Laptop">
        </div>
    </div>
</section>

<!-- LAPTOP TERBARU -->
<section class="mb-12">
    <h2 class="text-2xl font-semibold mb-6">Laptop Terbaru</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

        @forelse($laptops as $item)
            <div class="bg-white rounded-lg shadow hover:shadow-lg transition p-4">
                <div class="h-40 bg-gray-100 rounded mb-3 flex items-center justify-center">
                    <span class="text-gray-400 text-sm">Gambar Laptop</span>
                </div>

                <h3 class="font-semibold text-lg">{{ $item->nama }}</h3>
                <p class="text-sm text-gray-500 mb-2">{{ $item->kategori }}</p>

                <p class="text-blue-500 font-semibold">
                    Rp {{ number_format($item->harga, 0, ',', '.') }}
                </p>
            </div>
        @empty
            <div class="col-span-3 text-center text-gray-500">
                Belum ada data laptop 😢
            </div>
        @endforelse

    </div>
</section>

<!-- KATEGORI -->
<section class="bg-white rounded-lg shadow p-8">
    <h2 class="text-2xl font-semibold mb-6 text-center">Kategori Laptop</h2>

    <div class="grid grid-cols-2 md:grid-cols-5 gap-4 text-center">
        @foreach(['Gaming', 'Pelajar', 'Kerja', 'Ultrabook', 'Creator'] as $kategori)
            <div class="border rounded-lg py-6 hover:bg-blue-500 hover:text-white transition cursor-pointer">
                <p class="font-semibold">{{ $kategori }}</p>
            </div>
        @endforeach
    </div>
</section>

@endsection
