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
        'role', 
        'username',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
