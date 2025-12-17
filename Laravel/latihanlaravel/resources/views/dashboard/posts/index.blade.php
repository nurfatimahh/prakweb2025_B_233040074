@extends('layout.app')

@section('content')
<div class="max-w-6xl mx-auto py-8">

    <h1 class="text-2xl font-bold mb-6">Dashboard Blog</h1>

    @if(session('success'))
        <div class="mb-4 bg-green-100 text-green-700 p-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    <a href="/dashboard/posts/create"
       class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-blue-600">
        + Tambah Post
    </a>

    <table class="w-full bg-white shadow rounded overflow-hidden">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3 text-left">Judul</th>
                <th class="p-3 text-center">Aksi</th>
            </tr>
        </thead>

        <tbody>
        @forelse($posts as $post)
            <tr class="border-t">
                <td class="p-3">{{ $post->title }}</td>
                <td class="p-3 flex justify-center gap-3">

                    {{-- PREVIEW --}}
                    <a href="/blog/{{ $post->slug }}"
                       class="text-blue-500 hover:underline">
                        Lihat
                    </a>

                    {{-- DELETE --}}
                    <form action="/dashboard/posts/{{ $post->id }}" method="POST"
                          onsubmit="return confirm('Yakin hapus post ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500 hover:underline">
                            Hapus
                        </button>
                    </form>

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="2" class="p-4 text-center text-gray-500">
                    Belum ada post
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

</div>
@endsection
