<nav class="bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex h-16 items-center justify-between">

            <a href="/" class="font-semibold text-lg text-blue-400">
                LaptopHub
            </a>

            <div class="hidden md:flex items-center gap-6">
                <a href="/" class="hover:text-blue-400">Beranda</a>
                <a href="{{ route('blog') }}" class="hover:text-blue-400">Blog</a>

                <div class="relative group">
                    <span class="cursor-pointer hover:text-blue-400">Kategori</span>
                    <div class="absolute left-0 mt-2 hidden group-hover:block bg-white text-gray-800 rounded shadow w-48">
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Gaming</a>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Pelajar</a>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Kerja</a>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Ultrabook</a>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Creator</a>
                    </div>
                </div>

                <a href="/tentang-kami" class="hover:text-blue-400">Tentang Kami</a>
            </div>

            <form action="{{ route('search') }}" method="GET" class="hidden md:flex">
                <input name="q" class="px-2 py-1 text-black rounded-l focus:outline-none" placeholder="Cari laptop">
                <button class="px-3 py-1 bg-blue-500 rounded-r hover:bg-blue-600">
                    Cari
                </button>
            </form>

            <div class="flex items-center gap-3">
                @guest
                    <a href="{{ route('login') }}" class="px-3 py-1 border border-blue-400 rounded hover:bg-blue-400 hover:text-black">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="px-3 py-1 bg-blue-500 rounded hover:bg-blue-600">
                        Register
                    </a>
                @endguest

                @auth
                    @if(auth()->user()->role === 'admin')
                        <a href="/dashboard" class="px-3 py-1 bg-green-500 rounded hover:bg-green-600 text-sm">
                            Dashboard
                        </a>
                    @endif

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="px-3 py-1 bg-red-500 rounded hover:bg-red-600 text-sm">
                            Logout
                        </button>
                    </form>
                @endauth
            </div>

        </div>
    </div>
</nav>
