<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Menangani proses login
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

         if (Auth::attempt($credentials)) {
        // Jika autentikasi berhasil
        if (Auth::user()->username === 'admin') {
            return redirect()->intended('/admin/dashboard');
        } else {
            // Pengguna selain admin diarahkan ke halaman lain
            return redirect()->intended('/');
        }
        } else {
            // Jika autentikasi gagal
            return redirect()->route('login')->with('error', 'Username atau password salah.');
        }
    }


    // Menangani proses logout
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
