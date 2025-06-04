<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_PJ; 

class C_Penanggungjawab extends Controller
{
    public function penanggungJawab()
    {
        $data = M_PJ::all();
        return view('v_penanggungjawab', compact('data'));
    }
}
