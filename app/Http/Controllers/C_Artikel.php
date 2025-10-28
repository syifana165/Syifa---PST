<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\M_Artikel;

class C_Artikel extends Controller
{
    // Menampilkan semua artikel
    public function index()
    {
        $artikel = M_Artikel::orderBy('tanggal_upload', 'desc')->get();
        return view('v_artikel', compact('artikel'));
    }

    public function show($id)
    {
        $artikel = M_Artikel::findOrFail($id);
        return view('v_artikeldetail', compact('artikel'));
    }

    // Form tambah artikel
    public function create()
    {
        return view('v_artikeltambah');
    }
 
    // Proses simpan artikel baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $gambarName = null;
        if ($request->hasFile('gambar')) {
            $gambarName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('uploads/artikel'), $gambarName);
        }

        M_Artikel::create([
            'judul' => $request->judul,
            'gambar' => $gambarName,
            'isi' => $request->isi,
        ]);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil ditambahkan!');
    }

    // Form edit artikel
    public function edit($id)
    {
        $artikel = M_Artikel::findOrFail($id);
        return view('v_artikeledit', compact('artikel'));
    }

    // Proses update artikel
    public function update(Request $request, $id)
    {
        $artikel = M_Artikel::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $gambarName = $artikel->gambar;
        if ($request->hasFile('gambar')) {
            if ($gambarName && file_exists(public_path('uploads/artikel/' . $gambarName))) {
                unlink(public_path('uploads/artikel/' . $gambarName));
            }
            $gambarName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('uploads/artikel'), $gambarName);
        }

        $artikel->update([
            'judul' => $request->judul,
            'gambar' => $gambarName,
            'isi' => $request->isi,
        ]);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    // Hapus artikel
    public function destroy($id)
    {
        $artikel = M_Artikel::findOrFail($id);
        if ($artikel->gambar && file_exists(public_path('uploads/artikel/' . $artikel->gambar))) {
            unlink(public_path('uploads/artikel/' . $artikel->gambar));
        }
        $artikel->delete();

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dihapus!');
    }
}
