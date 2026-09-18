<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProfilSekolah;

class ProfilSekolahSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                "kategori" => "tentang",
                "judul"    => "Tentang SMK Negeri 1 Cijati",
                "konten"   => "<p>SMK Negeri 1 Cijati merupakan salah satu Sekolah Menengah Kejuruan Negeri yang berlokasi di Kecamatan Cijati, Kabupaten Cianjur. Sekolah ini berkomitmen mencetak lulusan yang unggul, berkarakter, dan berprestasi melalui pendidikan kejuruan yang berorientasi pada dunia usaha, dunia industri, dan dunia kerja (DUDIKA).</p><p>Dengan didukung tenaga pendidik profesional serta fasilitas praktik yang memadai, SMK Negeri 1 Cijati terus berupaya menghasilkan sumber daya manusia yang siap bersaing di era industri modern, baik untuk melanjutkan pendidikan, bekerja, maupun berwirausaha.</p>",
            ],
            [
                "kategori" => "visi-misi",
                "judul"    => "Visi & Misi",
                "konten"   => "<h4>Visi</h4><p>Mewujudkan SMK Negeri 1 Cijati sebagai lembaga pendidikan kejuruan yang unggul, berkarakter, dan berprestasi, serta mampu menghasilkan lulusan yang kompeten dan berdaya saing tinggi di dunia kerja maupun dunia usaha.</p><h4>Misi</h4><ol><li>Menyelenggarakan pendidikan kejuruan yang berorientasi pada kompetensi dan kebutuhan dunia usaha/dunia industri.</li><li>Membangun karakter peserta didik yang disiplin, jujur, dan bertanggung jawab.</li><li>Meningkatkan kualitas sumber daya manusia melalui pengembangan profesionalisme guru dan tenaga kependidikan.</li><li>Mengembangkan sarana dan prasarana pembelajaran yang relevan dengan perkembangan teknologi.</li><li>Menjalin kerja sama dengan dunia usaha, dunia industri, dan instansi terkait untuk mendukung penyaluran lulusan.</li></ol>",
            ],
            [
                "kategori" => "sejarah",
                "judul"    => "Sejarah Singkat",
                "konten"   => "<p>SMK Negeri 1 Cijati didirikan sebagai wujud komitmen pemerintah dalam menyediakan akses pendidikan kejuruan bagi masyarakat di wilayah Cijati dan sekitarnya. Sejak awal berdiri, sekolah ini terus berkembang, baik dari segi jumlah kompetensi keahlian yang ditawarkan, jumlah peserta didik, maupun kualitas fasilitas pembelajaran.</p><p>Hingga saat ini, SMK Negeri 1 Cijati telah membuka beberapa konsentrasi keahlian yang relevan dengan kebutuhan dunia kerja, di antaranya Rekayasa Perangkat Lunak, Teknik Kendaraan Ringan, Agribisnis Pengolahan Hasil Pertanian, dan Bisnis Daring dan Pemasaran, serta terus berupaya meningkatkan mutu pendidikan melalui berbagai program inovatif dan kerja sama dengan berbagai pihak.</p>",
            ],
        ];

        foreach ($data as $item) {
            ProfilSekolah::updateOrCreate(
                ["kategori" => $item["kategori"]],
                $item
            );
        }
    }
}