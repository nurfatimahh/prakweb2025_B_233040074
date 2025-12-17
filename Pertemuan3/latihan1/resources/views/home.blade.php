@extends('components.layout')

@section('content')
<!-- Hero Section -->
<section class="bg-blue-600 text-white py-20 text-center">
    <h1 class="text-4xl font-bold mb-4">Mari Berbagi, Mari Berdonasi</h1>
    <p class="text-lg opacity-90">Setiap bantuan yang kamu berikan akan mengubah hidup seseorang.</p>

    <a href="#donasi" 
       class="mt-6 inline-block bg-white text-blue-600 font-semibold px-6 py-3 rounded-lg shadow hover:bg-gray-100 transition">
        Mulai Donasi
    </a>
</section>

<!-- Tentang Donasi -->
<section class="max-w-6xl mx-auto py-16 px-6">
    <h2 class="text-3xl font-bold text-center mb-8">Kenapa Donasi Itu Penting?</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
        <div class="p-6 bg-white shadow rounded-lg text-center">
            <h3 class="text-xl font-semibold mb-3">💙 Membantu Sesama</h3>
            <p class="text-gray-700">Donasi kamu membantu mereka yang membutuhkan bantuan mendesak.</p>
        </div>

        <div class="p-6 bg-white shadow rounded-lg text-center">
            <h3 class="text-xl font-semibold mb-3">🌱 Manfaat Berkelanjutan</h3>
            <p class="text-gray-700">Setiap kontribusi menciptakan dampak jangka panjang bagi penerima.</p>
        </div>

        <div class="p-6 bg-white shadow rounded-lg text-center">
            <h3 class="text-xl font-semibold mb-3">🤝 Transparan & Terpercaya</h3>
            <p class="text-gray-700">Kami memastikan setiap dana tersalurkan dengan tepat.</p>
        </div>
    </div>
</section>

<!-- Form Donasi -->
<section id="donasi" class="bg-gray-100 py-16">
    <div class="max-w-4xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-8">Form Donasi</h2>

        <form class="bg-white shadow rounded-lg p-6 space-y-4">
            <div>
                <label class="font-semibold">Nama Lengkap</label>
                <input type="text" class="w-full px-4 py-2 border rounded-lg" placeholder="Nama kamu...">
            </div>

            <div>
                <label class="font-semibold">Nominal Donasi</label>
                <input type="number" class="w-full px-4 py-2 border rounded-lg" placeholder="Masukkan nominal...">
            </div>

            <div>
                <label class="font-semibold">Pesan (Opsional)</label>
                <textarea class="w-full px-4 py-2 border rounded-lg" rows="3" placeholder="Tulis pesan..."></textarea>
            </div>

            <button type="submit" 
                class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 transition">
                Kirim Donasi
            </button>
        </form>
    </div>
</section>
@endsection
