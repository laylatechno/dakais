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
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->string('judul');  
            $table->string('slug');  
            $table->string('penulis'); 
            $table->string('kategori'); 
            $table->string('ringkasan'); 
            $table->text('isi'); 
            $table->string('gambar'); 
            $table->string('sumber'); 
            $table->string('urutan'); 
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
        Schema::dropIfExists('berita');
    }
};
