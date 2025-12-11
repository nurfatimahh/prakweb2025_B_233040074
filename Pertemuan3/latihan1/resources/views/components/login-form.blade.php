<div class="min-h-screen flex items-center justify-center bg-slate-50 py-12">
    <div class="w-full max-w-md bg-white rounded-xl shadow-md overflow-hidden p-8">
        <h2 class="text-3xl font-extrabold text-center mb-6">LOGIN</h2>


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

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-slate-700">Email / Username</label>
                <input id="email" name="email" type="text" value="{{ old('email') }}" required autofocus placeholder="Masukkan email atau username" class="mt-1 block w-full rounded-md border border-slate-200 shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-slate-700">Password</label>
                <input id="password" name="password" type="password" required class="mt-1 block w-full rounded-md border border-slate-200 shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
            </div>

            <div class="flex items-center justify-between text-sm">
                <label class="inline-flex items-center gap-2 text-slate-700">
                </label>
                <a href="#" class="text-indigo-600 hover:underline">Lupa password?</a>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full inline-flex justify-center items-center gap-2 bg-indigo-600 text-white px-4 py-2 rounded-md font-semibold hover:bg-indigo-700">Masuk</button>
            </div>
        </form>

        <div class="mt-6 text-sm text-center text-slate-600">
            Belum punya akun? <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">Daftar</a>
        </div>
    </div>
</div>
