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
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('kategori_produk_id'); 
            $table->string('kode_produk'); 
            $table->string('nama_produk'); 
            $table->string('merk'); 
            $table->string('type'); 
            $table->string('stok'); 
            $table->string('status'); 
            $table->string('lokasi'); 
            $table->string('harga_beli'); 
            $table->string('harga_jual_1'); 
            $table->string('harga_jual_2'); 
            $table->string('harga_jual_3'); 
            $table->string('gambar'); 
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
        Schema::dropIfExists('produk');
    }
};
