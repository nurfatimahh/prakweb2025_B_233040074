<x-auth-layout>
    <x-slot:title>Register</x-slot:title>

    <div class="min-h-screen flex items-center justify-center py-12">
        <div class="w-full max-w-md bg-white rounded-xl shadow-md overflow-hidden p-8">
            <h2 class="text-3xl font-extrabold text-center mb-6">Buat Akun</h2>

            @if(session('success'))
                <div class="p-3 bg-green-50 border border-green-100 text-green-700 rounded mb-4">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="mb-4">
                    <ul class="list-disc list-inside text-sm text-red-600">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf


                <div>
                    <label class="block text-sm font-medium text-slate-700">Username</label>
                    <input name="username" value="{{ old('username') }}" required autofocus class="mt-1 block w-full rounded-md border border-slate-200 px-3 py-2" />
                    @error('username') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700">Password</label>
                    <input name="password" type="password" required class="mt-1 block w-full rounded-md border border-slate-200 px-3 py-2" />
                    @error('password') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700">Konfirmasi Password</label>
                    <input name="password_confirmation" type="password" required class="mt-1 block w-full rounded-md border border-slate-200 px-3 py-2" />
                </div>

                <div>
                    <button type="submit" class="w-full inline-flex justify-center items-center gap-2 bg-indigo-600 text-white px-4 py-2 rounded-md font-semibold hover:bg-indigo-700">Daftar</button>
                </div>
            </form>

            <div class="mt-4 text-sm text-center text-slate-600">
                Sudah punya akun? <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Masuk</a>
            </div>
        </div>
    </div>
</x-auth-layout>
