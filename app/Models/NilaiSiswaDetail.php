<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiSiswaDetail extends Model
{
    use HasFactory;
    protected $table = 'nilai_siswa_detail';
    protected $fillable = [
        'nilai_siswa_head_id',
        'jenis_ujian_id',
        'nilai',
    ];

 
}
