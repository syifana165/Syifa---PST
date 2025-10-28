<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class C_Halaman extends Controller
{
    public function index()
    {
        $artikel = collect();
        $dokumen = collect();
        $profilperusahaan = collect();

        // Ambil artikel
        if (class_exists(\App\Models\M_Artikel::class)) {
            try {
                $artikel = \App\Models\M_Artikel::orderBy('tanggal_upload', 'desc')->take(6)->get();
            } catch (\Throwable $e) {
                $artikel = collect();
            }
        }

        // Ambil dokumen
        if (class_exists(\App\Models\M_Dokumen::class)) {
            try {
                $dokumen = \App\Models\M_Dokumen::all();
            } catch (\Throwable $e) {
                $dokumen = collect();
            }
        }

        // Ambil profil perusahaan
        if (class_exists(\App\Models\M_ProfilPerusahaan::class)) {
            try {
                $profilperusahaan = \App\Models\M_ProfilPerusahaan::orderBy('tipe')->get();
            } catch (\Throwable $e) {
                $profilperusahaan = collect();
            }
        }

        // Buat variabel $profil yang dipakai di view
        $profil = $profilperusahaan;

        return view('v_halaman', compact('artikel', 'dokumen', 'profil'));
    }
}
