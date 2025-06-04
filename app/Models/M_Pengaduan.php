<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'tb_pengaduan';
    protected $primaryKey = 'id_pengaduan';
    public $timestamps = false;

    // Sesuaikan huruf kecil untuk kolom jika database pakai huruf kecil
    protected $fillable = ['Nama', 'Alamat', 'No_HP', 'Tanggal', 'Pengaduan', 'Foto_Pengaduan', 'status'];

    public function penugasan()
    {
        return $this->hasOne(M_Penugasan::class, 'id_pengaduan', 'id_pengaduan');
    }
}
