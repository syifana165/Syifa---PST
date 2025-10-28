<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\M_User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class C_Login extends Controller
{
    public function showLogin()
    {
        return view('v_login');
    }

    public function login(Request $request)
    {
        // ✅ Validasi input form termasuk captcha
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
            'g-recaptcha-response' => 'required',
        ], [
            'email.required' => 'Email wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'g-recaptcha-response.required' => 'Harap verifikasi bahwa Anda bukan robot ✅',
        ]);

        // ✅ Verifikasi captcha ke server Google
        $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . env('RECAPTCHA_SECRET_KEY') . '&response=' . $request->input('g-recaptcha-response'));
        $responseKeys = json_decode($response, true);

        if (intval($responseKeys["success"]) !== 1) {
            return back()->withErrors(['captcha' => 'Harap verifikasi bahwa Anda bukan robot ✅'])->withInput();
        }

        // ✅ Cek login normal
        $email = trim(strtolower($request->email));
        $password = $request->password;
        $throttleKey = Str::lower($email) . '|' . $request->ip();

        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds = RateLimiter::availableIn($throttleKey);
            throw ValidationException::withMessages([
                'email' => "Terlalu banyak percobaan login. Coba lagi dalam $seconds detik."
            ]);
        }

        $user = M_User::where('email', $email)->first();

        if (!$user || !Hash::check($password, $user->password)) {
            RateLimiter::hit($throttleKey, 60);
            return back()->withErrors(['email' => 'Email atau password salah.'])->withInput();
        }

        Auth::login($user);
        $request->session()->regenerate();
        RateLimiter::clear($throttleKey);

        return redirect()->route('profile'); // arahkan ke dashboard/profile
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function showRegister()
    {
        return view('v_register');
    }
}
