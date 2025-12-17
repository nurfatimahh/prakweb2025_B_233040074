<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Tambahkan Halaman slot baru dengan $title --}}
    @vite('resources/css/app.css')

    {{-- Flowbite --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
    <title>{{ $title }}</title>
</head>
<body>
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <a href="/dashboard" class="text-gray-800 font-semibold">Dashboard</a>
                </div>

                <div class="flex items-center">
                    @auth
                        <span class="text-sm text-gray-700 mr-3">{{ auth()->user()->name ?? auth()->user()->username }}</span>
                        <form action="{{ route('logout') }}" method="POST">@csrf
                            <button type="submit" class="inline-flex items-center bg-red-600 text-white hover:bg-red-700 px-3 py-2 rounded-md text-sm">Keluar</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="inline-flex items-center bg-blue-600 text-white hover:bg-blue-700 px-3 py-2 rounded-md text-sm">Masuk</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    {{ $slot }}
</body>
</html>