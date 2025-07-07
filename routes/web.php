<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\C_Form;
use App\Http\Controllers\C_Login;
use App\Http\Controllers\C_Pengaduan;
use App\Http\Controllers\C_Feedback;
use App\Http\Controllers\C_F_Feedback;
use App\Http\Controllers\C_Petugas;
use App\Http\Controllers\C_Penugasan;
use App\Http\Controllers\C_PJ;
use App\Http\Controllers\C_Data;
use App\Http\Controllers\C_PetugasLapangan;
use App\Http\Controllers\C_LaporanP;
use App\Http\Controllers\C_Program;
use App\Http\Controllers\C_Halaman;
use App\Http\Controllers\C_Home;
use App\Http\Controllers\C_Tim;

/*
|--------------------------------------------------------------------------
| Tampilan Umum
|--------------------------------------------------------------------------
*/
Route::view('/index', 'v_index');
Route::view('/admin', 'layout/v_template');

Route::get('/', [C_Halaman::class, 'index']);
Route::get('/halaman', [C_Halaman::class, 'index'])->name('v_halaman');

/*
|--------------------------------------------------------------------------
| Auth (Login & Register)
|--------------------------------------------------------------------------
*/
Route::get('/login', [C_Login::class, 'showLogin'])->name('login');
Route::post('/login', [C_Login::class, 'login'])->name('login');
Route::get('/register', [C_Login::class, 'showRegister'])->name('register');
Route::post('/register', [C_Login::class, 'register'])->name('register.post');
Route::post('/logout', [C_Login::class, 'logout'])->name('logout');
Route::get('/home', [C_Home::class, 'index'])->name('home');
/*
|--------------------------------------------------------------------------
| Halaman Umum
|--------------------------------------------------------------------------
*/
Route::get('/visi', fn () => view('v_visimisi'));
Route::get('/tentangkami', fn () => view('v_tentangkami'));
Route::get('/tujuan', fn () => view('v_tujuan'));
Route::get('/profile', fn () => view('v_profilmentri'));

/*
|--------------------------------------------------------------------------
| Middleware Role: Kepala Bidang & PJ
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:Kepala Bidang,PJ'])->group(function () {
    Route::get('/pengaduan', [C_Pengaduan::class, 'index'])->name('pengaduan.index');
    Route::get('/pengaduan/add', [C_Pengaduan::class, 'add'])->name('pengaduan.add');
    Route::post('/pengaduan/insert', [C_Pengaduan::class, 'insert']);
    Route::post('/pengaduan/store', [C_Pengaduan::class, 'store'])->name('pengaduan.store');
    Route::get('/pengaduan/detail/{id_pengaduan}', [C_Pengaduan::class, 'detail'])->name('pengaduan.detail');
    Route::get('/pengaduan/{id_pengaduan}/edit', [C_Pengaduan::class, 'edit'])->name('pengaduan.edit');
    Route::delete('/pengaduan/{id_pengaduan}', [C_Pengaduan::class, 'destroy'])->name('pengaduan.destroy');
    Route::get('/pengaduan/tugaskan/{id_pengaduan}', [C_Pengaduan::class, 'tugaskan'])->name('pengaduan.tugaskan');
    Route::post('/pengaduan/ubah-status/{id_pengaduan}', [C_Pengaduan::class, 'ubahStatus'])->name('pengaduan.ubahStatus');
});

/*
|--------------------------------------------------------------------------
| Middleware Role: Petugas
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:Petugas,PJ,Kepala Bidang'])->group(function () {
    Route::get('/petugaslapangan', [C_PetugasLapangan::class, 'index'])->name('petugaslapangan.index');
    Route::get('/laporan/create/{id_penugasan}', [C_LaporanP::class, 'createLaporan'])->name('laporan.create');
    Route::post('/laporan/store', [C_LaporanP::class, 'store'])->name('laporan.store');
    Route::get('/laporan', [C_LaporanP::class, 'index'])->name('laporan.index');
    Route::get('/laporan/detail/{id_laporanpetugas}', [C_LaporanP::class, 'detail'])->name('laporan.detail');
    Route::get('/laporan/edit/{id_laporanpetugas}', [C_LaporanP::class, 'edit'])->name('laporan.edit');
    Route::put('/laporan/{id_laporanpetugas}', [C_LaporanP::class, 'update'])->name('laporan.update');
    Route::delete('/laporan/{id_laporanpetugas}', [C_LaporanP::class, 'destroy'])->name('laporan.destroy');
});

/*
|--------------------------------------------------------------------------
| Feedback
|--------------------------------------------------------------------------
*/
Route::get('/feedback', [C_Feedback::class, 'index'])->name('feedback.index');
Route::post('/feedback', [C_Feedback::class, 'store'])->name('feedback.store');
Route::delete('/feedback/hapus', [C_Feedback::class, 'destroy'])->name('feedback.destroy');
Route::get('/feedback/form', [C_F_Feedback::class, 'showForm'])->name('feedback.form');

