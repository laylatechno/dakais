<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'guru';
    protected $fillable = [
        'nip',
        'nama_guru',
        'kode_guru',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'no_telp',
        'instagram',
        'email',
        'gelar_depan',
        'gelar_belakang',
        'alamat',
        'honor',
        'gambar',
        'username',
        'password',
        'status',
        'tanggal_masuk',
    ];


}

 