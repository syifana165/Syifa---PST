<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\M_Petugas;

class C_Petugas extends Controller
{
    
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = M_Petugas::query();

        if ($search) {
            $query->where('Nama', 'like', "%{$search}%");
        }

        $dataPetugas = $query->paginate(10);

        return view('v_petugas', compact('dataPetugas'));
    }
    public function create()
    {
        return view('v_petugas_create');
    }

    public function edit($id_petugas)
    {
        $petugas = M_Petugas::findOrFail($id_petugas);  // Menggunakan Eloquent ORM
        return view('v_petugas_edit', compact('petugas'));
    }

    
    public function store(Request $request)
    {
        
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
        ]);

        M_Petugas::create([
            'Nama' => $request->nama,
            'No_HP' => $request->no_hp,
            'Alamat' => $request->alamat,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('petugas.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function update(Request $request, $id_petugas)
    {
        // Validasi input
        $request->validate([
            'Nama' => 'required',
            'No_HP' => 'required',
            'Alamat' => 'required',
            'keterangan' => 'required',
        ]);

        $petugas = M_Petugas::findOrFail($id_petugas);
        $petugas->update([
            'Nama' => $request->Nama,
            'No_HP' => $request->No_HP,
            'Alamat' => $request->Alamat,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('petugas.index')->with('success', 'Data petugas berhasil diperbarui!');
    }


    public function destroy($id_petugas)
    {
        M_Petugas::destroy($id_petugas);  // Menggunakan Eloquent ORM
        return redirect()->route('petugas.index')->with('success', 'Data berhasil dihapus');
    }

    public function detail($id_petugas)
    {
        $petugas = M_Petugas::findOrFail($id_petugas);  // Menggunakan Eloquent ORM
        return view('v_petugas_detail', compact('petugas'));
    }

    public function showPublic()
    {
        $dataPetugas = M_Petugas::all(); // atau pakai where jika ingin filter tertentu
        return view('v_petugasdata', compact('dataPetugas'));
    }

}
