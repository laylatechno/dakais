<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopUpMember extends Model
{
    use HasFactory;
    protected $table = 'top_up_member';
    protected $guarded = [];
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }
}
