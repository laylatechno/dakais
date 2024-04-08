<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarikTabungan extends Model
{
    use HasFactory;
    protected $table = 'tarik_tabungan';
    protected $guarded = [];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}
