<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SiswasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Siswa::create([
            'nik' => '1234567890',
            'nis' => '987654321',
            'nama_siswa' => 'John Doe',
            'email' => 'johndoe@example.com',
            'jenis_kelamin' => 'Laki-laki',
            'tanggal_lahir' => '2000-01-15',
            'provinsi' => 'Jawa Barat',
            'kota' => 'Bandung',
            'alamat' => 'Jl. Contoh No. 123',
            'nama_ayah' => 'Doe Ayah',
            'pekerjaan_ayah' => 'Pegawai Swasta',
            'penghasilan_ayah' => '5000000',
            'no_telp_ayah' => '081234567890',
            'nama_ibu' => 'Doe Ibu',
            'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            'penghasilan_ibu' => '3000000',
            'no_telp_ibu' => '081234567891',
            'nama_wali' => 'Doe Wali',
            'pekerjaan_wali' => 'Wiraswasta',
            'penghasilan_wali' => '6000000',
            'no_telp_wali' => '081234567892',
            'tahun_masuk' => '2010',
            'sekolah_asal' => 'SMP Contoh',
            'kelas' => 'XII',
            'foto' => 'john_doe.jpg',
            'kk' => 'kk_john_doe.jpg',
            'ijazah' => 'ijazah_john_doe.jpg',
            'akte' => 'akte_john_doe.jpg',
            'ktp' => 'ktp_john_doe.jpg',
        ]);
    }
}
