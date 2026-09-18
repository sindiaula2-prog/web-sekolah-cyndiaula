@extends('layouts.app')

@section('title', 'Profil Sekolah - SMK Negeri 1 Cijati')

@section('styles')
<style>
    :root {
        --navy: #0B2545;
        --blue-deep: #123B72;
        --blue: #1E5CA8;
        --cyan: #00A8B5;
        --gold: #D9A441;
        --paper: #F4F8FA;
        --ink: #14243A;
        --ink-soft: #4C5B70;
        --line: #E1E9EF;
    }

    .profil-hero {
        position: relative;
        background: linear-gradient(rgba(11, 37, 69, 0.8), rgba(11, 37, 69, 0.9)),
                    url("{{ file_exists(public_path('images/sekolah/sekolah.jpg.png')) ? asset('images/sekolah/sekolah.jpg.png') : asset('images/image_c6c626.png') }}") center/cover no-repeat;
        background-size: 115%;
        padding: 95px 20px 75px 20px;
        text-align: center;
        color: #ffffff;
        overflow: hidden;
        animation: heroDriftProfil 22s ease-in-out infinite alternate;
    }

    @keyframes heroDriftProfil {
        0%   { background-position: 45% 35%; }
        100% { background-position: 55% 65%; }
    }

    .profil-hero-box {
        max-width: 800px;
        margin: 0 auto;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 20px;
        padding: 40px 30px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.2);
    }
    .profil-breadcrumb { font-size: 0.95rem; color: #DCE6F2; margin-bottom: 12px; font-weight: 500; }
    .profil-title { font-size: 3rem; font-weight: 800; margin-bottom: 14px; letter-spacing: 0.5px; }
    .profil-subtitle { font-size: 1.12rem; color: #D6E1F0; line-height: 1.6; max-width: 680px; margin: 0 auto; }

    .profil-layout {
        max-width: 900px;
        margin: 50px auto;
        padding: 0 24px;
    }
    .profil-content-card {
        background: #ffffff;
        border-radius: 16px;
        border: 1px solid var(--line);
        box-shadow: 0 8px 25px rgba(0,0,0,0.04);
        padding: 45px;
        margin-bottom: 30px;
        transition:
            transform .35s ease,
            box-shadow .35s ease;

        /* --- SCROLL REVEAL (state awal) --- */
        opacity: 0;
        transform: translateY(40px);
    }

    .profil-content-card.is-visible {
        opacity: 1;
        transform: translateY(0);
        transition:
            opacity .7s ease,
            transform .7s cubic-bezier(0.22, 1, 0.36, 1);
    }

    .profil-content-card:hover {
        box-shadow: 0 16px 38px rgba(11,37,69,0.09);
    }

    .content-section-title { font-size: 1.8rem; font-weight: 800; color: var(--navy); margin-bottom: 10px; }
    .content-divider { width: 60px; height: 3.5px; background: var(--cyan); margin-bottom: 26px; border-radius: 2px; transition: width .4s ease; }
    .profil-content-card:hover .content-divider { width: 90px; }
    .prose-text { color: var(--ink-soft); font-size: 1.08rem; line-height: 1.85; margin-bottom: 22px; text-align: justify; }
    .prose-text ul { padding-left: 20px; margin-top: 10px; }
    .prose-text li { margin-bottom: 10px; }

    @media (max-width: 992px) {
        .profil-title { font-size: 2.3rem; }
        .profil-content-card { padding: 25px; }
    }

    /* Hormati pengguna reduce motion */
    @media (prefers-reduced-motion: reduce) {
        .profil-hero {
            animation: none !important;
        }
        .profil-content-card {
            opacity: 1 !important;
            transform: none !important;
            transition: none !important;
        }
    }
</style>
@endsection

@section('content')
<div class="profil-hero">
    <div class="profil-hero-box">
        <div class="profil-breadcrumb">Beranda &nbsp;/&nbsp; Profil Sekolah</div>
        <h1 class="profil-title">Profil Sekolah</h1>
        <p class="profil-subtitle">Mengenal lebih dekat sejarah, visi misi, hingga profil lengkap SMK Negeri 1 Cijati.</p>
    </div>
</div>

<div class="profil-layout">
    <div class="profil-content-card" data-reveal>
        <h2 class="content-section-title">Tentang SMK Negeri 1 Cijati</h2>
        <div class="content-divider"></div>
        <div class="prose-text">
            @if(isset($profil) && !empty($profil->tentang))
                {!! $profil->tentang !!}
            @else
                <p>SMK Negeri 1 Cijati merupakan lembaga pendidikan kejuruan negeri yang berlokasi di Kecamatan Cijati, Kabupaten Cianjur. Sekolah ini didirikan atas dasar keinginan kuat untuk memberikan pemerataan pendidikan menengah kejuruan di daerah terpencil serta dukungan penuh dari masyarakat sekitar.</p>
                <p>Resmi berdiri sejak tanggal 19 September 2006 berdasarkan SK Bupati Kabupaten Cianjur Nomor: 421.5/Kep.179-Ks/2006, SMK Negeri 1 Cijati terus berkembang pesat dalam kuantitas maupun kualitas untuk mencetak lulusan yang kompeten, berkarakter, serta siap berdaya saing di dunia kerja.</p>
            @endif
        </div>
    </div>

    <div class="profil-content-card" data-reveal style="transition-delay: .12s;">
        <h2 class="content-section-title">Visi & Misi</h2>
        <div class="content-divider"></div>
        <div class="prose-text">
            @if(isset($profil) && !empty($profil->visi_misi))
                {!! $profil->visi_misi !!}
            @else
                <h3 style="color: var(--navy); font-size: 1.15rem; font-weight: 700; margin-bottom: 8px;">Visi:</h3>
                <p style="font-style: italic; margin-bottom: 20px; font-weight: 500;">"Terwujudnya lulusan KEREN dan BERSINERGI melalui pembelajaran mendalam, penguatan karakter Pancawaluya, serta kolaborasi aktif dengan dunia kerja dan industri."</p>

                <h3 style="color: var(--navy); font-size: 1.15rem; font-weight: 700; margin-bottom: 8px;">Misi:</h3>
                <ul>
                    <li>Menyelenggarakan pembelajaran mendalam yang berpusat pada peserta didik untuk mengembangkan kompetensi secara optimal.</li>
                    <li>Menumbuhkan karakter religius, energik, dan nasionalis dalam kehidupan sehari-hari melalui penguatan nilai-nilai Pancawaluya.</li>
                    <li>Mengembangkan lulusan yang kompeten dan berdaya saing sesuai dengan kebutuhan dunia kerja dan perkembangan zaman.</li>
                    <li>Menanamkan jiwa kewirausahaan (entrepreneurship) melalui kegiatan pembelajaran dan praktik nyata.</li>
                    <li>Menumbuhkan integritas, etos kerja, dan tanggung jawab melalui pembiasaan, keteladanan, dan budaya sekolah yang positif.</li>
                </ul>
            @endif
        </div>
    </div>

    <div class="profil-content-card" data-reveal style="transition-delay: .24s;">
        <h2 class="content-section-title">Sejarah Singkat</h2>
        <div class="content-divider"></div>
        <div class="prose-text">
            @if(isset($profil) && !empty($profil->sejarah))
                {!! $profil->sejarah !!}
            @else
                <p>Berawal dari prakarsa seorang pendidik bernama <strong>H. Dede Kartiman</strong> bersama dukungan masyarakat Kecamatan Cijati yang menginginkan adanya jenjang pendidikan kejuruan di wilayahnya. Bekerja sama dengan Dinas Pendidikan Kabupaten Cianjur, permohonan pendirian sekolah diajukan kepada Bupati Cianjur.</p>
                <p>Pada awal berdirinya, sekolah ini merupakan kelas jauh dari <strong>SMK Negeri 2 Cilaku</strong> dengan membuka program keahlian Teknologi Pengolahan Hasil Pertanian (TPHP) di atas lahan seluas 1 hektar yang merupakan hibah dari masyarakat Cijati. Hingga akhirnya resmi berdiri pada <strong>19 September 2006</strong>.</p>
                <p>Seiring waktu, dibuka program keahlian baru meliputi Pemasaran (BDP) dan Rekayasa Perangkat Lunak (RPL) pada tahun 2007, serta Teknik Kendaraan Ringan (TKR) pada Juli 2013.</p>

                <h3 style="color: var(--navy); font-size: 1.15rem; font-weight: 700; margin: 20px 0 10px 0;">Kepemimpinan Kepala Sekolah:</h3>
                <ul style="list-style-type: disc;">
                    <li><strong>2006 – 2008:</strong> Dipimpin oleh Bapak H. Dede Kartiman, S.Pd, M.M.Pd</li>
                    <li><strong>2008 – 2011:</strong> Dipimpin oleh Bapak H. Udin Syarifudin, S.Pd, M.M.Pd</li>
                    <li><strong>2011 – 2014:</strong> Dipimpin oleh Bapak Iwan Gunawan, SE</li>
                    <li><strong>2014 – Sekarang:</strong> Dipimpin oleh Bapak Mirafuddin, S.Pt, M.M.Pd</li>
                </ul>
            @endif
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var reveals = document.querySelectorAll('[data-reveal]');

    if (!('IntersectionObserver' in window)) {
        reveals.forEach(function (el) {
            el.classList.add('is-visible');
        });
        return;
    }

    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.12,
        rootMargin: '0px 0px -40px 0px'
    });

    reveals.forEach(function (el) {
        observer.observe(el);
    });
});
</script>
@endsection