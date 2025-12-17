@extends('layouts.admin')

@section('title', 'Form Kategori Donasi')

@section('content')

<h1 class="text-2xl font-bold mb-6">Form Kategori Donasi</h1>

<div class="bg-white p-6 rounded shadow max-w-lg">
    <form action="#" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block mb-2 font-medium">Nama Kategori</label>
            <input type="text"
                   name="nama_kategori"
                   class="w-full border rounded px-3 py-2"
                   placeholder="Contoh: Donasi Kemanusiaan">
        </div>

        <div class="flex justify-end space-x-2">
            <a href="#" class="px-4 py-2 border rounded">
                Batal
            </a>

            <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                Simpan
            </button>
        </div>
    </form>
</div>

@endsection
