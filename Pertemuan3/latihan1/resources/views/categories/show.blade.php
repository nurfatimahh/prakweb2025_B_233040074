<x-layout>
    <x-slot:title>{{ $category->name }}</x-slot:title>

    <section class="max-w-7xl mx-auto px-6 py-12">
        <div class="mb-6">
            <h1 class="text-3xl font-bold">{{ $category->name }}</h1>
            <p class="text-slate-600 mt-2">Artikel & materi yang termasuk dalam kategori {{ $category->name }}.</p>
        </div>

        @if($posts->isEmpty())
            <div class="p-6 bg-white rounded shadow">Belum ada posting untuk kategori ini.</div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($posts as $post)
                    <article class="bg-white rounded-lg shadow overflow-hidden">
                        <div class="p-4">
                            <h2 class="text-lg font-semibold">{{ $post->title }}</h2>
                            <p class="text-sm text-slate-600 mt-2">{{ \Illuminate\Support\Str::limit($post->excerpt ?? $post->body, 150) }}</p>
                            <div class="mt-3">
                                <a href="{{ route('posts.show', $post->slug) }}" class="text-indigo-600 hover:underline">Baca selengkapnya</a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $posts->links() }}
            </div>
        @endif
    </section>
</x-layout>
