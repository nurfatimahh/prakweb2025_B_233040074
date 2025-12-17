@extends('components.layout')

@section('content')
<!-- Hero Detail Blog -->
<section class="bg-blue-600 text-white py-20 text-center">
    <h1 class="text-4xl font-bold mb-4">
        {{ str_replace('-', ' ', ucfirst($slug)) }}
    </h1>
    <p class="text-lg opacity-90">
        Artikel donasi dan cerita kebaikan
    </p>
</section>

<!-- Isi Artikel -->
<section class="max-w-4xl mx-auto py-16 px-6">
    <div class="bg-white shadow rounded-lg p-8">

        <p class="text-gray-700 leading-relaxed mb-6">
            Ini adalah halaman detail blog dengan slug
            <span class="font-semibold text-blue-600">
                "{{ $slug }}"
            </span>.
        </p>

        <p class="text-gray-700 leading-relaxed mb-6">
            Konten ini nantinya bisa kamu isi dari database.
            Untuk sekarang, ini masih contoh agar alur blog → detail
            bisa kamu pahami dengan jelas.
        </p>

        <p class="text-gray-700 leading-relaxed">
            Dengan halaman ini, pengunjung bisa membaca cerita lengkap
            mengenai kegiatan donasi, laporan penyaluran,
            maupun update terbaru.
        </p>

        <a href="/blog"
        class="inline-block mt-8 text-blue-600 font-semibold hover:underline">
            ← Kembali ke Blog
        </a>
    </div>
</section>
@endsection
