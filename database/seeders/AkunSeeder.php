<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'nama' => 'admin',
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'level' =>'admin'
        ]);
        DB::table('inv_akun')->insert([
            'nama' => 'superadmin',
            'username' => 'superadmin',
            'password' => Hash::make('superadmin'),
            'level' =>'superadmin'
        ]);
    }
}