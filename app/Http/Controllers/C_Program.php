<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_Program extends Controller
{
    public function seminar()
    {
        return view('v_seminar');
    }

    public function bersih()
    {
        return view('v_bersih');
    }
}
