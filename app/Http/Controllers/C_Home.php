<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class C_Home extends Controller
{
    public function index()
    {
        $data = [
            'totalPengaduan' => DB::table('tb_pengaduan')->count(),
            'totalFeedback' => DB::table('tb_feedback')->count(),
            'totalPJ' => DB::table('tb_pj')->count(),
            'totalPetugas' => DB::table('tb_petugas')->count(),
            'totalPenugasan' => DB::table('tb_penugasan')->count(),
            'totalLaporan' => DB::table('tb_laporanpetugas')->count(),
        ];

        return view('v_home', $data);
    }
}
