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
        Schema::create('mutasi_barang', function (Blueprint $table) {
            $table->id();
            $table->string('tanggal_mutasi'); 
            $table->string('tanggal_pengembalian'); 
            $table->string('barang_id'); 
            $table->string('jenis_mutasi'); 
            $table->string('qty_mutasi'); 
            $table->string('ruangan_id'); 
            $table->string('tujuan'); 
            $table->string('pic'); 
            $table->string('bukti'); 
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
        Schema::dropIfExists('mutasi_barang');
    }
};
