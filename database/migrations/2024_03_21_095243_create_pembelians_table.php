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
        Schema::create('pembelian', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pembelian'); 
            $table->string('kode_pembelian'); 
            $table->string('supplier_id'); 
            $table->string('nama_supplier'); 
            $table->string('total_bayar'); 
            $table->string('jenis_pembayaran'); 
            $table->string('bukti'); 
            $table->string('pic'); 
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
        Schema::dropIfExists('pembelian');
    }
};
