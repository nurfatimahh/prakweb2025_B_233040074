@extends('layouts.admin')

@section('title', 'Form Artikel Donasi')

@section('content')

<h1 class="text-2xl font-bold mb-6">Form Artikel Donasi</h1>

<div class="bg-white p-6 rounded shadow">
    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block mb-2 font-medium">Judul Artikel</label>
            <input type="text"
                   name="judul"
                   class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-medium">Kategori Donasi</label>
            <select name="kategori_id" class="w-full border rounded px-3 py-2">
                <option>Donasi Pendidikan</option>
                <option>Donasi Kemanusiaan</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-medium">Artikel Terbaru</label>
            <textarea name="konten"
                      rows="5"
                      class="w-full border rounded px-3 py-2"></textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-medium">Gambar</label>
            <input type="file" name="gambar">
        </div>

        <div class="flex justify-end space-x-2">
            <a href="#" class="px-4 py-2 border rounded">
                Batal
            </a>

            <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                Simpan Artikel
            </button>
        </div>
    </form>
</div>

@endsection
