<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{

    use HasFactory;
    public $timestamps = false;
    protected $table = 'inv_kategori';
    protected $fillable = [
        'nama_kategori',
        'kode_kategori',
        // 'created_at',
        // 'updated_at',
    ];

    public function barang(){
        return $this->hasMany(Barang::class);
    }

    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';
}