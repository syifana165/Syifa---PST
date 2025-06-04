<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_F_Feedback extends Controller
{
    public function showForm()
    {
        return view('v_f_feedback');
    }

    public function store(Request $request)
    {
        // Validasi input form
        $request->validate([
            'nama'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'feedback'=> 'required|string|max:1000',
        ]);

        // Tidak menyimpan ke database
        // Bisa simpan ke session atau hanya validasi saja

        return back()->with('success', 'Feedback berhasil dikirim!');
    }
}
