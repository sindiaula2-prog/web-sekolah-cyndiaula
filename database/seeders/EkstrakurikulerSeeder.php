<?php

namespace Database\Seeders;

use App\Models\Ekstrakurikuler;
use Illuminate\Database\Seeder;

class EkstrakurikulerSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama_ekskul' => 'Paskibra',
                'pembina' => 'Ende Iskandar',
                'deskripsi' => 'Pasukan pengibar bendera yang melatih kedisiplinan, kepemimpinan, kekompakan, serta kecintaan terhadap tanah air melalui baris-berbaris.',
                'logo' => 'images/ekskul/paskibra.png',
                'guru_id' => 1,
            ],
            [
                'nama_ekskul' => 'Pramuka',
                'pembina' => 'Moch Najib',
                'deskripsi' => 'Kegiatan kepramukaan yang membina karakter mandiri, tanggung jawab, kerja sama tim, serta keterampilan bertahan hidup dan jiwa sosial.',
                'logo' => 'images/ekskul/pramuka.png',
                'guru_id' => 1,
            ],
            [
                'nama_ekskul' => 'Vollyball',
                'pembina' => 'Dedi Sukardi',
                'deskripsi' => 'Wadah pengembangan bakat dan latihan fisik terarah untuk meningkatkan teknik dasar, strategi permainan, serta sportivitas dalam olahraga bola voli.',
                'logo' => 'images/ekskul/volleyball.png',
                'guru_id' => 1,
            ],
            [
                'nama_ekskul' => 'PMR',
                'pembina' => 'Mega Nurunnisa',
                'deskripsi' => 'Palang Merah Remaja yang melatih keterampilan pertolongan pertama, kesiapsiagaan bencana, serta menanamkan jiwa kemanusiaan dan kesehatan remaja.',
                'logo' => 'images/ekskul/pmr.png',
                'guru_id' => 1,
            ],
            [
                'nama_ekskul' => 'Karawitan',
                'pembina' => 'Yoga Agung',
                'deskripsi' => 'Kegiatan seni budaya tradisional untuk melestarikan permainan alat musik gamelan dan seni suara pelog/slendro khas Sunda.',
                'logo' => 'images/ekskul/karawitan.png',
                'guru_id' => 1,
            ],
            [
                'nama_ekskul' => 'Jurnalistik',
                'pembina' => 'Rahmat Setiawan, S.T.',
                'deskripsi' => 'Pelatihan teknik penulisan berita, fotografi, reportase, dan pengelolaan mading atau majalah sekolah secara kreatif dan informatif.',
                'logo' => 'images/ekskul/jurnalistik.png',
                'guru_id' => 1,
            ],
            [
                'nama_ekskul' => 'Marching Band',
                'pembina' => 'Nurah Alwaini',
                'deskripsi' => 'Seni musik ansambel baris-berbaris yang memadukan keahlian memainkan alat musik tiup, perkusi, serta formasi koreografi yang dinamis.',
                'logo' => 'images/ekskul/marching_band.png',
                'guru_id' => 1,
            ],
            [
                'nama_ekskul' => 'Futsal',
                'pembina' => 'Jaya Nursetiawan, S.Pd',
                'deskripsi' => 'Pengembangan minat dan bakat olahraga sepak bola dalam ruangan, berfokus pada taktik permainan, kerja sama tim, dan stamina.',
                'logo' => 'images/ekskul/futsal.png',
                'guru_id' => 1,
            ],
            [
                'nama_ekskul' => 'Bahasa Jepang',
                'pembina' => 'Basar',
                'deskripsi' => 'Klub kebudayaan dan bahasa asing yang mempelajari tata bahasa, percakapan dasar (nihongo), serta kebudayaan populer Jepang.',
                'logo' => 'images/ekskul/bahasa_jepang.png',
                'guru_id' => 1,
            ],
            [
                'nama_ekskul' => 'Rohis',
                'pembina' => 'Asep Muhlis, S.Pd.i',
                'deskripsi' => 'Kerohanian Islam sebagai wadah pembinaan akhlak mulia, kajian keislaman rutin, tadarus, serta penguatan karakter religius siswa.',
                'logo' => 'images/ekskul/rohis.png',
                'guru_id' => 1,
            ],
        ];

        foreach ($data as $item) {
            Ekstrakurikuler::updateOrCreate(['nama_ekskul' => $item['nama_ekskul']], $item);
        }
    }
}