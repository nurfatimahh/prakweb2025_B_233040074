<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Donasi')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-green-700 text-white">
            <div class="p-6 text-xl font-bold">
                Admin Donasi
            </div>

            <nav class="px-4 space-y-2">
                <a href="#" class="block px-4 py-2 rounded hover:bg-green-600">
                    Dashboard
                </a>

                <a href="#" class="block px-4 py-2 rounded hover:bg-green-600">
                    Kategori Donasi
                </a>

                <a href="#" class="block px-4 py-2 rounded hover:bg-green-600">
                    Blog / Artikel
                </a>

                <a href="#" class="block px-4 py-2 rounded hover:bg-red-600">
                    Logout
                </a>
            </nav>
        </aside>

        <!-- Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>

    </div>

</body>
</html>
