@extends('layout.app')

@section('content')
<article class="max-w-3xl mx-auto">
    <h1 class="text-3xl font-bold mb-4">
        {{ $post->title }}
    </h1>

    <p class="text-gray-600 mb-6">
        {{ $post->created_at->format('d M Y') }}
    </p>

    <div class="prose max-w-none">
        {!! nl2br(e($post->body)) !!}
    </div>
</article>
@endsection

@if($post->image)
    <img src="{{ asset('storage/'.$post->image) }}"
        class="w-full rounded mb-6">
@endif
