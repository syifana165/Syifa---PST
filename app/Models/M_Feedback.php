<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_Feedback extends Model
{
    protected $table = 'tb_feedback'; 
    public $timestamps = false; 
    protected $fillable = ['Nama', 'Email', 'Feedback'];

    public function deleteData($id)
    {
        DB::table($this->table)->where('id', $id)->delete();
    }
}
