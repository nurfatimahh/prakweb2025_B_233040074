<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
</head>
<body>
    <article>
        <h1>{{ $post->title }}</h1>
        <p><strong>Kategori:</strong> {{ $post->category->name ?? '-' }} | <strong>Author:</strong> {{ $post->author->username ?? $post->author->name ?? '-' }}</p>
        @if($post->image)
            <div><img src="{{ Storage::disk('public')->url($post->image) }}" alt="{{ $post->title }}" style="max-width:600px"></div>
        @endif
        <div>{!! nl2br(e($post->body)) !!}</div>
    </article>
</body>
</html>