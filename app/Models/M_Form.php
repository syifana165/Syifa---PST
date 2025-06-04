<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Form extends Model
{
    use HasFactory;

    protected $table = 'pengaduan'; // Sesuaikan dengan nama tabel di database

    protected $fillable = [
        'nama',
        'alamat',
        'no_hp',
        'pengaduan',
        'gambar',
    ];
}
