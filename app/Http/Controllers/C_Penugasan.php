<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Penugasan;
use App\Models\M_Pengaduan;
use App\Models\M_Petugas;

class C_Penugasan extends Controller
{
    // Tampilkan data penugasan
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = M_Penugasan::with(['petugas', 'pengaduan']);

        if ($search) {
            $query->whereHas('petugas', function ($q) use ($search) {
                $q->where('Nama', 'like', '%' . $search . '%');
            });
        }

        $data = $query->orderBy('id_penugasan', 'desc')->paginate(10);

        $pengaduanBelumDitugaskan = M_Pengaduan::where('status', 'Pengaduan')
            ->doesntHave('penugasan')
            ->orderBy('Tanggal', 'asc')
            ->get();

        $petugas = M_Petugas::orderBy('Nama')->get();

        return view('v_penugasan', compact('data', 'pengaduanBelumDitugaskan', 'petugas'));
    }

    // Simpan penugasan baru
    public function store(Request $request)
    {
        $request->validate([
            'id_pengaduan'      => 'required|exists:tb_pengaduan,id_pengaduan',
            'id_petugas'        => 'required|exists:tb_petugas,id_petugas',
            'kelompok_petugas'  => 'required|string|max:255',
        ]);

        if (M_Penugasan::where('id_pengaduan', $request->id_pengaduan)->exists()) {
            return redirect()->back()->with('error', 'Pengaduan sudah pernah ditugaskan.');
        }

        M_Penugasan::create([
            'id_pengaduan'      => $request->id_pengaduan,
            'id_petugas'        => $request->id_petugas,
            'kelompok_petugas'  => $request->kelompok_petugas,
        ]);

        M_Pengaduan::where('id_pengaduan', $request->id_pengaduan)
            ->update(['status' => 'Ditugaskan']);

        return redirect()->route('penugasan.index')->with('success', 'Penugasan berhasil ditambahkan.');
    }

    // Detail penugasan
    public function detail($id_penugasan)
    {
        $penugasan = M_Penugasan::with(['pengaduan', 'petugas'])->findOrFail($id_penugasan);
        return view('v_penugasandetail', compact('penugasan'));
    }

    // Tampilkan form edit penugasan
    public function edit($id)
    {
        $penugasan = M_Penugasan::findOrFail($id);

        // Ambil data pengaduan untuk dropdown, misal:
        $pengaduanList = M_Pengaduan::orderBy('Tanggal', 'asc')->get();

        // Ambil data petugas untuk dropdown:
        $petugasList = M_Petugas::orderBy('Nama')->get();

        return view('v_penugasanedit', compact('penugasan', 'pengaduanList', 'petugasList'));
    }

    // Update penugasan
    public function update(Request $request, $id_penugasan)
    {
        $request->validate([
            'id_pengaduan'      => 'required|exists:tb_pengaduan,id_pengaduan',
            'id_petugas'        => 'required|exists:tb_petugas,id_petugas',
            'kelompok_petugas'  => 'required|string|max:255',
        ]);

        M_Penugasan::where('id_penugasan', $id_penugasan)->update([
            'id_pengaduan'      => $request->id_pengaduan,
            'id_petugas'        => $request->id_petugas,
            'kelompok_petugas'  => $request->kelompok_petugas,
        ]);

        return redirect()->route('penugasan.index')->with('success', 'Penugasan berhasil diperbarui.');
    }

    // Hapus penugasan
    public function destroy($id_penugasan)
    {
        $penugasan = M_Penugasan::find($id_penugasan);

        if (!$penugasan) {
            return redirect()->route('penugasan.index')->with('error', 'Data penugasan tidak ditemukan.');
        }

        $penugasan->delete();

        return redirect()->route('penugasan.index')->with('success', 'Penugasan berhasil dihapus.');
    }

    // Update status pengaduan terkait penugasan
    public function updateStatus(Request $request, $id_penugasan)
    {
        $request->validate([
            'status' => 'required|in:Pending,Proses,Selesai',
        ]);

        $penugasan = M_Penugasan::with('pengaduan')->find($id_penugasan);

        if (!$penugasan || !$penugasan->pengaduan) {
            return redirect()->route('penugasan.index')->with('error', 'Penugasan atau pengaduan tidak ditemukan.');
        }

        $penugasan->pengaduan->status = $request->status;
        $penugasan->pengaduan->save();

        return redirect()->route('penugasan.index')->with('success', 'Status berhasil diperbarui.');
    }

    // (Opsional) Ambil kelompok petugas via Ajax
    public function getKelompokPetugas($id_petugas)
    {
        $petugas = M_Petugas::find($id_petugas);

        if (!$petugas) {
            return response()->json(['kelompok' => null], 404);
        }

        return response()->json([
            'kelompok' => $petugas->tim->Kelompok_Petugas ?? null
        ]);
    }
}
