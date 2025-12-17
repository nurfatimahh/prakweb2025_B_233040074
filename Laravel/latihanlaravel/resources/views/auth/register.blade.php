@extends('layout.app')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-semibold mb-6 text-center">Register</h1>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-4">
            <label class="block mb-1">Nama</label>
            <input type="text" name="name"
                class="w-full border px-3 py-2 rounded"
                value="{{ old('name') }}">
            @error('name')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1">Email</label>
            <input type="email" name="email"
                class="w-full border px-3 py-2 rounded"
                value="{{ old('email') }}">
            @error('email')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1">Password</label>
            <input type="password" name="password"
                class="w-full border px-3 py-2 rounded">
            @error('password')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1">Konfirmasi Password</label>
            <input type="password" name="password_confirmation"
                class="w-full border px-3 py-2 rounded">
        </div>

        <button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
            Register
        </button>
    </form>
</div>
@endsection
