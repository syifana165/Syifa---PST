<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Penugasan;
use App\Models\M_Pengaduan;
use App\Models\M_Petugas;

class C_Penugasan extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = M_Penugasan::with(['petugas', 'pengaduan']);

        if ($search) {
            $query->whereHas('petugas', function ($q) use ($search) {
                $q->where('Nama', 'like', '%' . $search . '%');
            });
        }

        $data = M_Penugasan::with(['petugas', 'pengaduan'])->orderBy('id_penugasan', 'desc')->paginate(10);
        $pengaduan = M_Pengaduan::orderBy('tanggal', 'desc')->get();
        $petugas = M_Petugas::orderBy('nama')->get();

        return view('v_penugasan', compact('data', 'pengaduan', 'petugas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pengaduan' => 'required|exists:tb_pengaduan,id_pengaduan',
            'kelompok_petugas' => 'required|string|max:255',
            'id_petugas' => 'required|exists:tb_petugas,id_petugas', 
        ]);
    
        // Cek apakah pengaduan sudah ditugaskan
        $exists = M_Penugasan::where('id_pengaduan', $request->id_pengaduan)->first();
        if ($exists) {
            return redirect()->back()->with('error', 'Pengaduan sudah pernah ditugaskan.');
        }
    
        M_Penugasan::create([
            'id_pengaduan' => $request->id_pengaduan,
            'kelompok_petugas' => $request->kelompok_petugas,
            'id_petugas' => $request->id_petugas,
        ]);
    
        return redirect()->route('penugasan.index')->with('success', 'Penugasan berhasil ditambahkan.');
    }
    
    public function destroy($id_penugasan)
    {
        $penugasan = M_Penugasan::where('id_penugasan', $id_penugasan)->first();

        if (!$penugasan) {
            return redirect()->route('penugasan.index')->with('error', 'Data penugasan tidak ditemukan.');
        }

        $penugasan->delete();

        return redirect()->route('penugasan.index')->with('success', 'Penugasan berhasil dihapus.');
    }

    public function create()
    {
        $pengaduan = M_Pengaduan::all();
        $petugas = M_Petugas::orderBy('nama')->get();
        return view('v_petugasform', compact('pengaduan', 'petugas'));
    }

    // Method baru untuk update status penugasan dan juga update status di pengaduan terkait
    public function updateStatus(Request $request, $id_penugasan)
    {
        $request->validate([
            'status' => 'required|in:Pending,Proses,Selesai',
        ]);

        $penugasan = M_Penugasan::find($id_penugasan);
        if (!$penugasan) {
            return redirect()->route('penugasan.index')->with('error', 'Penugasan tidak ditemukan.');
        }

        // Update status pengaduan sesuai pilihan status di dropdown
        $pengaduan = $penugasan->pengaduan;
        if ($pengaduan) {
            $pengaduan->status = $request->status;
            $pengaduan->save();
        }

        return redirect()->route('penugasan.index')->with('success', 'Status berhasil diperbarui.');
    }
}
