<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Profilperusahaan;
use Illuminate\Support\Facades\Storage;

class C_Profilperusahaan extends Controller
{
    public function index()
    {
        $data = M_Profilperusahaan::orderBy('tipe', 'asc')->get();
        return view('v_profilperusahaan', compact('data'));
    }

    public function create()
    {
        return view('v_profilperusahaantambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipe' => 'required',
            'isi' => 'required',
            'gambar' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gambar = null;
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('profil', 'public');
        }

         M_Profilperusahaan::create([
            'tipe' => $request->tipe,
            'isi' => $request->isi,
            'gambar' => $gambar,
        ]);

        return redirect()->route('profilperusahaan.index')->with('success', 'Profil perusahaan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $profil =  M_Profilperusahaan::findOrFail($id);
        return view('v_profilperusahaanedit', compact('profil'));
    }

    public function update(Request $request, $id)
    {
        $profil =  M_Profilperusahaan::findOrFail($id);

        $request->validate([
            'tipe' => 'required',
            'isi' => 'required',
            'gambar' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gambar = $profil->gambar;
        if ($request->hasFile('gambar')) {
            if ($gambar && file_exists(storage_path('app/public/' . $gambar))) {
                unlink(storage_path('app/public/' . $gambar));
            }
            $gambar = $request->file('gambar')->store('profil', 'public');
        }

        $profil->update([
            'tipe' => $request->tipe,
            'isi' => $request->isi,
            'gambar' => $gambar,
        ]);

        return redirect()->route('profilperusahaan.index')->with('success', 'Profil perusahaan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $profil =  M_Profilperusahaan::findOrFail($id);
        if ($profil->gambar && file_exists(storage_path('app/public/' . $profil->gambar))) {
            unlink(storage_path('app/public/' . $profil->gambar));
        }
        $profil->delete();

        return redirect()->route('profilperusahaan.index')->with('success', 'Profil perusahaan berhasil dihapus.');
    }
}
