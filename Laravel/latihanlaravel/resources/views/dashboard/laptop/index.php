@extends('layout.app')

@section('content')
<h1 class="text-xl font-bold mb-4">Data Laptop</h1>

<a href="{{ route('laptop.create') }}" class="mb-4 inline-block px-4 py-2 bg-blue-500 text-white rounded">
+ Tambah Laptop
</a>

<table class="w-full border">
    <tr class="bg-gray-100">
        <th class="border p-2">Nama</th>
        <th class="border p-2">Kategori</th>
        <th class="border p-2">Aksi</th>
    </tr>

    @foreach($laptops as $item)
    <tr>
        <td class="border p-2">{{ $item->nama }}</td>
        <td class="border p-2">{{ $item->kategori }}</td>
        <td class="border p-2 flex gap-2">
            <a href="{{ route('laptop.edit', $item->id) }}"
            class="px-2 py-1 bg-yellow-400 rounded">Edit</a>

            <form method="POST" action="{{ route('laptop.destroy', $item->id) }}">
                @csrf
                @method('DELETE')
                <button class="px-2 py-1 bg-red-500 text-white rounded">
                    Hapus
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
