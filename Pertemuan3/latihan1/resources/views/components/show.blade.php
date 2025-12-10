<x-dashboard-layout>
    <x-slot:title>
        {{ $post->title }} - Dashboard
    </x-slot:title>

    <article class="max-w-4xl mx-auto">
        <header class="mb-8">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ $post->title }}</h1>

            <div class="flex items-center text-sm text-gray-500 mb-4">
                <span class="mr-4">By {{ $post->author->name ?? auth()->user() }}</span>
                <span class="mr-4">Category : {{ $post->category->name ?? 'Uncategorized' }}|
                </span>

                <span>{{ $post->created_at->format('d M Y') }}</span>
            </div>

            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}"
                    alt="{{ $post->title }}"
                    class="w-full h-64 object-cover rounded-lg mb-6">
            @endif

            <div class="prose prose-lg max-w-none mb-6">
                <p>{{ $post->excerpt }}</p>

                <div class="mt-4 leading-relaxed">
                    {!! $post->body !!}
                </div>
            </div>

            <footer class="mt-8 pt-8 border-t border-gray-300">
                <a href="{{ route('dashboard.index') }}"
                class="flex items-center text-blue-600 hover:text-blue-800 font-medium">
                    ← Back to Dashboard
                </a>
            </footer>

        </article>
    </x-dashboard-layout>
