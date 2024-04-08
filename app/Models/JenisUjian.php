<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisUjian extends Model
{
    use HasFactory;
    protected $table = 'jenis_ujian';
    protected $fillable = [
        'nama_ujian',
        'tanggal_ujian',
        'keterangan',
        
    ];
}
