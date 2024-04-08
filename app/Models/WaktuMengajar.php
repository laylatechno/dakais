<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaktuMengajar extends Model
{
    use HasFactory;
    protected $table = 'waktu_mengajar';
    protected $fillable = [
        'jam',
        'waktu',
        
    ];
}
