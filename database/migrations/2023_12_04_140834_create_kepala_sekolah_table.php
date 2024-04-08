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
        Schema::create('kepala_sekolah', function (Blueprint $table) {
            $table->id();
            $table->string('nip'); 
            $table->string('nama_kepala_sekolah'); 
            $table->string('tahun_mulai'); 
            $table->string('tahun_akhir'); 
            $table->string('status'); 
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
        Schema::dropIfExists('kepala_sekolah');
    }
};
