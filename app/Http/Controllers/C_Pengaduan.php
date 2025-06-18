<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\M_Pengaduan;
use App\Models\M_Penugasan; // jangan lupa import model penugasan

class C_Pengaduan extends Controller
{
    protected $M_Pengaduan;

    public function __construct(M_Pengaduan $M_Pengaduan)
    {
        $this->M_Pengaduan = $M_Pengaduan;
    }

    public function index(Request $request)
    {
        $user = auth()->user();

        if (!in_array($user->level, [1, 2])) {
            abort(403, 'Anda tidak memiliki akses.');
        }

        $query = DB::table('tb_pengaduan');

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('Nama', 'like', "%{$search}%")
                    ->orWhere('Alamat', 'like', "%{$search}%")
                    ->orWhere('Pengaduan', 'like', "%{$search}%");
            });
        }

        $pengaduan = $query->get();

        $totalPengaduan = DB::table('tb_pengaduan')->count();
        $pengaduanSelesai = DB::table('tb_pengaduan')->where('status', 'selesai')->count();
        return view('v_pengaduan', compact(
            'pengaduan',
            'totalPengaduan',
            'pengaduanSelesai'
        ));
    }
    public function detail($id_pengaduan)
    {
        $pengaduan = M_Pengaduan::findOrFail($id_pengaduan);
        return view('v_pengaduan_detail', compact('pengaduan'));
    }

    public function insert(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_hp' => 'required|numeric',
            'pengaduan' => 'required|string',
            'Foto_Pengaduan' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $foto_pengaduan = 'default.jpg';
        if ($request->hasFile('Foto_Pengaduan')) {
            $file = $request->file('Foto_Pengaduan');
            $foto_pengaduan = time() . '_' . $request->nama . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('foto_pengaduan'), $foto_pengaduan);
        }

        // Simpan pengaduan dulu
        $pengaduan = M_Pengaduan::create([
            'Nama' => $request->nama,
            'Alamat' => $request->alamat,
            'No_HP' => $request->no_hp,
            'Pengaduan' => $request->pengaduan,
            'Foto_Pengaduan' => $foto_pengaduan,
            'Tanggal' => now(),
            'status' => 'Pengaduan',
        ]);

        // Simpan data ke penugasan berdasar pengaduan yg baru dibuat
        M_Penugasan::create([
            'id_pengaduan' => $pengaduan->id_pengaduan,
            'nama' => $pengaduan->Nama,
            'tanggal' => $pengaduan->Tanggal,
            'lokasi' => $pengaduan->Alamat,
            'pengaduan' => $pengaduan->Pengaduan,
            'status' => $pengaduan->status,
        ]);

        return redirect()->route('pengaduan')->with('pesan', 'Pengaduan berhasil ditambahkan dan penugasan otomatis dibuat!');
    }

    public function destroy($id_pengaduan)
    {
        $pengaduan = M_Pengaduan::find($id_pengaduan);

        if ($pengaduan) {
            if ($pengaduan->Foto_Pengaduan && file_exists(public_path('foto_pengaduan/' . $pengaduan->Foto_Pengaduan))) {
                unlink(public_path('foto_pengaduan/' . $pengaduan->Foto_Pengaduan));
            }

            $pengaduan->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        }

        return redirect()->back()->with('error', 'Data tidak ditemukan');
    }

    public function store(Request $request)
    {
        $data = new M_Pengaduan;
        $data->Nama = $request->input('Nama');
        $data->Alamat = $request->input('Alamat');
        $data->No_HP = $request->input('No_HP');
        $data->Tanggal = $request->input('Tanggal');
        $data->Pengaduan = $request->input('Pengaduan');
        $data->status = 'Pengaduan';

        if ($request->hasFile('Foto_Pengaduan')) {
            $foto = $request->file('Foto_Pengaduan');
            $nama_foto = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('foto_pengaduan'), $nama_foto);
            $data->Foto_Pengaduan = $nama_foto;
        }

        $data->save();

        return redirect()->route('v_halaman')->with('success', 'Data berhasil dikirim!');
    }

    public function tugaskan($id_pengaduan)
    {
        $pengaduan = M_Pengaduan::findOrFail($id_pengaduan);
        $pengaduan->status = 'Sedang Proses';
        $pengaduan->save();

        return redirect()->back()->with('success', 'Status pengaduan diubah menjadi Sedang Proses');
    }

    public function ubahStatus(Request $request, $id_pengaduan)
        {
            if (auth()->user()->level != 2) {
                return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk mengubah status.');
            }

            $request->validate([
                'status' => 'required|in:Pengaduan,Sedang Proses,Selesai',
            ]);

            $pengaduan = M_Pengaduan::findOrFail($id_pengaduan);
            $pengaduan->status = $request->status;
            $pengaduan->save();

            return redirect()->route('pengaduan.index')->with('success', 'Status pengaduan berhasil diperbarui.');
        }


    public function halamanPengaduan()
    {
        $userEmail = auth()->user()->email;

        $pengaduanUser = M_Pengaduan::where('email', $userEmail)->get();

        return view('v_halaman', compact('pengaduanUser'));
    }

    public function publicView()
    {
        $data_pengaduan = M_Pengaduan::all(); 
        return view('v_pengaduandata', compact('data_pengaduan'));
    }
    
}
