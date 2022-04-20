<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InvPengajuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_pengajuan', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('id_barang');
            $table->string('nama_barang');
            $table->text('keterangan')->nullable();
            $table->string('jumlah_pengajuan');
            $table->enum('pengajuan',['sudah','belum']);
            $table->enum('verifikasi',['sudah','belum']);
            // $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_kategori');
    }
}