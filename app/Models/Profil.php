<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;
    protected $table = 'profil';
    protected $fillable = [
        'nama_sekolah',
        'npsn',
        'kepala_sekolah_id',
        'bendahara_sekolah_id',
        'operator_sekolah_id',
        'status',
        'alamat',
        'no_telp',
        'email',
        'instagram',
        'facebook',
        'website',
        'youtube',
        'deskripsi',
        'logo',
        'favicon',
        'gambar',
    ];
}
