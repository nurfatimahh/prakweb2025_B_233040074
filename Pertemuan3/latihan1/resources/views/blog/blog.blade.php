@section('content')
@extends('components.layout')
@section('content')

<!-- Artikel Blog -->
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-10">
            Artikel Terbaru
        </h2>

        <div class="space-y-8">
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-2xl font-semibold mb-2">
                    Aksi Donasi Pendidikan di Desa Terpencil
                </h3>
                <p class="text-gray-700 mb-4">
                    Kegiatan donasi buku dan alat tulis untuk anak-anak
                    di daerah terpencil yang membutuhkan perhatian lebih.
                </p>
                <a href="/blog/bantuan-kesehatan-masyarakat" class="text-blue-600 font-semibold hover:underline">
                    Baca selengkapnya →
                </a>
            </div>

            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-2xl font-semibold mb-2">
                    Bantuan Kesehatan untuk Masyarakat Kurang Mampu
                </h3>
                <p class="text-gray-700 mb-4">
                    Program pemeriksaan gratis dan bantuan obat-obatan
                    bagi masyarakat yang membutuhkan.
                </p>
                <a href="/blog/aksi-donasi-pendidikan" class="text-blue-600 font-semibold hover:underline">
                    Baca selengkapnya →
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@endsection
