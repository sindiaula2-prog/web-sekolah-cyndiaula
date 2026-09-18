<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Guru;

class GuruSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $dataGuru = [
            // 1
            [
                'nip'       => '197501012005011001',
                'nama_guru' => 'Nanang Suryana, SE., M.M.',
                'mapel'     => 'Guru Pemasaran',
                'foto'      => 'images/gurusmk/pa nanang 2.png',
                'deskripsi' => 'Guru Pemasaran SMK Negeri 1 Cijati.',
            ],
            // 2
            [
                'nip'       => '197602022005011002',
                'nama_guru' => 'Moch. Yoga Agung N., S.Pd., M.Pd.',
                'mapel'     => 'Guru Bahasa Sunda',
                'foto'      => 'images/gurusmk/payoga.png',
                'deskripsi' => 'Guru Bahasa Sunda SMK Negeri 1 Cijati.',
            ],
            // 3
            [
                'nip'       => '199003032015021003',
                'nama_guru' => 'Yogi Saputra',
                'mapel'     => 'Keamanan & Ketertiban Sekolah',
                'foto'      => 'images/gurusmk/payogi.png',
                'deskripsi' => 'Keamanan & Ketertiban Sekolah SMK Negeri 1 Cijati.',
            ],
            // 4
            [
                'nip'       => '198504042010011004',
                'nama_guru' => 'Tatang Rustandi',
                'mapel'     => 'Kebersihan & Keindahan Sekolah',
                'foto'      => 'images/gurusmk/tatang.png',
                'deskripsi' => 'Kebersihan & Keindahan Sekolah SMK Negeri 1 Cijati.',
            ],
            // 5
            [
                'nip'       => '198805052012011005',
                'nama_guru' => 'Indra Murgianto, S.Pd.',
                'mapel'     => 'Guru Pemasaran',
                'foto'      => 'images/gurusmk/paindra.png',
                'deskripsi' => 'Guru Pemasaran SMK Negeri 1 Cijati.',
            ],
            // 6
            [
                'nip'       => '199206062018031006',
                'nama_guru' => 'Wahyudin, S.Tr.Kom.',
                'mapel'     => 'Guru PPLG',
                'foto'      => 'images/gurusmk/pauai.png',
                'deskripsi' => 'Guru PPLG SMK Negeri 1 Cijati.',
            ],
            // 7
            [
                'nip'       => '198707072011011007',
                'nama_guru' => 'Andri Muhoir, S.T.',
                'mapel'     => 'Guru Teknik Otomotif',
                'foto'      => 'images/gurusmk/paandri.png',
                'deskripsi' => 'Guru Teknik Otomotif SMK Negeri 1 Cijati.',
            ],
            // 8
            [
                'nip'       => '198908082014021008',
                'nama_guru' => 'Bani Fudoly, S.T.',
                'mapel'     => 'Guru PPLG',
                'foto'      => 'images/gurusmk/pa bani.png',
                'deskripsi' => 'Guru PPLG SMK Negeri 1 Cijati.',
            ],
            // 9
            [
                'nip'       => '199309092019032001',
                'nama_guru' => 'Nurah Alwaini, A.Ma.Pust.',
                'mapel'     => 'Administrasi Perpustakaan',
                'foto'      => 'images/gurusmk/bunurah.png',
                'deskripsi' => 'Administrasi Perpustakaan SMK Negeri 1 Cijati.',
            ],
            // 10
            [
                'nip'       => '199110102016022002',
                'nama_guru' => 'Nopi Yanti, S.Pd.',
                'mapel'     => 'Guru Pendidikan Pancasila & Sejarah',
                'foto'      => 'images/gurusmk/bunovi.png',
                'deskripsi' => 'Guru Pendidikan Pancasila & Sejarah SMK Negeri 1 Cijati.',
            ],
            // 11
            [
                'nip'       => '198611112010012003',
                'nama_guru' => 'Nuraeni, S.Pd.',
                'mapel'     => 'Guru Matematika',
                'foto'      => 'images/gurusmk/bueni.png',
                'deskripsi' => 'Guru Matematika SMK Negeri 1 Cijati.',
            ],
            // 12
            [
                'nip'       => '198812122012012004',
                'nama_guru' => 'Eli Maryamah, S.Pd.',
                'mapel'     => 'Guru Pemasaran',
                'foto'      => 'images/gurusmk/bueli.png',
                'deskripsi' => 'Guru Pemasaran SMK Negeri 1 Cijati.',
            ],
            // 13
            [
                'nip'       => '199001152015032005',
                'nama_guru' => 'Ela Haryati, S.Pd.',
                'mapel'     => 'Guru Pendidikan Pancasila & PKK',
                'foto'      => 'images/gurusmk/buela.png',
                'deskripsi' => 'Guru Pendidikan Pancasila & PKK SMK Negeri 1 Cijati.',
            ],
            // 14
            [
                'nip'       => '198402202008012006',
                'nama_guru' => 'Edeh Kurniasih, S.Pd.',
                'mapel'     => 'Guru Bahasa Indonesia',
                'foto'      => 'images/gurusmk/buedeh.png',
                'deskripsi' => 'Guru Bahasa Indonesia SMK Negeri 1 Cijati.',
            ],
            // 15
            [
                'nip'       => '199203252019032007',
                'nama_guru' => 'Ayi Suryati, A.Ma.Pust.',
                'mapel'     => 'Administrasi Perpustakaan',
                'foto'      => 'images/gurusmk/buayis.png',
                'deskripsi' => 'Administrasi Perpustakaan SMK Negeri 1 Cijati.',
            ],
            // 16
            [
                'nip'       => '198504102009021009',
                'nama_guru' => 'Dedi Sukardi, S.Pd.',
                'mapel'     => 'Guru PJOK',
                'foto'      => 'images/gurusmk/padedi.png',
                'deskripsi' => 'Guru PJOK SMK Negeri 1 Cijati.',
            ],
            // 17
            [
                'nip'       => '199105122017031010',
                'nama_guru' => 'Jaya Nur Setiawandi, S.Pd.',
                'mapel'     => 'Guru PJOK & Bahasa Sunda',
                'foto'      => 'images/gurusmk/pajaya.png',
                'deskripsi' => 'Guru PJOK & Bahasa Sunda SMK Negeri 1 Cijati.',
            ],
            // 18
            [
                'nip'       => '199401042018021018',
                'nama_guru' => 'Indra Priatna, S.Pd.',
                'mapel'     => 'Guru Pendidikan Pancasila & Informatika',
                'foto'      => 'images/gurusmk/paindra2.png',
                'deskripsi' => 'Guru Pendidikan Pancasila & Informatika SMK Negeri 1 Cijati.',
            ],
            // 19
            [
                'nip'       => '199502052019021019',
                'nama_guru' => 'Habib Suhandar, S.Pd.',
                'mapel'     => 'Guru Pendidikan Pancasila & Sejarah',
                'foto'      => 'images/gurusmk/pahabib.png',
                'deskripsi' => 'Guru Pendidikan Pancasila & Sejarah SMK Negeri 1 Cijati.',
            ],
            // 20
            [
                'nip'       => '199603062020021020',
                'nama_guru' => 'Sima Kristina, S.Kom.',
                'mapel'     => 'Adm. Keuangan dan Publikasi',
                'foto'      => 'images/gurusmk/busima.png',
                'deskripsi' => 'Adm. Keuangan dan Publikasi SMK Negeri 1 Cijati.',
            ],
            // 21
            [
                'nip'       => '199704072021021021',
                'nama_guru' => 'Santi Mustika',
                'mapel'     => 'Laboran Pemasaran',
                'foto'      => 'images/gurusmk/busanti.png',
                'deskripsi' => 'Laboran Pemasaran SMK Negeri 1 Cijati.',
            ],
            // 22
            [
                'nip'       => '199805082022021022',
                'nama_guru' => 'Kamalia, S.E.',
                'mapel'     => 'Guru Pemasaran',
                'foto'      => 'images/gurusmk/bukamel.png',
                'deskripsi' => 'Guru Pemasaran SMK Negeri 1 Cijati.',
            ],
            // 23
            [
                'nip'       => '199906092023021023',
                'nama_guru' => 'Rahmat Setiawan, S.T.',
                'mapel'     => 'Guru PPLG',
                'foto'      => 'images/gurusmk/parahmats.png',
                'deskripsi' => 'Guru PPLG SMK Negeri 1 Cijati.',
            ],
            // 24
            [
                'nip'       => '200007102024021024',
                'nama_guru' => 'D. Jamaludin',
                'mapel'     => 'Kebersihan & Keindahan Sekolah',
                'foto'      => 'images/gurusmk/djmaludin.png',
                'deskripsi' => 'Kebersihan & Keindahan Sekolah SMK Negeri 1 Cijati.',
            ],
            // 25
            [
                'nip'       => '200108112025021025',
                'nama_guru' => 'Saripul Basar',
                'mapel'     => 'Laboran APHP',
                'foto'      => 'images/gurusmk/pabasar.png',
                'deskripsi' => 'Laboran APHP SMK Negeri 1 Cijati.',
            ],
            // 26
            [
                'nip'       => '200209122026021026',
                'nama_guru' => 'Moch. Najib',
                'mapel'     => 'Laboran PPLG',
                'foto'      => 'images/gurusmk/panajib.png',
                'deskripsi' => 'Laboran PPLG SMK Negeri 1 Cijati.',
            ],
            // 27
            [
                'nip'       => '198010152005011011',
                'nama_guru' => 'Muldiansyah, S.Pd.',
                'mapel'     => 'Dewan Guru',
                'foto'      => 'images/gurusmk/muldiansah.png',
                'deskripsi' => 'Dewan Guru SMK Negeri 1 Cijati.',
            ],
            // 28
            [
                'nip'       => '198111162006011012',
                'nama_guru' => 'Ahmad, S.Pd.I.',
                'mapel'     => 'Dewan Guru',
                'foto'      => 'images/gurusmk/paahmad.png',
                'deskripsi' => 'Dewan Guru SMK Negeri 1 Cijati.',
            ],
            // 29
            [
                'nip'       => '198212172007011013',
                'nama_guru' => 'Budi Santoso, S.Pd.',
                'mapel'     => 'Dewan Guru',
                'foto'      => 'images/gurusmk/pabudi.png',
                'deskripsi' => 'Dewan Guru SMK Negeri 1 Cijati.',
            ],
            // 30
            [
                'nip'       => '198301182008011014',
                'nama_guru' => 'Didi Supriyadi, S.Pd.',
                'mapel'     => 'Dewan Guru',
                'foto'      => 'images/gurusmk/padidi.png',
                'deskripsi' => 'Dewan Guru SMK Negeri 1 Cijati.',
            ],
            // 31
            [
                'nip'       => '198402192009011015',
                'nama_guru' => 'Empur Purkon, S.Pd.',
                'mapel'     => 'Dewan Guru',
                'foto'      => 'images/gurusmk/paempur.png',
                'deskripsi' => 'Dewan Guru SMK Negeri 1 Cijati.',
            ],
            // 32
            [
                'nip'       => '198503202010011016',
                'nama_guru' => 'Panurdiansyah, S.Pd.',
                'mapel'     => 'Dewan Guru',
                'foto'      => 'images/gurusmk/panurdiansyah.png',
                'deskripsi' => 'Dewan Guru SMK Negeri 1 Cijati.',
            ],
            // 33
            [
                'nip'       => '198604212011011017',
                'nama_guru' => 'Ramdan, S.Pd.',
                'mapel'     => 'Dewan Guru',
                'foto'      => 'images/gurusmk/paramdan.png',
                'deskripsi' => 'Dewan Guru SMK Negeri 1 Cijati.',
            ],
            // 34
            [
                'nip'       => '198705222012011018',
                'nama_guru' => 'Romi, S.Pd.',
                'mapel'     => 'Dewan Guru',
                'foto'      => 'images/gurusmk/paromi.png',
                'deskripsi' => 'Dewan Guru SMK Negeri 1 Cijati.',
            ],
            // 35
            [
                'nip'       => '198806232013011019',
                'nama_guru' => 'Sakti, S.Pd.',
                'mapel'     => 'Dewan Guru',
                'foto'      => 'images/gurusmk/pasakti.png',
                'deskripsi' => 'Dewan Guru SMK Negeri 1 Cijati.',
            ],
            // 36
            [
                'nip'       => '198907242014011020',
                'nama_guru' => 'Setiawan, S.E.',
                'mapel'     => 'Guru Pemasaran',
                'foto'      => 'images/gurusmk/pasetiawan (2).png',
                'deskripsi' => 'Guru Pemasaran SMK Negeri 1 Cijati.',
            ],
            // 37
            [
                'nip'       => '199008252015022021',
                'nama_guru' => 'Dini Andriani, S.E.',
                'mapel'     => 'Ekonomi / Administrasi',
                'foto'      => 'images/gurusmk/budini.png',
                'deskripsi' => 'Ekonomi / Administrasi SMK Negeri 1 Cijati.',
            ],
            // 38
            [
                'nip'       => '199109262016022022',
                'nama_guru' => 'Emi Resmiyati, S.Pd.',
                'mapel'     => 'Normatif / Adaptif',
                'foto'      => 'images/gurusmk/buemi.png',
                'deskripsi' => 'Normatif / Adaptif SMK Negeri 1 Cijati.',
            ],
            // 39
            [
                'nip'       => '199210272017022023',
                'nama_guru' => 'Ai Nurhasanah, S.Pd.',
                'mapel'     => 'Normatif / Adaptif',
                'foto'      => 'images/gurusmk/buai.png',
                'deskripsi' => 'Normatif / Adaptif SMK Negeri 1 Cijati.',
            ],
            // 40
            [
                'nip'       => '199311282018022024',
                'nama_guru' => 'Mega Nurunnisa, S.Pd.',
                'mapel'     => 'Matematika',
                'foto'      => 'images/gurusmk/bumega.png',
                'deskripsi' => 'Matematika SMK Negeri 1 Cijati.',
            ],
            // 41
            [
                'nip'       => '198512292010011025',
                'nama_guru' => 'Asep Muhlis, S.Pd.I.',
                'mapel'     => 'Pendidikan Agama Islam',
                'foto'      => 'images/gurusmk/paasep.png',
                'deskripsi' => 'Pendidikan Agama Islam SMK Negeri 1 Cijati.',
            ],
            // 42
            [
                'nip'       => '199401302019022026',
                'nama_guru' => 'Yayup Hindriyani, S.Pd.',
                'mapel'     => 'Normatif / Adaptif',
                'foto'      => 'images/gurusmk/buyayup.png',
                'deskripsi' => 'Normatif / Adaptif SMK Negeri 1 Cijati.',
            ],
            // 43
            [
                'nip'       => '199502102020022027',
                'nama_guru' => 'Mia Rusmiati, S.Pd.',
                'mapel'     => 'Normatif / Adaptif',
                'foto'      => 'images/gurusmk/bumia.png',
                'deskripsi' => 'Normatif / Adaptif SMK Negeri 1 Cijati.',
            ],
            // 44
            [
                'nip'       => '199603152021021028',
                'nama_guru' => 'Isnan Wiranursyeha, S.Pd.',
                'mapel'     => 'Normatif / Adaptif',
                'foto'      => 'images/gurusmk/pawira.png',
                'deskripsi' => 'Normatif / Adaptif SMK Negeri 1 Cijati.',
            ],
            // 45
            [
                'nip'       => '198904202015011029',
                'nama_guru' => 'Jajang Ridwan, S.T.',
                'mapel'     => 'Guru Teknik Otomotif',
                'foto'      => 'images/gurusmk/pajajang.png',
                'deskripsi' => 'Guru Teknik Otomotif SMK Negeri 1 Cijati.',
            ],
        ];

        foreach ($dataGuru as $guru) {
            Guru::updateOrCreate(
                ['nip' => $guru['nip']], 
                $guru
            );
        }
    }
}