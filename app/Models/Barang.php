<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'inv_barang';
    protected $fillable = [
        'no_barang',
        'nama_barang',
        'kategori',
        'jumlah',
        'penulis',
        'keterangan',
        // 'created_at',
        // 'updated_at',
    ];

    protected $hidden = [
        'password'
    ];

    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';
}