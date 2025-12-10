<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //Modul 2.2 START
    public function showRegistrationForm() {
        return view('register');
    }
    public function register(Request $request) {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Login register : validasi, hash password, user :: create
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirect ke login setelah register besrhasil
        return redirect('\login')->with('success', 'Registrasi berhasil! Silahkan Login.');
    }
}
