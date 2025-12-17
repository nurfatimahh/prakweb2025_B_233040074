@extends('layouts.admin')

@section('title', 'Kategori Donasi')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Kategori Donasi</h1>

    <a href="#" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
        + Tambah Kategori
    </a>
</div>

<div class="bg-white rounded shadow">
    <table class="w-full text-left">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-3">No</th>
                <th class="p-3">Nama Kategori</th>
                <th class="p-3">Aksi</th>
            </tr>
        </thead>

        <tbody>
            <tr class="border-t">
                <td class="p-3">1</td>
                <td class="p-3">Donasi Pendidikan</td>
                <td class="p-3 space-x-2">
                    <a href="#" class="text-blue-600 hover:underline">Edit</a>
                    <a href="#" class="text-red-600 hover:underline">Hapus</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
