<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
       $kategori = [
            ['nama_kategori' => 'Komputer & Laptop', 'deskripsi' => 'Perangkat komputer, PC All-in-One, dan Laptop praktik'],
            ['nama_kategori' => 'Perangkat Jaringan', 'deskripsi' => 'Router, Switch, Access Point, dan Mikrotik'],
            ['nama_kategori' => 'Alat Perkabelan', 'deskripsi' => 'Tang crimping, LAN tester, kabel UTP, dan connector RJ45'],
            ['nama_kategori' => 'Multimedia', 'deskripsi' => 'Proyektor, layar proyektor, kamera, dan microphone'],
        ];

        foreach ($kategori as $item) {
            Kategori::create($item);
        }
    }
}