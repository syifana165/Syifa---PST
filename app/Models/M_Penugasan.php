<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\M_Pengaduan; 


class M_Penugasan extends Model
{
    protected $table = 'tb_penugasan';
    protected $primaryKey = 'id_penugasan';
    public $timestamps = false; 
    public $incrementing = true;

    protected $fillable = [
        'id_pengaduan',
        'kelompok_petugas',
        'id_petugas',
    ];

    public function pengaduan()
    {
        return $this->belongsTo(M_Pengaduan::class, 'id_pengaduan');
    }
  
    public function petugas()
    {
        return $this->belongsTo(M_Petugas::class, 'id_petugas', 'id_petugas');
    }
}
