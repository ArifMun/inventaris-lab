<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identitas extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'inv_pengguna';
    // protected $guarded = ['ip_login'];
    protected $fillable = [
        'id_akun',
        'nama',
        'jabatan',
        // 'created_at',
        // 'updated_at'
    ];

    // public function user(){
    //     return $this->belongsTo(User::class);
    // }

    
}