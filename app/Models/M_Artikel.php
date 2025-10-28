<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_Artikel extends Model
{
    protected $table = 'tb_artikel';
    protected $primaryKey = 'id';
    public $timestamps = false; // karena kamu tidak pakai created_at & updated_at

    protected $fillable = [
        'judul',
        'gambar',
        'isi',
        'tanggal_upload',
    ];
}
