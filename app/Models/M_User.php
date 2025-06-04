<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class M_User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'tb_user';

    protected $fillable = [
        'nama',
        'email',
        'password',
        'level', 
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
