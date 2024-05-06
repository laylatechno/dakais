<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi';
    protected $guarded = [];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id'); // Relasi dengan model Siswa
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id'); // Relasi dengan model guru
    }
}
