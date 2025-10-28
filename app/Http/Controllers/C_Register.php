<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\M_User;

class C_Register extends Controller
{
    public function show()
    {
        return view('v_register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:tb_user,email',
            'password' => 'required|confirmed|min:6',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Password wajib diisi.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $username = strtolower(str_replace(' ', '', explode(' ', $request->nama)[0])) . rand(100, 999);

        M_User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'username' => $username,
            'password' => Hash::make($request->password),
            'role' => 'peserta',
            'foto' => null,
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login menggunakan email Anda.');
    }
}
