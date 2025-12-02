<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Tambahkan Halaman slot baru dengan $title --}}
    <title>{{ $title }}</title>
</head>
<body>
    <nav>
        <a href="/">Home</a>
        <a href="/about">About</a>
        <a href="/posts">Posts</a>
        <a href="/categories">Categories</a>
        <a href="/contact">Contact</a>
    </nav>

    {{ $slot }}
</body>
</html>