<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $table = 'slider';
    protected $guarded = [];
    // protected $fillable = [
    //     'nama_slider',
    //     'keterangan',
    //     'link',
    //     'urutan',
    //     'gambar',
    // ];
}
