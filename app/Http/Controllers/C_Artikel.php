<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Artikel;
use Illuminate\Support\Facades\Storage;

class C_Artikel extends Controller
{
    // Menampilkan semua artikel
    public function index()
    {
        $artikel = M_Artikel::orderBy('tanggal_upload', 'desc')->get();
        return view('v_artikel', compact('artikel'));
    }

    // Detail artikel
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
            // Simpan di storage/app/public/artikel
            $gambarName = $request->file('gambar')->store('artikel', 'public');
        }

        M_Artikel::create([
            'judul' => $request->judul,
            'gambar' => $gambarName,
            'isi' => $request->isi,
            'tanggal_upload' => now(),
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
            // Hapus file lama jika ada
            if ($gambarName && Storage::disk('public')->exists($gambarName)) {
                Storage::disk('public')->delete($gambarName);
            }
            // Simpan file baru
            $gambarName = $request->file('gambar')->store('artikel', 'public');
        }

        $artikel->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => $gambarName,
        ]);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    // Hapus artikel
    public function destroy($id)
    {
        $artikel = M_Artikel::findOrFail($id);

        // Hapus file gambar jika ada
        if ($artikel->gambar && Storage::disk('public')->exists($artikel->gambar)) {
            Storage::disk('public')->delete($artikel->gambar);
        }

        $artikel->delete();

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dihapus!');
    }
}
