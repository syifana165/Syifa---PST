<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_Form extends Controller
{
    public function showForm()
    {
        return view('V_form');
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);

        // Simpan data atau lakukan sesuatu dengan input
        return back()->with('success', 'Pengaduan berhasil dikirim!');
    }
}
