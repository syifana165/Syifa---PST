<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Penugasan; 
use App\Models\M_Pengaduan;  

class C_PetugasLapangan extends Controller
{
    public function index()
    {
        $data = M_Penugasan::with('pengaduan')->paginate(10); 
        return view('v_petugaslapangan', compact('data'));
    }
}
