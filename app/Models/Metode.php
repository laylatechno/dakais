<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metode extends Model
{
    use HasFactory;
    protected $table = 'metode';
    protected $guarded = [];
    // protected $fillable = [
    //     'nama',
    //     'keterangan',
    //     'gambar',
    // ];
}
