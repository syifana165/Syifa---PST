<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_LaporanP;
use App\Models\M_Pengaduan; // <- tambahkan ini

class C_Halaman extends Controller
{
    public function index()
    {
        $laporan = M_LaporanP::orderBy('tanggal', 'desc')->get();

        $pengaduanTerbaru = M_Pengaduan::orderBy('Nama', 'desc')->take(5)->get();

        return view('v_halaman', compact('pengaduanTerbaru'));
    }
}
