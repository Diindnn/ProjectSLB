<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Fungsi untuk mengarahkan pengguna ke halaman yang sesuai berdasarkan peran mereka
    public function home()
    {
        $user = auth()->user(); // Mendapatkan pengguna yang sedang login

        if (!$user) {
            return redirect('login'); // Jika pengguna tidak login, arahkan ke halaman login
        }

        // Arahkan pengguna berdasarkan peran mereka
        if ($user->role == 'admin') {
            return redirect('admin'); // Jika peran pengguna adalah admin, arahkan ke halaman admin
        }

        if ($user->role == 'guru') {
            return redirect('guru'); // Jika peran pengguna adalah guru, arahkan ke halaman guru
        }

        if ($user->role == 'parent') {
            return redirect('orangtua'); // Jika peran pengguna adalah orang tua, arahkan ke halaman orang tua
        }
    }

    // Fungsi untuk menampilkan halaman login
    public function showLogin()
    {
        return view('layouts.Login.halamanLogin'); // Menampilkan view halaman login
    }

    // Fungsi untuk menangani proses login
    public function doLogin(Request $request)
    {
        // Validasi input dari form login
        $request->validate([
            'email' => 'required|email', // Email harus diisi dan dalam format email yang benar
            'password' => 'required', // Password harus diisi
        ]);

        // Cek kredensial dan login
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user(); // Mendapatkan pengguna yang berhasil login

            // Arahkan pengguna berdasarkan peran mereka
            if ($user->role == 'admin') {
                return redirect('admin'); // Jika peran pengguna adalah admin, arahkan ke halaman admin
            }

            if ($user->role == 'guru') {
                return redirect('guru'); // Jika peran pengguna adalah guru, arahkan ke halaman guru
            }

            if ($user->role == 'parent') {
                return redirect('orangtua'); // Jika peran pengguna adalah orang tua, arahkan ke halaman orang tua
            }
        }

        // Jika login gagal, kembalikan ke halaman sebelumnya dengan pesan error
        return redirect()->back()->with('error', 'Akun tidak ditemukan');
    }

    // Fungsi untuk logout
    public function logout()
    {
        Auth::logout(); // Logout pengguna

        return redirect('login'); // Arahkan ke halaman login
    }
}
