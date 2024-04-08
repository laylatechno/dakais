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
        Schema::create('surat_masuk', function (Blueprint $table) {
            $table->id();
            $table->string('tanggal_masuk'); 
            $table->string('nomor_surat'); 
            $table->string('pengirim'); 
            $table->string('jenis_surat'); 
            $table->string('perihal'); 
            $table->string('lampiran'); 
            $table->string('disposisi'); 
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
        Schema::dropIfExists('surat_masuk');
    }
};
