<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $guarded = [];

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'ruangan_id', 'id');
    }

    public function kategori_barang()
    {
        return $this->belongsTo(KategoriBarang::class, 'kategori_barang_id', 'id');
    }
    
 
    

 
}
