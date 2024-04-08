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
        Schema::create('spp', function (Blueprint $table) {
            $table->id();
            $table->string('tahun_ajaran_id'); 
            $table->string('jumlah_spp'); 
            $table->string('tanggal_jatuh_tempo'); 
            $table->string('keterangan'); 
            $table->timestamps();
        });

        // Schema::create('spp', function (Blueprint $table) {
        //     $table->id();
        //     $table->date('tanggal_spp'); 
        //     $table->string('siswa_id'); 
        //     $table->string('jumlah_spp'); 
        //     $table->string('bulan'); 
        //     $table->string('bayar_spp'); 
        //     $table->string('keterangan'); 
        //     $table->string('pic'); 
        //     $table->string('bukti'); 
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spp');
    }
};
