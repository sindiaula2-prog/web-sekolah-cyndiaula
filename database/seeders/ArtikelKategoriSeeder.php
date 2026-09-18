<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ArtikelKategori; // Sesuaikan dengan nama model Anda

class ArtikelKategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = [
            ['nama_kategori' => 'Berita'],
            ['nama_kategori' => 'Pengumuman'],
            ['nama_kategori' => 'Kegiatan'],
        ];

        foreach ($kategori as $item) {
            // updateOrCreate mencegah duplikasi jika data sudah ada
            ArtikelKategori::updateOrCreate(
                ['nama_kategori' => $item['nama_kategori']], 
                $item
            );
        }
    }
}