<x-layout>
    <x-slot:title>
        Beranda
    </x-slot:title>

    <section class="max-w-7xl mx-auto px-6 py-12">
        <div class="grid md:grid-cols-3 gap-8">
            <div class="md:col-span-2">
                <h1 class="text-4xl font-bold">Tentang Teknologi</h1>
                <p class="mt-3 text-slate-700">Di halaman ini, kamu bisa menemukan informasi tentang beberapa topik teknologi penting yang kami bahas di situs ini. Pilih topik untuk melihat detailnya.</p>

                @if(isset($selected) && $selected)
                    <div class="mt-6 bg-white rounded-lg shadow p-6">
                        <h2 class="text-2xl font-semibold">{{ $selected['title'] }}</h2>
                        <p class="mt-2 text-slate-700">{{ $selected['description'] }}</p>
                        <div class="mt-4">
                            <a href="#" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md">Pelajari Lebih Dalam</a>
                        </div>
                    </div>
                @else
                    <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @foreach($features as $key => $f)
                            <div class="border rounded-lg p-4 bg-white/50">
                                <h3 class="font-semibold">{{ $f['title'] }}</h3>
                                <p class="text-slate-700 mt-1">{{ $f['description'] }}</p>
                                <div class="mt-3">
                                    <a href="{{ route('about', ['feature' => $key]) }}" class="inline-flex items-center px-3 py-1.5 bg-indigo-600 text-white rounded-md">Jelajahi</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <aside class="hidden md:block">
                <div class="p-4 border rounded-lg">
                    <h4 class="font-medium">Ringkasan</h4>
                    <ul class="mt-3 text-sm text-slate-600 space-y-2">
                        @foreach($features as $k => $f)
                            <li><a href="{{ route('about', ['feature' => $k]) }}" class="text-indigo-600 hover:underline">{{ $f['title'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </aside>
        </div>
    </section>

</x-layout>