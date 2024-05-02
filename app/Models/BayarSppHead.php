<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BayarSppHead extends Model
{
    use HasFactory;
    protected $table = 'bayar_spp_head';
    protected $guarded = [];

    
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }

    public function sppRelasi()
    {
        return $this->belongsTo(Spp::class, 'spp', 'id');
    }

    public function penempatanKelasDetail()
    {
        return $this->hasOne(PenempatanKelasDetail::class, 'siswa_id', 'siswa_id');
    }
 
    public function penempatanKelas()
    {
        return $this->hasOneThrough(Kelas::class, PenempatanKelasDetail::class, 'siswa_id', 'id', 'siswa_id', 'kelas_id');
    }
 
  
    

    
}
