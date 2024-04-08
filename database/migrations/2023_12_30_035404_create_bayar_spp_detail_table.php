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
        Schema::create('bayar_spp_detail', function (Blueprint $table) {
            $table->id();
            $table->date('bayar_spp_head'); 
            $table->string('bulan_bayar'); 
            $table->string('status_bayar'); 
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
        Schema::dropIfExists('bayar_spp_detail');
    }
};
