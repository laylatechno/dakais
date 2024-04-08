<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiSiswaHead extends Model
{
    use HasFactory;
    protected $table = 'nilai_siswa_head';
    protected $fillable = [
        'tahun_ajaran_id',
        'kelas_id',
        'siswa_id',
        'total_nilai',
        'keterangan',
        
    ];
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class, 'tahun_ajaran_id');
    }
    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }
    

 
}
