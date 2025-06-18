<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_LaporanP extends Model
{
    protected $table = 'tb_laporanpetugas';
    protected $primaryKey = 'id_laporanpetugas';
    public $timestamps = false;
    protected $fillable = [
        'id_petugas',
        'nama',
        'no_hp',
        'tanggal',
        'lokasi_tugas',
        'deskripsi_tugas',
        'upload_foto',
    ];

    public function petugas()
    {
        return $this->belongsTo(M_Petugas::class, 'id_petugas', 'id_petugas');
    }

    public function penugasan()
    {
        return $this->belongsTo(M_Penugasan::class, 'id_penugasan', 'id_penugasan');
    }
}
