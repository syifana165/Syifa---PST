<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_LaporanP;

class C_Halaman extends Controller
{
    public function index()
    {
        $laporan = M_LaporanP::orderBy('tanggal', 'desc')->get();
        return view('v_halaman', compact('laporan'));
    }
}
