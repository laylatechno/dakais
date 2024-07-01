<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;

class Siswa extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    protected $table = 'siswa';
    protected $guarded = [];

    // Set password attribute to be hashed before saving
    // public function setPasswordAttribute($value)
    // {
    //     $this->attributes['password'] = Hash::make($value);
    // }

    // pada pemanggilan siswa multiple penempatan kelas
    public function penempatanKelas()
    {
        return $this->hasMany(PenempatanKelasDetail::class, 'siswa_id');
    }
    protected $with = ['penempatanKelas'];
}
