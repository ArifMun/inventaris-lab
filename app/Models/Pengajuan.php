<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'inv_pengajuan';
    protected $fillable = [
        'id_barang',
        'nama_barang',
        'jumlah_pengajuan',
        'verifikasi',
        'keterangan',
        // 'created_at',
        // 'updated_at',
    ];

    public function barang(){
        return $this->hasMany(Barang::class);
    }
}