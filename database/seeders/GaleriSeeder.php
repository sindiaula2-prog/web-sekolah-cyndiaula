<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Galeri;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        Galeri::truncate();

        Galeri::create([
            'judul' => 'Kegiatan Literasi',
            'kategori' => 'kegiatan_sekolah',
            'foto' => 'literasiJPG.jpg',
            'deskripsi' => 'Kegiatan literasi rutin bersama siswa untuk meningkatkan minat baca di sekolah.',
        ]);

        Galeri::create([
            'judul' => 'Peringatan Poe Ibu',
            'kategori' => 'acara_sekolah',
            'foto' => 'poeibu.JPG',
            'deskripsi' => 'Peringatan hari ibu di lingkungan sekolah sebagai bentuk penghargaan kepada kaum ibu.',
        ]);

        Galeri::create([
            'judul' => 'Senam Bersama',
            'kategori' => 'kesehatan',
            'foto' => 'senam.JPG',
            'deskripsi' => 'Kegiatan senam sehat jasmani dan rohani yang diikuti oleh seluruh warga sekolah.',
        ]);

        Galeri::create([
            'judul' => 'Solat Dhuha Berjamaah',
            'kategori' => 'keagamaan',
            'foto' => 'solatdhuha.JPG',
            'deskripsi' => 'Kegiatan pembiasaan solat dhuha berjamaah untuk memperkuat nilai-nilai religius siswa.',
        ]);

        Galeri::create([
            'judul' => 'Upacara Bendera Hari Senin',
            'kategori' => 'kegiatan_sekolah',
            'foto' => 'upacarasekolah.JPG',
            'deskripsi' => 'Kegiatan rutin upacara bendera hari Senin di lapangan sekolah untuk menumbuhkan rasa nasionalisme.',
        ]);
    }
}