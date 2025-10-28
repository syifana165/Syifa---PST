<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class M_User extends Authenticatable
{
    protected $table = 'tb_user';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'nama',
        'email',
        'username',
        'password',
        'role',
        'foto'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
