<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class C_Home extends Controller
{
    public function index()
    {
        // Ambil data artikel, dokumen, dan profil perusahaan
        $artikel = DB::table('tb_artikel')->orderBy('id', 'desc')->get();
        $dokumen = DB::table('tb_dokumen')->get();
        $profil  = DB::table('tb_profil_perusahaan')->get(); // <--- tambahkan ini

        // Kirim data ke view
        return view('v_halaman', compact('artikel', 'dokumen', 'profil'));
    }
}
