<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\C_Login;
use App\Http\Controllers\C_Halaman;
use App\Http\Controllers\C_Profile;
use App\Http\Controllers\C_Dashboard;
use App\Http\Controllers\C_Dokumen;
use App\Http\Controllers\C_Artikel;
use App\Http\Controllers\C_Profilperusahaan;



Route::get('/', [C_Halaman::class, 'index']);
Route::get('/halaman', [C_Halaman::class, 'index'])->name('v_halaman');

Route::get('/login', [C_Login::class, 'showLogin'])->name('login');
Route::post('/login', [C_Login::class, 'login'])->name('login');
Route::get('/register', [C_Login::class, 'showRegister'])->name('register');
Route::post('/register', [C_Login::class, 'register'])->name('register.post');
Route::post('/logout', [C_Login::class, 'logout'])->name('logout');



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [C_Halaman::class, 'index'])->name('dashboard');
});

Route::get('/forgot-password', function() {
    return view('v_forgot-password'); // nanti buat view ini
})->name('password.request');

Route::post('/forgot-password', [C_Login::class, 'sendResetLink'])->name('password.email');
Route::get('/register', [C_Login::class, 'showRegister'])->name('register'); // menampilkan form register
Route::post('/register', [C_Login::class, 'register'])->name('register.post');

Route::middleware('auth')->group(function () {
    // Halaman dashboard utama
    Route::get('/dashboard', [C_Profile::class, 'index'])->name('dashboard');

    // Proses update profil
    Route::post('/dashboard/update', [C_Profile::class, 'update'])->name('dashboard.update');
});
Route::get('/profile', [C_Profile::class, 'index'])->name('profile');
Route::post('/profile/update', [C_Profile::class, 'update'])->name('profile.update');
Route::get('/dashboard', [C_Dashboard::class, 'index'])->name('dashboard.home');
Route::get('/dashboard/accounts', [C_Account::class, 'index'])->name('dashboard.accounts');

Route::get('register/update', [C_Register::class, 'update'])->name('dashboard.update');

Route::get('/login', [C_Login::class, 'showLogin'])->name('login');
Route::post('/login', [C_Login::class, 'login'])->name('login.post');
Route::post('/logout', [C_Login::class, 'logout'])->name('logout');

Route::get('/register', [C_Login::class, 'showRegister'])->name('register');
Route::post('/register', [C_Login::class, 'register'])->name('register.post');

use App\Http\Controllers\C_Register;


Route::get('/register', [C_Register::class, 'show'])->name('register');
Route::post('/register', [C_Register::class, 'register'])->name('register.post');

Route::get('/login', [C_Login::class, 'showLogin'])->name('login');
Route::post('/login', [C_Login::class, 'login'])->name('login.post');




Route::get('/dokumen', [C_Dokumen::class, 'index'])->name('dokumen.index');
Route::get('/dokumen/tambah', [C_Dokumen::class, 'create'])->name('dokumen.tambah');
Route::post('/dokumen/simpan', [C_Dokumen::class, 'store'])->name('dokumen.store');
Route::get('/dokumen/edit/{id}', [C_Dokumen::class, 'edit'])->name('dokumen.edit');
Route::put('/dokumen/update/{id}', [C_Dokumen::class, 'update'])->name('dokumen.update');
Route::delete('/dokumen/hapus/{id}', [C_Dokumen::class, 'destroy'])->name('dokumen.destroy');


Route::get('/artikel', [C_Artikel::class, 'index'])->name('artikel.index');
Route::get('/artikel/tambah', [C_Artikel::class, 'create'])->name('artikel.tambah');
Route::post('/artikel/simpan', [C_Artikel::class, 'simpan'])->name('artikel.simpan');
Route::get('/artikel/edit/{id}', [C_Artikel::class, 'edit'])->name('artikel.edit');
Route::put('/artikel/update/{id}', [C_Artikel::class, 'update'])->name('artikel.update');
Route::delete('/artikel/hapus/{id}', [C_Artikel::class, 'hapus'])->name('artikel.hapus');



Route::delete('/artikel/{id}', [C_Artikel::class, 'destroy'])->name('artikel.destroy');


Route::get('/artikel/tambah', [C_Artikel::class, 'create'])->name('v_artikeltambah');
Route::post('/artikel/store', [C_Artikel::class, 'store'])->name('artikel.store');
Route::get('/artikel/{id}', [C_Artikel::class, 'show'])->name('artikel.show');



Route::get('/profilperusahaan', [C_Profilperusahaan::class, 'index'])->name('profilperusahaan.index');
Route::get('/profilperusahaan/create', [C_Profilperusahaan::class, 'create'])->name('profilperusahaan.create');
Route::post('/profilperusahaan', [C_Profilperusahaan::class, 'store'])->name('profilperusahaan.store');
Route::get('/profilperusahaan/{id}/edit', [C_Profilperusahaan::class, 'edit'])->name('profilperusahaan.edit');
Route::put('/profilperusahaan/{id}', [C_Profilperusahaan::class, 'update'])->name('profilperusahaan.update');
Route::delete('/profilperusahaan/{id}', [C_Profilperusahaan::class, 'destroy'])->name('profilperusahaan.destroy');

