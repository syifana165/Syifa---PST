<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\M_User;
use Illuminate\Support\Facades\Hash;

class C_Login extends Controller
{
    // Tampilkan halaman login
    public function showLogin()
    {
        return view('v_login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required'],
        ]);

        // Cari user berdasarkan username
        $user = M_User::where('username', $credentials['username'])->first();

        if ($user) {
            // Cek jika password cocok (hash)
            if (Hash::check($credentials['password'], $user->password)) {
                // Jika perlu rehash (misalnya password lama)
                if (Hash::needsRehash($user->password)) {
                    $user->password = Hash::make($credentials['password']);
                    $user->save();
                }

                Auth::login($user);
                $request->session()->regenerate();
                return $this->redirectByRole($user);
            }

            // Cek jika password masih plaintext (tidak direkomendasikan)
            if ($user->password === $credentials['password']) {
                $user->password = Hash::make($credentials['password']);
                $user->save();

                Auth::login($user);
                $request->session()->regenerate();
                return $this->redirectByRole($user);
            }
        }

        // Jika gagal login
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }

    // Redirect berdasarkan role
    private function redirectByRole($user)
    {
        $role = trim(strtolower($user->role));

        switch ($role) {
            case 'kepala bidang':
            case 'pj':
                return redirect()->route('pengaduan.index');

            case 'petugas':
                return redirect()->route('petugaslapangan.index');

            default:
                Auth::logout();
                return back()->withErrors([
                    'username' => 'Role user tidak dikenali.',
                ]);
        }
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
