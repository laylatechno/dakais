<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $fillable = [
        'nama_kelas',
        'wali_kelas',
        'urutan',
    ];

    // join tabel memanggil guru pada tabel guru
    public function waliKelas()
    {
        return $this->belongsTo(Guru::class, 'wali_kelas');
    }
    
    public function guru()
{
    return $this->belongsTo(Guru::class, 'wali_kelas', 'id');
}

    
    
}
