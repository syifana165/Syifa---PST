<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Penugasan;
use App\Models\M_Petugas;

class C_FormPetugas extends Controller
{
    public function petugasForm()
    {
        $penugasan = M_Penugasan::with('pengaduan')->get();
        $petugas = M_Petugas::all();
        return view('v_petugasform', compact('penugasan', 'petugas'));
    }
}
