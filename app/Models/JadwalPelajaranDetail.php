<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPelajaranDetail extends Model
{
    use HasFactory;
    protected $table = 'jadwal_pelajaran_detail';
    protected $fillable = [
        'jadwal_pelajaran_id',
        'waktu_mengajar_id',
        'mapel_id',
    ];

    public function mataPelajaran()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }

        public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }


    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
    public function waktuMengajar()
    {
        return $this->belongsTo(WaktuMengajar::class, 'waktu_mengajar_id');
    }
}
