<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BayarSppHead extends Model
{
    use HasFactory;
    protected $table = 'bayar_spp_head';
    protected $guarded = [];

    
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }

    public function bayar_spp_detail()
    {
        return $this->hasMany(BayarSppDetail::class);
    }


 
  
    

    
}
