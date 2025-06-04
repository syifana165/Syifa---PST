<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Feedback; // Pastikan model ini benar
use Illuminate\Support\Facades\DB;

class C_Feedback extends Controller
{
    public function index(Request $request)
{
    $query = DB::table('tb_feedback');

    if ($request->has('search') && $request->search != '') {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            $q->where('Nama', 'like', "%{$search}%")
              ->orWhere('Email', 'like', "%{$search}%")
              ->orWhere('Feedback', 'like', "%{$search}%");
        });
    }

    $feedback = $query->get(); // bisa juga paginate(10) jika mau pagination

    return view('v_feedback', compact('feedback'));
}

    
    public function create()
    {
        return view('v_feedback'); // Tampilkan form input
    }
    

    public function store(Request $request)
    {
        // Gunakan model yang benar (M_Feedback)
        M_Feedback::create([
            'Nama' => $request->Nama,
            'Email' => $request->Email,
            'Feedback' => $request->Feedback
        ]);

        return redirect()->route('v_halaman')->with('success', 'Feedback berhasil dikirim!');
    }

    public function destroy(Request $request)
    {
        $nama = $request->Nama;
    
        // Pastikan hanya satu yang terhapus
        DB::table('tb_feedback')->where('Nama', $nama)->limit(1)->delete();
    
        return redirect()->route('feedback.index')->with('pesan', 'Feedback berhasil dihapus!');
    }
}
