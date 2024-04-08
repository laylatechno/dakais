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
        Schema::create('bayar_spp_head', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_bayar'); 
            $table->string('siswa_id'); 
            $table->string('jumlah_bayar'); 
            $table->string('metode_pembayaran'); 
            $table->string('keterangan'); 
            $table->string('status_head'); 
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
        Schema::dropIfExists('bayar_spp_head');
    }
};
