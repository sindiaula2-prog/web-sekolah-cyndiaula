<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Agenda;
use Carbon\Carbon;

class AgendaSeeder extends Seeder
{
    public function run(): void
    {
        Agenda::create([
            'nama_agenda' => 'Ujian Kompetensi Keahlian (UKK)',
            'tanggal' => Carbon::now()->addDays(3),
            'deskripsi' => 'Pelaksanaan UKK untuk seluruh siswa kelas XII.',
        ]);

        Agenda::create([
            'nama_agenda' => 'Rapat Pleno Komite Sekolah',
            'tanggal' => Carbon::now()->addDays(10),
            'deskripsi' => 'Pertemuan koordinasi antara pihak sekolah dan orang tua.',
        ]);

        Agenda::create([
            'nama_agenda' => 'TKA (Tes Kemampuan Akademik)',
            'tanggal' => Carbon::now()->addDays(10),
            'deskripsi' => 'Berdasarkan Kepmendikdasmen Nomor 56 Tahun 2026, pemerintah telah menetapkan pedoman pelaksanaan TKA dan AN yang terintegrasi untuk jenjang SD, SMP, SMA, dan SMK. Artikel ini menyajikan rangkuman lengkap jadwal pelaksanaan, sesi, dan alokasi waktu untuk seluruh zona waktu Indonesia (WIB, WITA, WIT).',
        ]);
    }
}