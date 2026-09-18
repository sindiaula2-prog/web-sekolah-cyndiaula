<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            AgendaSeeder::class,
            ArtikelKategoriSeeder::class,
            ArtikelSeeder::class,
            BeritaSeeder::class,
            EkstrakurikulerSeeder::class,
            FasilitasSeeder::class,
            GaleriSeeder::class,
            GuruSeeder::class,
            JurusanSeeder::class,
            KontakSeeder::class,
            ProfilSekolahSeeder::class,
        ]);
    }
}