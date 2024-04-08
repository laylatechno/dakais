<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    protected $table = 'mapel';
    protected $fillable = [
        'nama_mapel',
        'guru_pengampu',
        'kkm',
    ];

    // join tabel untuk memanggil data guru pada tabel guru di form mapel
    public function guruPengampu()
    {
        return $this->belongsTo(Guru::class, 'guru_pengampu');
    }
}
