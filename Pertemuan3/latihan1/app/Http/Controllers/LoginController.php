<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
    public function showLoginForm() {
        return view('login');
    }
    public function login(Request $request) {
        // validasi input (email or username allowed)
        $request->validate([
            'email' => 'required|string',
            'password' => 'required',
        ]);

        $loginInput = $request->input('email');
        $loginField = filter_var($loginInput, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        //logic login dengan Auth::attempt (supports email or username)
        if (Auth::attempt([$loginField => $loginInput, 'password' => $request->input('password')], $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard.index'));
        }

        //Login gagal
        return back()->withErrors([
            'email' => 'Email/username atau password salah.',
        ])->onlyInput('email');
    }   
        public function logout(Request $request) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
    }
}
