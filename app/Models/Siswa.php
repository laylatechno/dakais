<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $fillable = [
        'nik',
        'nis',
        'nama_siswa',
        'email',
        'jenis_kelamin',
        'tanggal_lahir',
        'tempat_lahir',
        'provinsi',
        'kota',
        'alamat',
        'nama_ayah',
        'pekerjaan_ayah',
        'penghasilan_ayah',
        'no_telp_ayah',
        'nama_ibu',
        'pekerjaan_ibu',
        'penghasilan_ibu',
        'no_telp_ibu',
        'nama_wali',
        'pekerjaan_wali',
        'penghasilan_wali',
        'no_telp_wali',
        'tahun_masuk',
        'sekolah_asal',
        'kelas',
        'foto',
        'kk',
        'ijazah',
        'akte',
        'ktp',
    ];
    
    // pada pemanggilan siswa multiple penempatan kelas
        public function penempatanKelas()
    {
        return $this->hasMany(PenempatanKelas::class, 'siswa_id');
    }
    
}
