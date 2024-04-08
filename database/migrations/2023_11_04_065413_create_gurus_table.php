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
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            $table->string('nip');  
            $table->string('nama_guru');  
            $table->string('kode_guru');  
            $table->string('tempat_lahir');  
            $table->string('tanggal_lahir');  
            $table->string('jenis_kelamin');  
            $table->string('gelar_depan');  
            $table->string('gelar_belakang');  
            $table->text('alamat'); 
            $table->string('honor');  
            $table->string('gambar');  
            $table->string('username');  
            $table->string('password');  
            $table->string('tanggal_masuk');  
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
        Schema::dropIfExists('gurus');
    }
};
