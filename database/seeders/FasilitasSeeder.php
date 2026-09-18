<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fasilitas;

class FasilitasSeeder extends Seeder
{
    public function run(): void
    {
        $dataFasilitas = [
            [
                "nama_fasilitas" => "Gerbang Sekolah",
                "foto"           => "images/jurusan/fasilitas/gerbangsekolah.jpeg",
                "deskripsi"      => "Gerbang utama pintu masuk dan pengamanan lingkungan SMK Negeri 1 Cijati.",
            ],
            [
                "nama_fasilitas" => "Lapangan Utama",
                "foto"           => "images/jurusan/fasilitas/lapangsmk2.jpeg",
                "deskripsi"      => "Area terbuka yang luas untuk kegiatan olahraga, ekstrakurikuler, dan upacara bendera.",
            ],
            [
                "nama_fasilitas" => "Laboratorium APHP",
                "foto"           => "images/jurusan/fasilitas/leb-aphp.JPG",
                "deskripsi"      => "Laboratorium Analisis Pangan dan Hasil Pertanian atau disingkat Lab APHP merupakan salah satu laboratorium yang berada di lingkungan Jurusan Teknologi Hasil Pertanian.",
            ],
            [
                "nama_fasilitas" => "Lab BDP (Pemasaran)",
                "foto"           => "images/jurusan/fasilitas/lebbdp2.jpeg",
                "deskripsi"      => "Ruang praktik penunjang kompetensi keahlian Bisnis Daring dan Pemasaran.",
            ],
            [
                "nama_fasilitas" => "Laboratorium PPLG (Pengembangan Perangkat Lunak dan GIM)",
                "foto"           => "images/jurusan/fasilitas/lebrpl1.JPG",
                "deskripsi"      => "Laboratorium komputer lengkap dengan spesifikasi tinggi untuk praktikum pemrograman dan desain.",
            ],
            [
                "nama_fasilitas" => "Laboratorium Teknik Otomotif / TKR",
                "foto"           => "images/jurusan/fasilitas/lebtkr.JPG",
                "deskripsi"      => "Bengkel dan ruang praktik teknik kendaraan ringan serta otomotif yang lengkap.",
            ],
            [
                "nama_fasilitas" => "Mushola / Masjid Sekolah",
                "foto"           => "images/jurusan/fasilitas/musolasmk.jpeg",
                "deskripsi"      => "Tempat beribadah, kajian rohani, dan kegiatan keagamaan siswa/i.",
            ],
            [
                "nama_fasilitas" => "Bimbingan Konseling (BK)",
                "foto"           => "images/jurusan/fasilitas/bk.jpeg",
                "deskripsi"      => "Adalah proses interaksi antara konselor dengan konseli baik secara langsung maupun tidak langsung dalam rangka untuk membantu konseli agar dapat mengembangkan potensi dirinya.",
            ],
            [
                "nama_fasilitas" => "Ruang Praktik Tambahan TKR",
                "foto"           => "images/jurusan/fasilitas/rpstkr2.jpeg",
                "deskripsi"      => "Fasilitas pendukung praktik kompetensi keahlian Teknik Kendaraan Ringan.",
            ],
            [
                "nama_fasilitas" => "Ruang Guru",
                "foto"           => "images/jurusan/fasilitas/ruangguru.jpeg",
                "deskripsi"      => "Ruang kerja dewan guru dan tenaga kependidikan SMK Negeri 1 Cijati.",
            ],
            [
                "nama_fasilitas" => "Ruang Koordinasi Guru",
                "foto"           => "images/jurusan/fasilitas/ruangguru2.jpeg",
                "deskripsi"      => "Ruang penunjang aktivitas guru dan koordinasi antar bidang studi.",
            ],
            [
                "nama_fasilitas" => "Ruang UKS (Usaha Kesehatan Sekolah)",
                "foto"           => "images/jurusan/fasilitas/uks1.jpeg",
                "deskripsi"      => "Fasilitas pelayanan kesehatan darurat bagi warga sekolah SMK Negeri 1 Cijati.",
            ],
            [
                "nama_fasilitas" => "Perpustakaan",
                "foto"           => "images/jurusan/fasilitas/perpustakaan.jpeg",
                "deskripsi"      => "Lembaga atau tempat yang menyediakan koleksi bahan bacaan untuk menunjang kegiatan belajar siswa.",
            ],
            [
                "nama_fasilitas" => "Wc Sekolah",
                "foto"           => "images/jurusan/fasilitas/wcsmk.jpeg",
                "deskripsi"      => "Tempat berupa lubang pembuangan (closet) yang dipakai untuk buang air besar/kecil bagi warga sekolah.",
            ],
        ];

        foreach ($dataFasilitas as $fasilitas) {
            Fasilitas::updateOrCreate(
                ["nama_fasilitas" => $fasilitas["nama_fasilitas"]],
                $fasilitas
            );
        }
    }
}