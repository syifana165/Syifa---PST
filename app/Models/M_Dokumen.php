<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Dokumen extends Model
{
    use HasFactory;

    protected $table = 'tb_dokumen';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'nama_dokumen',
        'deskripsi',
        'tipe',
        'file_dokumen',
        'tanggal_upload'
    ];
}
