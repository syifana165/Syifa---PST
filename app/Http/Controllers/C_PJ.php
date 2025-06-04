<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\M_PJ;

class C_PJ extends Controller
{
    public function index(Request $request)
{
    $query = DB::table('tb_pj');

    if ($request->has('search')) {
        $search = $request->search;
        $query->where('Nama', 'like', "%$search%")
              ->orWhere('TPS', 'like', "%$search%");
    }

    $dataPJ = $query->get();

    return view('v_pj', compact('dataPJ'));
}


    
    public function create()
    {
        return view('v_pj'); 
    }

   
    public function store(Request $request)
    {
     
        $request->validate([
            'Nama' => 'required|string|max:255',
            'No_HP' => 'required|string|regex:/^\d+$/',
            'Alamat' => 'required|string|max:500',
            'TPS' => 'required|string|max:255',
            'Keterangan' => 'required|string|max:255',
        ]);

       
        M_PJ::create([
            'Nama' => $request->Nama,
            'No_HP' => $request->No_HP,
            'Alamat' => $request->Alamat,
            'TPS' => $request->TPS,
            'Keterangan' => $request->Keterangan,
        ]);

        return redirect()->route('pj.index')->with('success', 'Penanggung Jawab berhasil ditambahkan!');
    }

 
    public function edit($id)
    {
        $pj = M_PJ::find($id); 

        if (!$pj) {
            abort(404); 
        }

        return view('v_pj_edit', compact('pj'));
    }

    // Memperbarui data penanggung jawab
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'Nama' => 'required|string|max:255',
            'No_HP' => 'required|string|regex:/^\d+$/',
            'Alamat' => 'required|string|max:500',
            'TPS' => 'required|string|max:255',
            'Keterangan' => 'required|string|max:255',
        ]);

     
        $pj = M_PJ::findOrFail($id);

        // Update data
        $pj->update([
            'Nama' => $request->Nama,
            'No_HP' => $request->No_HP,
            'Alamat' => $request->Alamat,
            'TPS' => $request->TPS,
            'Keterangan' => $request->Keterangan,
        ]);

        return redirect()->route('pj.index')->with('success', 'Penanggung Jawab berhasil diperbarui!');
    }

    
    public function destroy($id)
    {

        $pj = M_PJ::findOrFail($id);
        $pj->delete();

        return redirect()->route('pj.index')->with('success', 'Data berhasil dihapus!');
    }

    public function detail($id)
    {
        $pj = M_PJ::find($id); 

        if (!$pj) {
            abort(404); 
        }

        return view('v_pj_detail', compact('pj'));
    }

    public function publicView()
    {
        $data_pj = M_PJ::all(); 
        return view('v_penanggungjawab', compact('data_pj'));
    }
}
