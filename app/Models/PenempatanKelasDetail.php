<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenempatanKelasDetail extends Model
{
    use HasFactory;
    protected $table = 'penempatan_kelas_detail';
    protected $fillable = [
        'penempatan_kelas_head_id',
        'kelas_id',
        'siswa_id',
    ];
   

    
}
