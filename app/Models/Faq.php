<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    protected $table = 'faq';
    protected $fillable = [
        'pertanyaan',
        'jawaban',
        'urutan'
    ];

    public function orderByUrutan($order = 'asc')
    {
        return $this->orderBy('urutan', $order);
    }
}
