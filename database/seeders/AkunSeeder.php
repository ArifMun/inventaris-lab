<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Akun;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inv_akun')->insert([
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'level' =>'admin',
        ]);
        DB::table('inv_akun')->insert([
            'username' => 'superadmin',
            'password' => Hash::make('superadmin'),
            'level' =>'superadmin'
        ]);
        DB::table('inv_kategori')->insert([
            'nama_kategori' => 'Jaringan',
            'kode_kategori' => '01.JAR.'
        ]);
        DB::table('inv_kategori')->insert([
            'nama_kategori' => 'IoT',
            'kode_kategori' => '02.IoT.'
        ]);
        DB::table('inv_kategori')->insert([
            'nama_kategori' => 'Hardware',
            'kode_kategori' => '03.HDW.'
        ]);
    
        DB::table('inv_kategori')->insert([
            'nama_kategori' => 'Multimedia',
            'kode_kategori' => '04.MLM.'
        ]);
        DB::table('inv_kategori')->insert([
            'nama_kategori' => 'Pemrograman',
            'kode_kategori' => '05.Pro.'
        ]);
        DB::table('inv_kategori')->insert([
            'nama_kategori' => 'Lain-lain',
            'kode_kategori' => '06.LL.'
        ]);
    }
}