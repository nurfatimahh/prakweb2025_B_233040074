<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    {{-- Tambahkan Halaman slot baru dengan $title --}}
    <title>{{ $title }}</title>
</head>
<body>
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center space-x-4">
                    <a href="/" class="text-gray-800 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Home</a>
                    <a href="/about" class="text-gray-800 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">About</a>
                    <a href="/posts" class="text-gray-800 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Posts</a>
                    <a href="/categories" class="text-gray-800 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Categories</a>
                    <a href="/contact" class="text-gray-800 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Contact</a>
                </div>

                <div class="flex items-center space-x-2">
                    <a href="/login" class="text-gray-800 hover:text-blue-600 px-3 py-2 rounded-md text-sm">Login</a>
                    <a href="/register" class="inline-flex items-center bg-blue-600 text-white hover:bg-blue-700 px-3 py-2 rounded-md text-sm font-medium">Register</a>
                </div>
            </div>
        </div>
    </nav>

    {{ $slot }}
</body>
</html>