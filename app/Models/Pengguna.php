<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengguna extends Authenticatable
{
    use HasFactory;

    protected $table = 'login_pengguna'; // Sesuaikan dengan nama tabel di database
    protected $fillable = ['email', 'password'];
    protected $hidden = ['password'];
}
 