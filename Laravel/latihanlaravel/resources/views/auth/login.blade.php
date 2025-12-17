@extends('layout.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-md bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-semibold text-center mb-6">Login</h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label class="block mb-1">Email</label>
                <input type="email" name="email"
                    class="w-full border px-3 py-2 rounded focus:outline-none focus:ring"
                    value="{{ old('email') }}">
                @error('email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1">Password</label>
                <input type="password" name="password"
                    class="w-full border px-3 py-2 rounded focus:outline-none focus:ring">
            </div>

            <button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                Login
            </button>
        </form>

        <p class="text-sm text-center mt-4">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">
                Register
            </a>
        </p>
    </div>
</div>
@endsection
