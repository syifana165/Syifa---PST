<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class C_Dashboard extends Controller
{
    public function index()
    {
        // ambil user yang sedang login
        $user = Auth::user();

        // arahkan ke view dashboard
        return view('v_dashboard', compact('user'));
    }
}
