@extends('layout.app')

@section('content')
<div class="max-w-4xl mx-auto py-8">

    <h1 class="text-2xl font-bold mb-6">
        Tambah Post Blog
    </h1>

    {{-- ALERT ERROR --}}
    @if ($errors->any())
        <div class="mb-4 rounded bg-red-100 p-4 text-red-700">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/dashboard/posts" method="POST" enctype="multipart/form-data"
          class="bg-white shadow rounded p-6 space-y-5">
        @csrf

        {{-- TITLE --}}
        <div>
            <label class="block font-medium mb-1">Judul</label>
            <input type="text" name="title"
                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400"
                   value="{{ old('title') }}" required>
        </div>

        {{-- EXCERPT --}}
        <div>
            <label class="block font-medium mb-1">Excerpt</label>
            <textarea name="excerpt" rows="3"
                      class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400"
                      required>{{ old('excerpt') }}</textarea>
        </div>

        {{-- BODY --}}
        <div>
            <label class="block font-medium mb-1">Isi Artikel</label>
            <textarea name="body" rows="8"
                      class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400"
                      required>{{ old('body') }}</textarea>
        </div>

        {{-- IMAGE --}}
        <div>
            <label class="block font-medium mb-1">Gambar (opsional)</label>
            <input type="file" name="image"
                   class="block w-full text-sm text-gray-600">
        </div>

        {{-- BUTTON --}}
        <div class="flex gap-3">
            <button type="submit"
                    class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">
                Simpan
            </button>

            <a href="/dashboard/posts"
               class="px-5 py-2 rounded border hover:bg-gray-100">
                Batal
            </a>
        </div>
    </form>

</div>
@endsection
