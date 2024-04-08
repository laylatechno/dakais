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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id(); // Ini adalah kolom auto-increment yang umum digunakan untuk ID
            $table->string('nik'); // Tipe data string untuk NIK
            $table->string('nis'); // Tipe data string untuk NIS
            $table->string('nama_siswa'); // Tipe data string untuk nama siswa
            $table->string('email'); // Tipe data string untuk alamat email
            $table->string('jenis_kelamin'); // Tipe data string untuk jenis kelamin
            $table->string('tanggal_lahir'); // Tipe data date untuk tanggal lahir
            $table->string('provinsi'); // Tipe data string untuk provinsi
            $table->string('kota'); // Tipe data string untuk kota
            $table->text('alamat'); // Tipe data text untuk alamat (gunakan text jika alamat panjang)
            $table->string('nama_ayah'); // Tipe data string untuk nama ayah
            $table->string('pekerjaan_ayah'); // Tipe data string untuk pekerjaan ayah
            $table->string('penghasilan_ayah'); // Tipe data string untuk penghasilan ayah
            $table->string('no_telp_ayah'); // Tipe data string untuk nomor telepon ayah
            $table->string('nama_ibu'); // Tipe data string untuk nama ibu
            $table->string('pekerjaan_ibu'); // Tipe data string untuk pekerjaan ibu
            $table->string('penghasilan_ibu'); // Tipe data string untuk penghasilan ibu
            $table->string('no_telp_ibu'); // Tipe data string untuk nomor telepon ibu
            $table->string('nama_wali'); // Tipe data string untuk nama wali
            $table->string('pekerjaan_wali'); // Tipe data string untuk pekerjaan wali
            $table->string('penghasilan_wali'); // Tipe data string untuk penghasilan wali
            $table->string('no_telp_wali'); // Tipe data string untuk nomor telepon wali
            $table->string('tahun_masuk'); // Tipe data integer untuk tahun masuk
            $table->string('sekolah_asal'); // Tipe data string untuk sekolah asal
            $table->string('kelas'); // Tipe data string untuk kelas
            $table->string('foto'); // Tipe data string untuk nama file foto
            $table->string('kk'); // Tipe data string untuk nama file Kartu Keluarga
            $table->string('ijazah'); // Tipe data string untuk nama file ijazah
            $table->string('akte'); // Tipe data string untuk nama file akte
            $table->string('ktp'); // Tipe data string untuk nama file KTP
            $table->timestamps(); // Ini adalah kolom created_at dan updated_at yang umum digunakan


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
};
