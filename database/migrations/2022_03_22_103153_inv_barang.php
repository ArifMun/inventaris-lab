<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InvBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_barang', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('no_barang');
            $table->string('nama_barang');
            $table->integer('kategori');
            $table->integer('jumlah');
            $table->enum('penulis',['admin','superadmin']);
            $table->text('keterangan');
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
        Schema::dropIfExists('inv_barang');
    }
}