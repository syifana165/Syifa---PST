<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\M_User;
use Illuminate\Support\Facades\Hash;

class C_Login extends Controller
{
    // Tampilkan form login
    public function showLogin()
    {
        return view('v_login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = M_User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            $request->session()->regenerate();

            // Redirect berdasarkan level user
            if ($user->level == 1) {
                return redirect()->route('pengaduan.index');  // Kepala Bidang
            } elseif ($user->level == 2) {
                return redirect()->route('pengaduan.index'); // Penanggung Jawab
            } elseif ($user->level == 3) {
                return redirect()->route('petugaslapangan.index'); // Petugas Lapangan
            } else {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Level user tidak dikenali.',
                ]);
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // Tampilkan form register
    public function showRegister()
    {
        return view('v_register');
    }

    // Proses register
    public function register(Request $request)
    {
        // Validasi input register
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:tb_user,email'],
            'password' => ['required', 'min:6', 'confirmed'],
        ]);

        // Simpan user baru dengan default role (misal mahasiswa)
        M_User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $request->level, 
        ]);

        // Redirect ke login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Akun berhasil dibuat. Silakan login.');
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
