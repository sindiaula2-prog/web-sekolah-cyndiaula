<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kontak;

class KontakSeeder extends Seeder
{
    public function run(): void
    {
        Kontak::truncate(); // Bersihkan data lama

        Kontak::create([
            'nama' => 'Budi Santoso',
            'email' => 'budi.santoso@gmail.com',
            'no_hp' => '081234567890',
            'pesan' => 'Halo admin, apakah ada jalur pendaftaran khusus untuk prestasi olahraga tahun ini?',
        ]);

        Kontak::create([
            'nama' => 'Siti Aminah',
            'email' => 'siti.aminah@yahoo.com',
            'no_hp' => '089876543210',
            'pesan' => 'Selamat pagi, saya orang tua calon siswa ingin menanyakan rincian biaya untuk jurusan TJKT.',
        ]);

        Kontak::create([
            'nama' => 'Ahmad Fauzi',
            'email' => 'fauzi.ahmad@outlook.com',
            'no_hp' => '085612345678',
            'pesan' => 'Terima kasih, informasi seputar profil sekolah di website ini sangat membantu dan lengkap.',
        ]);
    }
}