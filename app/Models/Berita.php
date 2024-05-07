<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'berita';
    protected $guarded = [];
    // protected $fillable = [
    //     'judul_berita',
    //     'slug',
    //     'penulis',
    //     'kategori_berita_id',
    //     'isi',
    //     'gambar',
    //     'sumber',
    //     'urutan',
    //     'status',
    //     'views',
    // ];

    // Model Berita
    public function kategoriBerita()
    {
        return $this->belongsTo(KategoriBerita::class, 'kategori_berita_id');
    }

}
