<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\M_Petugas;
use App\Models\M_Tim;

class C_Petugas extends Controller
{
    public function index(Request $request)
    {
        $dataPetugas = M_Petugas::with('tim')->get();
        $timList = M_Tim::all(); 
        return view('v_petugas', [
            'dataPetugas' => $dataPetugas,
            'timList' => $timList
        ]);
    }

    public function create()
    {
        $timList = M_Tim::all();
        return view('v_petugas_add', compact('timList'));
    }

    public function edit($id_petugas)
    {
        $petugas = M_Petugas::findOrFail($id_petugas);
        $timList = M_Tim::all();
        return view('v_petugas_edit', compact('petugas', 'timList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:255',
            'id_tim' => 'nullable|exists:tb_tim,id_tim',
        ]);

        M_Petugas::create([
            'Nama' => $request->nama,
            'No_HP' => $request->no_hp,
            'Alamat' => $request->alamat,
            'keterangan' => $request->keterangan,
            'id_tim' => $request->id_tim,
        ]);

        return redirect()->route('petugas.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function update(Request $request, $id_petugas)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:255',
            'id_tim' => 'nullable|exists:tb_tim,id_tim',
        ]);

        $petugas = M_Petugas::findOrFail($id_petugas);
        $petugas->update([
            'Nama' => $request->nama,
            'No_HP' => $request->no_hp,
            'Alamat' => $request->alamat,
            'keterangan' => $request->keterangan,
            'id_tim' => $request->id_tim,
        ]);

        return redirect()->route('petugas.index')->with('success', 'Data petugas berhasil diperbarui!');
    }

    public function destroy($id_petugas)
    {
        M_Petugas::destroy($id_petugas);
        return redirect()->route('petugas.index')->with('success', 'Data berhasil dihapus');
    }

    public function detail($id_petugas)
    {
        $petugas = M_Petugas::with('tim')->findOrFail($id_petugas); // pakai relasi kalau sudah
        return view('v_petugas_detail', compact('petugas'));
    }

    public function showPublic()
    {
        $dataPetugas = M_Petugas::with('tim')->get();
        return view('v_petugasdata', compact('dataPetugas'));
    }

}
