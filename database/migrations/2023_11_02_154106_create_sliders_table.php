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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('nama_slider'); // Tipe data string untuk kota
            $table->text('keterangan'); // Tipe data text untuk alamat (gunakan text jika alamat panjang)
            $table->string('link'); // Tipe data string untuk kota
            $table->string('urutan'); // Tipe data string untuk kota
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
        Schema::dropIfExists('sliders');
    }
};
