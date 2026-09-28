<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_id',
        'kode_barang',
        'nama_barang',
        'spesifikasi',
        'stok',
        'kondisi',
        'status',
    ];

    // Relasi Many to One: 1 Barang dimiliki oleh 1 Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}