<section class="bg-gradient-to-r from-slate-900 to-indigo-900 text-white">
    <div class="max-w-7xl mx-auto px-6 py-16">
        <div class="grid md:grid-cols-2 gap-8 items-center">
            <!-- Hero -->
            <div>
                <h2 class="text-4xl sm:text-5xl font-extrabold tracking-tight leading-tight">Teknologi & Inovasi</h2>
                <p class="mt-4 text-slate-200 max-w-xl">Mendalami teknologi masa kini: kecerdasan buatan, cloud, dan praktik keamanan untuk membangun produk yang andal dan maju.</p>

                <div class="mt-8 flex gap-3">
                    <a href="{{ route('about') }}" class="inline-flex items-center px-5 py-3 bg-white text-indigo-900 font-semibold rounded-md shadow hover:scale-105 transition">Jelajahi</a>
                    <a href="{{ route('about') }}" class="inline-flex items-center px-5 py-3 border border-white/25 text-white hover:bg-white/5 font-medium rounded-md">Pelajari Lebih Lanjut</a>
                </div>
            </div>

            <!-- Feature cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @foreach($features as $feature)
                    <div class="bg-white/5 rounded-xl p-5 flex items-start gap-4">
                        <div class="flex-shrink-0 w-12 h-12 rounded-lg bg-white/10 flex items-center justify-center text-white">
                            @if($feature['icon'] === 'ai')
                                <!-- AI Icon -->
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 11V7a4 4 0 10-8 0v4M9 21v-4M15 21v-4M21 11v-4a4 4 0 10-8 0v4m8 0H3"></path>
                                </svg>
                            @elseif($feature['icon'] === 'cloud')
                                <!-- Cloud Icon -->
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 014-4h1.26A8 8 0 1119 16H7a4 4 0 01-4-1z"></path>
                                </svg>
                            @else
                                <!-- Security Icon -->
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 2.28-1.723 3.78-3 4 1.277.22 3 1.73 3 4 0-2.27 1.723-3.78 3-4-1.277-.22-3-1.72-3-4z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v6"></path>
                                </svg>
                            @endif
                        </div>
                        <div class="flex-1">
                            <h4 class="font-semibold text-lg">{{ $feature['title'] }}</h4>
                            <p class="text-slate-200 mt-1 text-sm">{{ $feature['description'] }}</p>
                            <div class="mt-3">
                                <a href="{{ route('about', ['feature' => $feature['icon']]) }}" class="inline-flex items-center px-3 py-1.5 bg-white/10 text-white rounded-md text-sm hover:bg-white/20">Jelajahi</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
