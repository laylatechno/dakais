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
        Schema::create('unduhan', function (Blueprint $table) {
            $table->id();
            $table->string('tanggal_publish'); 
            $table->string('nama_unduhan'); 
            $table->string('kategori'); 
            $table->string('link'); 
            $table->string('thumbnail'); 
            $table->string('file'); 
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
        Schema::dropIfExists('unduhan');
    }
};
