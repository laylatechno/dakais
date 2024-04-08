<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keluar', function (Blueprint $table) {
            $table->id();
            $table->string('tanggal_keluar'); 
            $table->string('nomor_surat'); 
            $table->string('penerima'); 
            $table->string('jenis_surat'); 
            $table->string('perihal'); 
            $table->string('lampiran'); 
            $table->string('tindak_lanjut'); 
            $table->text('deskripsi'); 
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
        Schema::dropIfExists('surat_keluar');
    }
};
