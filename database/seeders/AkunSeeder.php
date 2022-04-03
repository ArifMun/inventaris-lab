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
            'ip_login' =>(121.232),
        ]);
        // DB::table('inv_akun')->insert([
        //     'username' => 'superadmin',
        //     'password' => Hash::make('superadmin'),
        //     'level' =>'superadmin'
        // ]);
        // DB::table('inv_pengguna')->insert([
        //     'id_akun' => '192520030',
        //     'nama' => 'arif',
        //     'jabatan' => 'mahassiwa',
        // ]);
    }
}