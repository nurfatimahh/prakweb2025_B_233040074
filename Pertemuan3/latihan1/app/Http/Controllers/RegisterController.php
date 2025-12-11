<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    //Modul 2.2 START
    public function showRegistrationForm() {
        return view('register');
    }

    public function register(Request $request) {
        // Validasi input: username + password (konfirmasi)
        $request->validate([
            'username' => 'required|alpha_dash|min:3|max:255|unique:users,username',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $username = $request->username;

        // Generate fallback email using username to satisfy DB constraints
        $email = $username . '@example.com';
        $j = 1;
        while (User::where('email', $email)->exists()) {
            $email = $username . $j . '@example.com';
            $j++;
        }

        // Create user (use username as name)
        User::create([
            'name' => $username,
            'username' => $username,
            'email' => $email,
            'password' => Hash::make($request->password),
        ]);

        // Redirect ke login setelah register berhasil
        return redirect()->route('login')->with('success', 'Registrasi berhasil!');
    }
}
