<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\M_PJ;
use App\Models\M_Petugas;

class C_Data extends Controller
{
    public function index(Request $request)
    {
        $jenis = $request->jenis;

        // Hitung total semua
        $countPJ = DB::table('tb_pj')->count();
        $countPetugas = DB::table('tb_petugas')->count();

        // Siapkan data kosong dulu
        $dataPJ = collect();
        $dataPetugas = collect();

        // Tampilkan data sesuai pilihan
        if ($jenis === 'pj') {
            $dataPJ = DB::table('tb_pj')->get();
        } elseif ($jenis === 'petugas') {
            $dataPetugas = DB::table('tb_petugas')->get();
        }

        return view('v_data', compact(
            'countPJ',
            'countPetugas',
            'dataPJ',
            'dataPetugas',
            'jenis'
        ));
    }
}
