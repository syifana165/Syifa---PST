<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Profilperusahaan extends Model
{
    use HasFactory;

    protected $table = 'tb_profil_perusahaan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tipe',
        'isi',
        'gambar',
    ];
}
