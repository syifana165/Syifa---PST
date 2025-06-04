<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\M_PJ;
use App\Models\M_Petugas;

class C_Data extends Controller
{
    public function index(Request $request)
{
    $jenis = $request->jenis;

    $dataPJ = DB::table('tb_pj')->get();
    $dataPetugas = DB::table('tb_petugas')->get();

    return view('v_data', [
        'countPJ' => $dataPJ->count(),
        'countPetugas' => $dataPetugas->count(),
        'dataPJ' => $dataPJ,
        'dataPetugas' => $dataPetugas,
        'jenis' => $jenis,
    ]);
}
}
