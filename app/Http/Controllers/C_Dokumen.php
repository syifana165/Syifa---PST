<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Dokumen;
use Illuminate\Support\Facades\Storage;

class C_Dokumen extends Controller
{
    public function index()
    {
        $foto  = M_Dokumen::where('tipe', 'foto')->orderBy('id', 'DESC')->get();
        $video = M_Dokumen::where('tipe', 'video')->orderBy('id', 'DESC')->get();
        $pdf   = M_Dokumen::where('tipe', 'pdf')->orderBy('id', 'DESC')->get();

        return view('v_dokumen', compact('foto', 'video', 'pdf'));
    }

    public function create()
    {
        return view('v_dokumentambah');
    }

    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'nama_dokumen' => 'required|string|max:150',
            'deskripsi'    => 'nullable|string',
            'tipe'         => 'required|in:pdf,foto,video',
            'file_dokumen' => $request->tipe == 'video' ? 'required|url' : 'required|file',
        ], [
            'file_dokumen.required' => 'File dokumen atau link video wajib diisi.',
            'file_dokumen.url'      => 'Untuk video, masukkan URL yang valid.',
            'file_dokumen.file'     => 'File harus berupa dokumen yang valid.',
        ]);

        // Simpan file atau link
        if ($request->tipe === 'video') {
            $path = $request->input('file_dokumen'); // simpan URL video
        } else {
            if ($request->hasFile('file_dokumen')) {
                $path = $request->file('file_dokumen')->store('dokumen', 'public');
            } else {
                return back()->with('error', 'File dokumen wajib diunggah!');
            }
        }

        // Simpan ke database
        M_Dokumen::create([
            'nama_dokumen'   => $request->nama_dokumen,
            'deskripsi'      => $request->deskripsi,
            'tipe'           => $request->tipe,
            'file_dokumen'   => $path,
            'tanggal_upload' => now(),
        ]);

        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $dokumen = M_Dokumen::findOrFail($id);
        return view('v_dokumenedit', compact('dokumen'));
    }

    public function update(Request $request, $id)
    {
        $dokumen = M_Dokumen::findOrFail($id);

        // Validasi
        $request->validate([
            'nama_dokumen' => 'required|string|max:150',
            'deskripsi'    => 'nullable|string',
            'tipe'         => 'required|in:pdf,foto,video',
            'file_dokumen' => $request->tipe == 'video' ? 'nullable|url' : 'nullable|file',
        ], [
            'file_dokumen.url'  => 'Untuk video, masukkan URL yang valid.',
            'file_dokumen.file' => 'File harus berupa dokumen yang valid.',
        ]);

        $path = $dokumen->file_dokumen;

        if ($request->tipe === 'video') {
            // Jika user memasukkan URL baru
            if ($request->filled('file_dokumen')) {
                $path = $request->input('file_dokumen');
            }
        } elseif ($request->hasFile('file_dokumen')) {
            // Hapus file lama jika ada
            if (Storage::exists('public/' . $dokumen->file_dokumen)) {
                Storage::delete('public/' . $dokumen->file_dokumen);
            }
            $path = $request->file('file_dokumen')->store('dokumen', 'public');
        }

        $dokumen->update([
            'nama_dokumen'   => $request->nama_dokumen,
            'deskripsi'      => $request->deskripsi,
            'tipe'           => $request->tipe,
            'file_dokumen'   => $path,
            'tanggal_upload' => now(),
        ]);

        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $dokumen = M_Dokumen::findOrFail($id);

        // Hapus file fisik jika bukan video
        if ($dokumen->tipe !== 'video' && Storage::exists('public/' . $dokumen->file_dokumen)) {
            Storage::delete('public/' . $dokumen->file_dokumen);
        }

        $dokumen->delete();
        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil dihapus!');
    }
}
