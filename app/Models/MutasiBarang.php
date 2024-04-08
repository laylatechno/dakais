<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MutasiBarang extends Model
{
    use HasFactory;
    protected $table = 'mutasi_barang';
    protected $guarded = [];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'id');
    }
 
    public function ruangan_asal()
    {
        return $this->belongsTo(Ruangan::class, 'ruangan_id_asal', 'id');
    }
    public function ruangan_tujuan()
    {
        return $this->belongsTo(Ruangan::class, 'ruangan_id_tujuan', 'id');
    }
 
    

 
}
