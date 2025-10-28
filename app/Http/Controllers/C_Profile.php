<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\M_User;

class C_Profile extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('v_profile', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('v_dashboard_profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // ✅ Validasi input
        $request->validate([
            'username' => 'required|string|unique:tb_user,username,' . $user->id,
            'email' => 'required|email',
            'password' => 'nullable|string|min:6|confirmed',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);
        

        // ✅ Update username
        $user->username = $request->username;
         $user->email = $request->email;
        

        // ✅ Update password kalau diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // ✅ Upload foto profil kalau ada file baru
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();

            // Pastikan folder uploads/profile sudah ada
            $file->move(public_path('uploads/profile'), $filename);

            // Hapus foto lama kalau ada
            if ($user->foto && file_exists(public_path('uploads/profile/' . $user->foto))) {
                unlink(public_path('uploads/profile/' . $user->foto));
            }

            // Simpan nama file baru
            $user->foto = $filename;
        }

        // ✅ Simpan perubahan
        $user->save();

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui!');
    }
}
