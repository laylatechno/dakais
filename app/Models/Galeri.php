<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;
    protected $table = 'galeri';
    protected $fillable = [
        'nama_galeri',
        'kategori_galeri_id',
        'keterangan',
        'link',
        'gambar',
        'urutan',
    ];

    // Model Galeri
    public function kategoriGaleri()
    {
        return $this->belongsTo(KategoriGaleri::class, 'kategori_galeri_id');
    }

}
