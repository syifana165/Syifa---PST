<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_Tim extends Model
{
    protected $table = 'tb_tim';
    protected $primaryKey = 'id_tim';
    public $timestamps = false;

    protected $fillable = ['Kelompok_Petugas',
];

}
