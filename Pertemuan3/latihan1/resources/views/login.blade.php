@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
    Login
</h2>

@if ($errors->any())
    <div class="mb-4 rounded-lg bg-red-100 p-3 text-sm text-red-700">
        {{ $errors->first() }}
    </div>
@endif

<form method="POST" action="{{ route('login') }}" class="space-y-4">
    @csrf

    <div>
        <input
            type="text"
            name="email"
            placeholder="Email / Username"
            value="{{ old('email') }}"
            required
            class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-indigo-500 focus:ring focus:ring-indigo-200"
        >
    </div>

    <div>
        <input
            type="password"
            name="password"
            placeholder="Password"
            required
            class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-indigo-500 focus:ring focus:ring-indigo-200"
        >
    </div>

    <button
        type="submit"
        class="w-full rounded-lg bg-indigo-600 py-2 font-semibold text-white hover:bg-indigo-700 transition"
    >
        Login
    </button>
</form>

<div class="mt-6 text-center text-sm text-gray-600">
    Belum punya akun?
    <a href="{{ route('register') }}" class="font-semibold text-indigo-600 hover:underline">
        Daftar
    </a>
</div>
@endsection
