<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'inv_pengguna';
    protected $fillable = [
        'id_akun',
        'nama',
        'jabatan',
        // 'ip_login',
    ]; 

    // public function user(){
    //     return $this->belongsTo(User::class);
    // }
}