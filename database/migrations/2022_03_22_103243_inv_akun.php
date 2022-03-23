<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InvAkun extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_akun', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('username');
            $table->string('password')->unique();
            $table->enum('level',['admin','superadmin']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_akun');
    }
}