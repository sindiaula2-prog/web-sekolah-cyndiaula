<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Menjalankan database seeder.
     */
    public function run(): void
    {
        $data = [

            // =====================================================
            // PPLG / RPL
            // =====================================================
            [
                'kode' => 'pplg',
                'nama_jurusan' => 'Pengembangan Perangkat Lunak dan Gim',

                'deskripsi' => 'PPLG merupakan konsentrasi keahlian yang memfokuskan pembelajaran pada pengembangan perangkat lunak secara profesional, mulai dari analisis kebutuhan sistem, coding, pengujian aplikasi, hingga implementasi teknologi digital terkini.',

                'singkatan' => 'PPLG',

                'logo' => 'images/jurusan/logojurusan/logo-pplg.jpeg',

                'kompetensi' => [
                    'Pemrograman Dasar dan Lanjutan',
                    'Pemrograman Web (HTML, CSS, JavaScript, PHP, Laravel)',
                    'Pengembangan Aplikasi Mobile',
                    'Perancangan dan Pengelolaan Basis Data (MySQL)',
                    'Pemrograman Berorientasi Objek (OOP)',
                    'UI/UX Design',
                    'Pengujian dan Keamanan Perangkat Lunak',
                ],

                'prospek_karir' => [
                    'Programmer',
                    'Web Developer',
                    'Mobile Developer',
                    'Database Administrator',
                    'Software Tester / QA',
                    'UI/UX Designer',
                    'Wirausaha di Bidang IT',
                ],

                'kaprodi_nama' => 'Rahmat Setiawan',
                'kaprodi_gelar' => 'S.T.',
                'kaprodi_foto' => 'images/gurusmk/parahmats.png',
            ],


            // =====================================================
            // TKR
            // =====================================================
            [
                'kode' => 'tkr',
                'nama_jurusan' => 'Teknik Kendaraan Ringan',

                'deskripsi' => 'Teknik Kendaraan Ringan (TKR) merupakan konsentrasi keahlian yang memfokuskan pembelajaran pada bidang otomotif mobil, mencakup penguasaan sistem kelistrikan, perawatan mesin injeksi, sistem pemindahan tenaga, hingga teknik diagnosis menggunakan alat scanner modern.',

                'singkatan' => 'TKRO',

                'logo' => 'images/jurusan/logojurusan/logo-tkr.jpeg',

                'kompetensi' => [
                    'Pemeliharaan Mesin Kendaraan Ringan (PMKR) dan Sistem Injeksi (EFI)',
                    'Pemeliharaan Sasis, Transmisi, Kemudi, Suspensi, dan Rem (ABS)',
                    'Pemeliharaan Kelistrikan, Pengisian, Pengapian, dan AC Mobil',
                    'Penggunaan Teknologi Diagnostik Modern (Scanner OBD)',
                    'Troubleshooting Mesin dan Kelistrikan',
                    'Perawatan Berkala (Tune-up dan Ganti Oli)',
                ],

                'prospek_karir' => [
                    'Teknisi / Mekanik Bengkel Mobil',
                    'Teknisi Spesialis Kelistrikan / AC',
                    'Service Advisor',
                    'Operator Pabrik Otomotif',
                    'Inspector Kendaraan Bekas',
                    'Wirausaha Bengkel Mandiri',
                ],

                'kaprodi_nama' => 'Romi Darmayadi',
                'kaprodi_gelar' => 'S.Pd.',
                'kaprodi_foto' => 'images/gurusmk/paromi.png',
            ],


            // =====================================================
            // BD / PEMASARAN
            // =====================================================
            [
                'kode' => 'bd',
                'nama_jurusan' => 'Pemasaran',

                'deskripsi' => 'Pemasaran merupakan konsentrasi keahlian yang memfokuskan pembelajaran pada strategi bisnis modern, pengelolaan ritel digital, teknik komunikasi bisnis, pemanfaatan e-commerce, hingga seni bernegosiasi yang adaptif terhadap era digital.',

                'singkatan' => 'BD',

                'logo' => 'images/jurusan/logojurusan/logo-pemasaran.jpeg',

                'kompetensi' => [
                    'Pemasaran Digital (SEO, Social Media, Content Marketing)',
                    'Pengelolaan E-Commerce dan Marketplace',
                    'Branding dan Visual Merchandising',
                    'Manajemen Bisnis Ritel Modern',
                    'Teknik Negosiasi dan Komunikasi Bisnis',
                    'Customer Relationship Management',
                ],

                'prospek_karir' => [
                    'Digital Marketer',
                    'Content Creator',
                    'E-Commerce Specialist',
                    'Staff Marketing Communications',
                    'Store Supervisor',
                    'Customer Relation Officer',
                    'Wirausaha Digital',
                ],

                'kaprodi_nama' => 'Indra',
                'kaprodi_gelar' => '',
                'kaprodi_foto' => 'images/gurusmk/paindra.png',
            ],


            // =====================================================
            // APHP
            // =====================================================
            [
                'kode' => 'aphp',
                'nama_jurusan' => 'Agribisnis Pengolahan Hasil Pertanian',

                'deskripsi' => 'Agribisnis Pengolahan Hasil Pertanian (APHP) merupakan konsentrasi keahlian yang memfokuskan pembelajaran pada teknik pengolahan, pengawetan, pengendalian mutu, dan pengemasan komoditas hasil pertanian menjadi produk bernilai jual tinggi.',

                'singkatan' => 'APHP',

                'logo' => 'images/jurusan/logojurusan/logo-aphp.jpeg',

                'kompetensi' => [
                    'Dasar Pengendalian Mutu dan Keamanan Pangan (HACCP)',
                    'Pengolahan Hasil Cereal, Kacang-kacangan, dan Umbi-umbian',
                    'Pengolahan Hasil Buah dan Sayuran (Nabati)',
                    'Pengolahan Hasil Ternak dan Perikanan (Hewani)',
                    'Teknik Pengemasan, Labeling, dan Penyimpanan',
                    'Pengujian Mutu Organoleptik dan Mikrobiologi Sederhana',
                ],

                'prospek_karir' => [
                    'Quality Control / QA Industri Pangan',
                    'Teknisi Lab Pengujian Mutu',
                    'Operator Produksi F&B',
                    'Staff R&D Produk Olahan Pangan',
                    'Wirausaha Agroindustri dan Kuliner',
                ],

                'kaprodi_nama' => 'Budiana Hermawan',
                'kaprodi_gelar' => 'S.Tp',
                'kaprodi_foto' => 'images/gurusmk/pabudi.png',
            ],
        ];


        // =========================================================
        // SIMPAN / UPDATE DATA
        // =========================================================

        foreach ($data as $item) {

            Jurusan::updateOrCreate(
                [
                    'kode' => $item['kode']
                ],
                $item
            );
        }
    }
}