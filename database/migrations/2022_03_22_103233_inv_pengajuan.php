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
            $table->id();
            $table->integer('id_barang');
            $table->text('keterangan');
            $table->string('jumlah_pengajuan');
            $table->enum('verifikasi',['sudah','belum']);
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
        Schema::dropIfExists('inv_kategori');
    }
}