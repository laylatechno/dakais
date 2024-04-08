<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;
    protected $table = 'pemasukan';
    protected $fillable = [
        'tanggal_pemasukan',
        'nama_pemasukan',
        'jumlah_pemasukan',
        'keterangan',
        'pic',
        'bukti',
        
    ];
    // protected $guarded = [];
}
