<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>PrakWEB</title>
</head>

<body class="bg-gray-100">

    <!-- NAVBAR -->
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">

                <!-- Left -->
                <div class="flex items-center">
                    <!-- Mobile button -->
                    <button id="nav-toggle"
                        class="sm:hidden inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>

                    <!-- Desktop Menu -->
                    <div class="hidden sm:flex sm:space-x-4 ml-2">
                        <a href="/" class="px-3 py-2 text-sm font-medium text-gray-800 hover:text-blue-600">Beranda</a>
                        <a href="/blog" class="px-3 py-2 text-sm font-medium text-gray-800 hover:text-blue-600">Blog</a>
                        <a href="/categories" class="px-3 py-2 text-sm font-medium text-gray-800 hover:text-blue-600">Kategori</a>
                        <a href="/about" class="px-3 py-2 text-sm font-medium text-gray-800 hover:text-blue-600">Tentang Kami</a>
                    </div>
                </div>

                <!-- Right -->
                <div class="flex items-center space-x-3">
                    <a href="/login" class="bg-blue-600 text-white hover:bg-blue-700 px-3 py-2 rounded-md text-sm font-medium">
                        Masuk
                    </a>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="nav-menu" class="sm:hidden hidden">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <a href="/" class="block px-3 py-2 rounded-md text-base font-medium text-gray-800 hover:text-blue-600">Beranda</a>
                    <a href="/blog" class="block px-3 py-2 rounded-md text-base font-medium text-gray-800 hover:text-blue-600">Blog</a>
                    <a href="/categories" class="block px-3 py-2 rounded-md text-base font-medium text-gray-800 hover:text-blue-600">Kategori</a>
                    <a href="/about" class="block px-3 py-2 rounded-md text-base font-medium text-gray-800 hover:text-blue-600">Tentang Kami</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- TEMPAT KONTEN MASUK -->
    <div class="mt-6">
        @yield('content')
    </div>

    <script>
        document.getElementById("nav-toggle").addEventListener("click", function () {
            document.getElementById("nav-menu").classList.toggle("hidden");
        });
    </script>

</body>
</html>