/*
|--------------------------------------------------------------------------
| Penanggung Jawab (PJ)
|--------------------------------------------------------------------------
*/
Route::get('/pj', [C_PJ::class, 'index'])->name('pj.index');
Route::get('/pj/create', [C_PJ::class, 'create'])->name('pj.create');
Route::post('/pj/store', [C_PJ::class, 'store'])->name('pj.store');
Route::get('/pj/detail/{id}', [C_PJ::class, 'detail'])->name('pj.detail');
Route::get('/pj/edit/{id}', [C_PJ::class, 'edit'])->name('pj.edit');
Route::put('/pj/update/{id}', [C_PJ::class, 'update'])->name('pj.update');
Route::delete('/pj/delete/{id}', [C_PJ::class, 'destroy'])->name('pj.destroy');
Route::get('/pj/add', [C_PJ::class, 'add'])->name('pj.add');
Route::get('/penanggungjawab', [C_PJ::class, 'publicView'])->name('penanggungjawab');

/*
|--------------------------------------------------------------------------
| Petugas
|--------------------------------------------------------------------------
*/
Route::get('/petugas', [C_Petugas::class, 'index'])->name('petugas.index');
Route::get('/petugas/create', [C_Petugas::class, 'create'])->name('petugas.create');
Route::post('/petugas/store', [C_Petugas::class, 'store'])->name('petugas.store');
Route::get('/petugas/detail/{id_petugas}', [C_Petugas::class, 'detail'])->name('petugas.detail');
Route::get('/petugas/edit/{id_petugas}', [C_Petugas::class, 'edit'])->name('petugas.edit');
Route::put('/petugas/update/{id_petugas}', [C_Petugas::class, 'update'])->name('petugas.update');
Route::delete('/petugas/delete/{id_petugas}', [C_Petugas::class, 'destroy'])->name('petugas.destroy');
Route::get('/petugas/view', [C_Petugas::class, 'publicView'])->name('petugas.view');
Route::get('/data-petugas', [C_Petugas::class, 'showPublic'])->name('data.petugas_public');

/*
|--------------------------------------------------------------------------
| Form Pengaduan Umum
|--------------------------------------------------------------------------
*/
Route::get('/form', [C_Form::class, 'showForm'])->name('form.show');
Route::post('/form', [C_Form::class, 'store'])->name('form.store');
Route::get('/pengaduandata', [C_Pengaduan::class, 'publicView'])->name('pengaduandata');

/*
|--------------------------------------------------------------------------
| Program Dinas
|--------------------------------------------------------------------------
*/
Route::get('/seminar', [C_Program::class, 'seminar'])->name('seminar');
Route::get('/bersih', [C_Program::class, 'bersih'])->name('bersih');

/*
|--------------------------------------------------------------------------
| Penugasan
|--------------------------------------------------------------------------
*/
Route::get('/penugasan', [C_Penugasan::class, 'index'])->name('penugasan.index');
Route::post('/penugasan', [C_Penugasan::class, 'store'])->name('penugasan.store');
Route::get('/penugasan/create', [C_Penugasan::class, 'create'])->name('penugasan.create');
Route::delete('/penugasan/{id_penugasan}', [C_Penugasan::class, 'destroy'])->name('penugasan.destroy');
Route::patch('/penugasan/{id_penugasan}/status', [C_Penugasan::class, 'updateStatus'])->name('penugasan.updateStatus');
Route::get('/penugasan/kelompok/{id_petugas}', [C_Penugasan::class, 'getKelompokPetugas']);
Route::get('/penugasan/detail/{id_penugasan}', [C_Penugasan::class, 'detail'])->name('penugasan.detail');
Route::get('/penugasan/edit/{id_penugasan}', [C_Penugasan::class, 'edit'])->name('penugasan.edit');
Route::put('/penugasan/{id_penugasan}', [C_Penugasan::class, 'update'])->name('penugasan.update');
Route::get('/data-penugasan', [C_Penugasan::class, 'dataPublik'])->name('penugasan.publik');

/*
|--------------------------------------------------------------------------
| Data Gabungan
|--------------------------------------------------------------------------
*/
Route::get('/data-pj-petugas', [C_Data::class, 'index'])->name('data.pj_petugas');

/*
|--------------------------------------------------------------------------
| Tim
|--------------------------------------------------------------------------
*/
Route::get('/tim', [C_Tim::class, 'index'])->name('tim.index');
Route::get('/tim/add', [C_Tim::class, 'add'])->name('tim.add');
Route::post('/tim/store', [C_Tim::class, 'store'])->name('tim.store');
Route::get('/tim/edit/{id_tim}', [C_Tim::class, 'edit'])->name('tim.edit');
Route::put('/tim/update/{id_tim}', [C_Tim::class, 'update'])->name('tim.update');
Route::delete('/tim/destroy/{id_tim}', [C_Tim::class, 'destroy'])->name('tim.destroy');
Route::get('/tim/detail/{id_tim}', [C_Tim::class, 'detail'])->name('tim.detail');


