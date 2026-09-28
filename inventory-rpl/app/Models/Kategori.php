<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kategori',
        'deskripsi',
    ];

    // Relasi One to Many: 1 Kategori memiliki banyak Barang
    public function barangs()
    {
        return $this->hasMany(Barang::class, 'kategori_id');
    }
}