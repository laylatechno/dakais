<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BayarSppDetail extends Model
{
    use HasFactory;
    protected $table = 'bayar_spp_detail';
    protected $guarded = [];
    
    public function bulan()
    {
        return $this->belongsTo(Bulan::class, 'bulan_id', 'id');
    }
   

    
}
