<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str; // <-- Ditambahkan untuk generate slug

class ArtikelKategoriFactory extends Factory
{
    public function definition(): array
    {
        $nama = $this->faker->unique()->words(2, true); // Menggunakan 2 kata agar lebih alami

        return [
            'nama_kategori' => ucfirst($nama),
            'slug'          => Str::slug($nama), // Generator slug otomatis
        ];
    }
}