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
        Schema::create('top_up_member', function (Blueprint $table) {
            $table->id();
            $table->string('member_id'); 
            $table->string('tanggal_top_up'); 
            $table->string('jumlah_sebelum_top_up'); 
            $table->string('jumlah_top_up'); 
            $table->string('jumlah_sesudah_top_up'); 
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
        Schema::dropIfExists('top_up_member');
    }
};
