<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_transaksi',
        'tanggal_pemesanan',
        'nama_awal',
        'nama_akhir',
        'gambar',
        'email',
        'no_telp',
        'alamat',
        'kode_pos',
        'kota',
        'tanggal_lahir',
        'bulan_lahir',
        'tahun_lahir',
        'tempat_lahir',
        'sim',
        'jenis_kelamin',
        'kebangsaan',
        'status_pernikahan',
        'linkedln',
        'website',
        'deskripsi_profil',
        // sekat
        'nama_lengkap',
        'id_portfolio',
        'jumlah_bayar',
        'status_pembayaran',
        'hasil_cv',

    ];
}

 