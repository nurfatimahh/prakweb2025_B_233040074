@extends('layouts.auth')

@section('title', 'Register')

@section('content')
    <div class="w-full max-w-md bg-white rounded-xl shadow-md p-8">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Register</h2>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="mb-4 rounded-lg bg-red-100 p-3 text-sm text-red-700">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Registration Form -->
        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <!-- Name -->
            <div>
                <input
                    type="text"
                    name="name"
                    placeholder="Name"
                    value="{{ old('name') }}"
                    required
                    class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                >
            </div>

            <!-- Username -->
            <div>
                <input
                    type="text"
                    name="username"
                    placeholder="Username"
                    value="{{ old('username') }}"
                    required
                    class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                >
            </div>

            <!-- Email -->
            <div>
                <input
                    type="email"
                    name="email"
                    placeholder="Email Address"
                    value="{{ old('email') }}"
                    required
                    class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                >
            </div>

            <!-- Password -->
            <div>
                <input
                    type="password"
                    name="password"
                    placeholder="Password"
                    required
                    class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                >
            </div>

            <!-- Password Confirmation -->
            <div>
                <input
                    type="password"
                    name="password_confirmation"
                    placeholder="Confirm Password"
                    required
                    class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                >
            </div>

            <!-- Submit Button -->
            <button
                type="submit"
                class="w-full rounded-lg bg-indigo-600 py-2 font-semibold text-white hover:bg-indigo-700 transition"
            >
                Register
            </button>
        </form>

        <!-- Login Link -->
        <div class="mt-6 text-center text-sm text-gray-600">
            Already have an account?
            <a href="{{ route('login') }}" class="font-semibold text-indigo-600 hover:underline">
                Login
            </a>
        </div>
    </div>
</div>
@endsection
