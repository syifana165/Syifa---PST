<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_PJ extends Model
{
    use HasFactory;

    protected $table = 'tb_pj'; 
    public $timestamps = false; 

    protected $fillable = ['Nama', 'No_HP', 'Alamat', 'TPS', 'Keterangan'];
}
