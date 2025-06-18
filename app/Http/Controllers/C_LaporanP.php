<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_LaporanP;
use App\Models\M_Petugas;
use App\Models\M_Penugasan;

class C_LaporanP extends Controller
{
    public function create()
    {
        // Ambil data petugas untuk dropdown form input laporan
        $petugas = M_Petugas::all();
        return view('v_petugasform', compact('petugas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_petugas' => 'required|exists:tb_petugas,id_petugas',
            'deskripsi_tugas' => 'required|string',
            'tanggal' => 'required|date',
            'lokasi_tugas' => 'required|string',
            'upload_foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['id_petugas', 'deskripsi_tugas', 'tanggal', 'lokasi_tugas']);

        if ($request->hasFile('upload_foto')) {
            $file = $request->file('upload_foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('Foto_Laporan'), $filename);
            $data['upload_foto'] = $filename;
        }

        M_LaporanP::create($data);

        return redirect()->route('v_halaman')->with('success', 'Laporan berhasil dikirim.');
    }

    public function index(Request $request)
    {
        $search = $request->get('search');

        $laporan = M_LaporanP::with('petugas')
            ->when($search, function($query, $search) {
                $query->whereHas('petugas', function($q) use ($search) {
                    $q->where('Nama', 'like', "%{$search}%");
                });
            })
            ->get()
            ->map(function($item) {
                return (object) [
                    'id_laporanpetugas' => $item->id_laporanpetugas,
                    'nama' => $item->petugas->Nama ?? '-',
                    'no_hp' => $item->petugas->No_HP ?? '-',
                    'alamat' => $item->petugas->alamat ?? '-',
                    'tanggal' => $item->tanggal,
                    'lokasi_tugas' => $item->lokasi_tugas ?? '-',
                    'status_tugas' => $item->status_tugas ?? '-',
                    'deskripsi_tugas' => $item->deskripsi_tugas,
                    'upload_foto' => $item->upload_foto,
                ];
            });

        return view('v_petugaslaporan', compact('laporan'));
    }

    public function halaman()
    {
        $laporan = M_LaporanP::latest()->get();
        return view('v_halaman', compact('laporan'));
    }

    
    public function detail($id_petugas)
    {
        $laporan = M_LaporanP::with('petugas')->findOrFail($id_petugas);
        return view('v_petugaslaporandetail', compact('laporan'));
    }

    public function createLaporan($id_penugasan)
    {
        $penugasan = M_Penugasan::with('petugas', 'pengaduan')->findOrFail($id_penugasan);

        return view('v_petugasform', compact('penugasan'));
    }


}
