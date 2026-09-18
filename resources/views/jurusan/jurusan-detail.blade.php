@extends('layouts.app')

@section('title', ($jurusan->nama_jurusan ?? 'Detail Jurusan') . ' - SMK Negeri 1 Cijati')

@section('styles')

<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

    :root {
        --primary: #0B2545;
        --primary-light: #123B72;
        --blue: #1E5CA8;
        --accent: #00A8B5;
        --accent-light: #E6F8FA;

        --bg: #EEF5FB;
        --white: #FFFFFF;

        --text: #0B2545;
        --muted: #64748B;

        --shadow: 0 15px 35px rgba(11, 37, 69, .09);
    }


    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }


    body {
        font-family:
            'Segoe UI',
            Tahoma,
            Geneva,
            Verdana,
            sans-serif;

        background:
            linear-gradient(
                180deg,
                #EEF5FB 0%,
                #F8FBFE 55%,
                #EEF5FB 100%
            );

        color: var(--text);
    }


    /* =========================================================
       BREADCRUMB
    ========================================================= */

    .detail-breadcrumb {
        max-width: 1000px;

        margin: 0 auto;

        padding: 20px 20px 12px;

        font-size: .86rem;

        color: var(--muted);
    }


    .detail-breadcrumb a {
        color: var(--accent);

        text-decoration: none;

        font-weight: 700;
    }


    .detail-breadcrumb a:hover {
        color: var(--primary);
    }


    /* =========================================================
       HERO
    ========================================================= */

    .jurusan-hero {
        position: relative;

        width: 100%;

        min-height: 350px;

        display: flex;

        align-items: center;

        justify-content: center;

        padding: 55px 20px 90px;

        overflow: hidden;

        background:
            linear-gradient(
                135deg,
                rgba(11,37,69,.97),
                rgba(18,59,114,.94),
                rgba(0,168,181,.80)
            ),
            url('{{ asset("images/sekolah/poto.sekolah.jpeg") }}')
            center / cover no-repeat;

        border-radius:
            0 0 36px 36px;

        box-shadow:
            0 18px 40px rgba(11,37,69,.18);
    }


    /* lingkaran dekorasi */

    .hero-circle-one {
        position: absolute;

        width: 420px;
        height: 420px;

        right: -180px;
        top: -210px;

        border:
            1px solid rgba(255,255,255,.16);

        border-radius: 50%;
    }


    .hero-circle-two {
        position: absolute;

        width: 300px;
        height: 300px;

        left: -150px;
        bottom: -190px;

        border:
            1px solid rgba(255,255,255,.13);

        border-radius: 50%;
    }


    .hero-content {
        position: relative;

        z-index: 5;

        width: 100%;
        max-width: 650px;

        padding: 32px 35px;

        text-align: center;

        color: white;

        background:
            rgba(255,255,255,.11);

        border:
            1px solid rgba(255,255,255,.20);

        border-radius: 28px;

        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);

        box-shadow:
            0 25px 55px rgba(0,0,0,.20);
    }


    .hero-logo {
        width: 100px;
        height: 100px;

        object-fit: contain;

        padding: 9px;

        background: white;

        border-radius: 24px;

        margin-bottom: 15px;

        box-shadow:
            0 12px 28px rgba(0,0,0,.22);
    }


    .hero-content h1 {
        font-size: clamp(1.5rem, 3vw, 2.15rem);

        font-weight: 800;

        margin-bottom: 8px;

        line-height: 1.3;
    }


    .hero-content p {
        margin: 0;

        color: #E5F8FF;

        font-size: .94rem;

        font-weight: 500;
    }


    .hero-label {
        display: inline-flex;

        align-items: center;

        gap: 7px;

        padding: 7px 14px;

        margin-bottom: 12px;

        border-radius: 30px;

        background:
            rgba(255,255,255,.15);

        border:
            1px solid rgba(255,255,255,.18);

        font-size: .72rem;

        font-weight: 800;

        letter-spacing: .5px;
    }


    /* =========================================================
       KONTEN
    ========================================================= */

    .jurusan-wrapper {
        max-width: 1000px;

        margin: -55px auto 0;

        padding:
            0 20px 70px;

        position: relative;

        z-index: 10;
    }


    /* =========================================================
       CARD PROFIL
    ========================================================= */

    .profil-card {
        position: relative;

        background: white;

        padding: 42px;

        border-radius: 27px;

        margin-bottom: 30px;

        box-shadow: var(--shadow);

        border:
            1px solid rgba(30,92,168,.09);

        overflow: hidden;
    }


    .profil-card::before {
        content: "";

        position: absolute;

        left: 0;
        top: 0;
        bottom: 0;

        width: 5px;

        background:
            linear-gradient(
                180deg,
                var(--primary),
                var(--accent)
            );
    }


    .section-title {
        text-align: center;

        margin-bottom: 25px;
    }


    .section-title .icon {
        width: 44px;
        height: 44px;

        display: flex;

        align-items: center;
        justify-content: center;

        margin: 0 auto 10px;

        border-radius: 14px;

        color: white;

        background:
            linear-gradient(
                135deg,
                var(--primary),
                var(--blue)
            );

        box-shadow:
            0 8px 18px rgba(11,37,69,.17);
    }


    .section-title h2 {
        font-size: 1.35rem;

        font-weight: 800;

        color: var(--primary);

        margin-bottom: 10px;
    }


    .section-title .line {
        width: 55px;
        height: 4px;

        margin: auto;

        border-radius: 10px;

        background:
            linear-gradient(
                90deg,
                var(--primary),
                var(--accent)
            );
    }


    .profil-card p {
        color: var(--muted);

        line-height: 1.85;

        font-size: .97rem;

        text-align: justify;

        margin-bottom: 18px;
    }


    .profil-card p:last-child {
        margin-bottom: 0;
    }


    /* =========================================================
       KOMPETENSI & KARIR
    ========================================================= */

    .info-grid {
        display: grid;

        grid-template-columns:
            repeat(2, 1fr);

        gap: 28px;

        margin-bottom: 40px;
    }


    .info-card {
        position: relative;

        background: white;

        padding: 32px;

        border-radius: 25px;

        border:
            1px solid rgba(30,92,168,.08);

        box-shadow:
            0 12px 30px rgba(11,37,69,.07);

        overflow: hidden;
    }


    .info-card::before {
        content: "";

        position: absolute;

        top: 0;
        left: 0;
        right: 0;

        height: 4px;

        background:
            linear-gradient(
                90deg,
                var(--primary),
                var(--accent)
            );
    }


    .info-header {
        display: flex;

        align-items: center;

        gap: 13px;

        margin-bottom: 20px;
    }


    .info-icon {
        flex-shrink: 0;

        width: 43px;
        height: 43px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 13px;

        background: var(--accent-light);

        color: var(--accent);

        font-size: 17px;
    }


    .info-card h3 {
        font-size: 1.12rem;

        font-weight: 800;

        color: var(--primary);
    }


    .info-card ul {
        list-style: none;

        padding: 0;
    }


    .info-card li {
        position: relative;

        padding-left: 28px;

        margin-bottom: 12px;

        color: var(--muted);

        font-size: .93rem;

        line-height: 1.6;
    }


    .info-card li::before {
        content: "✓";

        position: absolute;

        left: 0;

        top: 1px;

        width: 20px;
        height: 20px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 50%;

        background: var(--accent-light);

        color: var(--accent);

        font-size: .72rem;

        font-weight: 900;
    }


    /* =========================================================
       KEPALA KONSENTRASI
    ========================================================= */

    .kaprodi-section {
        position: relative;

        text-align: center;

        margin:
            45px 0 40px;

        padding:
            42px 25px 50px;

        border-radius: 30px;

        background:
            linear-gradient(
                135deg,
                #F8FCFF,
                #EDF6FF 55%,
                #E8F8FA
            );

        border:
            1px solid rgba(30,92,168,.10);

        box-shadow:
            0 16px 38px rgba(11,37,69,.07);

        overflow: hidden;
    }


    .kaprodi-decoration-one {
        position: absolute;

        width: 280px;
        height: 280px;

        right: -140px;
        top: -150px;

        border-radius: 50%;

        background:
            radial-gradient(
                circle,
                rgba(0,168,181,.16),
                transparent 68%
            );
    }


    .kaprodi-decoration-two {
        position: absolute;

        width: 230px;
        height: 230px;

        left: -120px;
        bottom: -140px;

        border-radius: 50%;

        background:
            radial-gradient(
                circle,
                rgba(18,59,114,.13),
                transparent 68%
            );
    }


    .kaprodi-heading {
        position: relative;

        z-index: 3;

        margin-bottom: 28px;
    }


    .kaprodi-label {
        display: inline-flex;

        align-items: center;

        gap: 7px;

        padding: 8px 14px;

        margin-bottom: 11px;

        border-radius: 30px;

        color: var(--accent);

        background:
            rgba(0,168,181,.10);

        font-size: .72rem;

        font-weight: 800;

        letter-spacing: .5px;
    }


    .kaprodi-heading h2 {
        font-size: 1.5rem;

        font-weight: 800;

        color: var(--primary);
    }


    .kaprodi-heading h2::after {
        content: "";

        display: block;

        width: 55px;
        height: 4px;

        margin:
            12px auto 0;

        border-radius: 10px;

        background:
            linear-gradient(
                90deg,
                var(--primary),
                var(--accent)
            );
    }


    /* =========================================================
       CARD FOTO KAPRODI
    ========================================================= */

    .kaprodi-card {
        position: relative;

        z-index: 4;

        width: 100%;

        max-width: 390px;

        margin: auto;

        padding:
            16px 16px 28px;

        background: white;

        border-radius: 30px;

        border:
            1px solid rgba(30,92,168,.10);

        box-shadow:
            0 22px 50px rgba(11,37,69,.15);

        overflow: hidden;

        transition:
            transform .3s ease,
            box-shadow .3s ease;
    }


    .kaprodi-card:hover {
        transform: translateY(-8px);

        box-shadow:
            0 30px 60px rgba(11,37,69,.19);
    }


    .kaprodi-card::before {
        content: "";

        position: absolute;

        top: 0;
        left: 0;
        right: 0;

        height: 6px;

        background:
            linear-gradient(
                90deg,
                var(--primary),
                var(--accent)
            );
    }


    /* =========================================================
       FRAME FOTO
    ========================================================= */

    .kaprodi-photo {
        position: relative;

        width: 100%;

        height: 365px;

        margin-bottom: 20px;

        overflow: hidden;

        border-radius: 24px;

        background:
            linear-gradient(
                145deg,
                #DCEBFA,
                #ECF9FA
            );

        border:
            1px solid #DFEAF3;

        box-shadow:
            inset 0 0 0 7px rgba(255,255,255,.78),
            0 10px 25px rgba(11,37,69,.09);
    }


    .kaprodi-photo::before {
        content: "";

        position: absolute;

        width: 190px;
        height: 190px;

        right: -80px;
        top: -90px;

        border-radius: 50%;

        background:
            rgba(0,168,181,.13);

        z-index: 1;
    }


    .kaprodi-photo::after {
        content: "";

        position: absolute;

        width: 140px;
        height: 140px;

        left: -70px;
        bottom: -70px;

        border-radius: 50%;

        background:
            rgba(18,59,114,.12);

        z-index: 1;
    }


    .kaprodi-photo img {
        position: relative;

        z-index: 2;

        display: block;

        width: 100%;
        height: 100%;

        object-fit: cover;

        object-position: center top;

        transition:
            transform .45s ease;
    }


    .kaprodi-card:hover
    .kaprodi-photo img {
        transform: scale(1.035);
    }


    /* =========================================================
       BADGE JURUSAN
    ========================================================= */

    .kaprodi-badge {
        position: absolute;

        z-index: 5;

        left: 18px;
        bottom: 18px;

        display: inline-flex;

        align-items: center;

        gap: 7px;

        padding:
            8px 15px;

        border-radius: 30px;

        color: white;

        background:
            linear-gradient(
                135deg,
                rgba(11,37,69,.95),
                rgba(18,59,114,.94)
            );

        font-size: .76rem;

        font-weight: 800;

        box-shadow:
            0 8px 18px rgba(11,37,69,.25);

        backdrop-filter: blur(8px);
    }


    .kaprodi-name {
        color: var(--primary);

        font-size: 1.2rem;

        font-weight: 800;

        line-height: 1.45;

        margin-bottom: 8px;
    }


    .kaprodi-role {
        display: inline-flex;

        align-items: center;

        gap: 7px;

        padding:
            8px 14px;

        border-radius: 30px;

        color: var(--accent);

        background: #EFFBFC;

        font-size: .84rem;

        font-weight: 700;
    }


    /* =========================================================
       NAVIGASI JURUSAN
    ========================================================= */

    .jurusan-navigation {
        position: relative;

        margin-top: 40px;

        padding:
            28px 24px 32px;

        background:
            linear-gradient(
                145deg,
                #FFFFFF,
                #F3F8FC
            );

        border:
            1px solid rgba(30,92,168,.10);

        border-radius: 27px;

        box-shadow:
            0 15px 35px rgba(11,37,69,.08);

        text-align: center;

        overflow: hidden;
    }


    .jurusan-navigation::before {
        content: "";

        position: absolute;

        top: 0;
        left: 12%;
        right: 12%;

        height: 4px;

        border-radius:
            0 0 10px 10px;

        background:
            linear-gradient(
                90deg,
                var(--primary),
                var(--accent)
            );
    }


    .nav-icon {
        width: 43px;
        height: 43px;

        display: flex;

        align-items: center;
        justify-content: center;

        margin:
            0 auto 10px;

        border-radius: 13px;

        color: white;

        background:
            linear-gradient(
                135deg,
                var(--primary),
                var(--blue)
            );

        box-shadow:
            0 8px 18px rgba(11,37,69,.18);
    }


    .jurusan-navigation h3 {
        color: var(--primary);

        font-size: 1.05rem;

        font-weight: 800;

        margin-bottom: 5px;
    }


    .jurusan-navigation p {
        color: var(--muted);

        font-size: .82rem;

        margin-bottom: 20px;
    }


    .nav-jurusan {
        display: flex;

        justify-content: center;

        align-items: center;

        gap: 10px;

        flex-wrap: wrap;
    }


    .nav-jurusan a {
        min-width: 80px;

        padding:
            11px 17px;

        border-radius: 14px;

        background: white;

        border:
            1px solid #E3EBF2;

        color: var(--muted);

        text-decoration: none;

        font-size: .85rem;

        font-weight: 800;

        box-shadow:
            0 5px 14px rgba(11,37,69,.06);

        transition:
            .25s ease;
    }


    .nav-jurusan a:hover {
        color: var(--primary);

        transform:
            translateY(-4px);

        background:
            var(--accent-light);

        border-color:
            rgba(0,168,181,.25);

        box-shadow:
            0 10px 22px rgba(11,37,69,.10);
    }


    .nav-jurusan a.active {
        color: white;

        background:
            linear-gradient(
                135deg,
                var(--primary),
                var(--primary-light)
            );

        border-color: transparent;

        transform:
            translateY(-3px);

        box-shadow:
            0 10px 23px rgba(11,37,69,.23);
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 768px) {

        .jurusan-hero {
            min-height: 310px;

            padding:
                40px 15px 75px;

            border-radius:
                0 0 28px 28px;
        }


        .hero-content {
            padding: 25px 20px;

            border-radius: 23px;
        }


        .hero-logo {
            width: 80px;
            height: 80px;
        }


        .jurusan-wrapper {
            margin-top: -40px;

            padding-left: 15px;
            padding-right: 15px;
        }


        .profil-card {
            padding: 32px 24px;
        }


        .info-grid {
            grid-template-columns: 1fr;

            gap: 20px;
        }


        .info-card {
            padding: 27px 23px;
        }


        .kaprodi-section {
            padding:
                35px 16px 40px;

            border-radius: 25px;
        }


        .kaprodi-card {
            max-width: 345px;
        }


        .kaprodi-photo {
            height: 330px;
        }

    }


    @media (max-width: 480px) {

        .detail-breadcrumb {
            font-size: .78rem;
        }


        .hero-content h1 {
            font-size: 1.35rem;
        }


        .hero-content p {
            font-size: .82rem;
        }


        .profil-card {
            padding:
                28px 20px;
        }


        .kaprodi-photo {
            height: 300px;
        }


        .nav-jurusan {
            gap: 7px;
        }


        .nav-jurusan a {
            min-width: 68px;

            padding:
                9px 11px;

            font-size: .78rem;
        }

    }


    /* =========================================================
       ANIMASI TAMBAHAN — DEKORASI BERGERAK
    ========================================================= */

    /* Lingkaran dekorasi hero melayang pelan */
    .hero-circle-one {
        animation: floatCircleA 14s ease-in-out infinite;
    }

    .hero-circle-two {
        animation: floatCircleB 18s ease-in-out infinite;
    }

    @keyframes floatCircleA {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        50%      { transform: translate(-18px, 22px) rotate(15deg); }
    }

    @keyframes floatCircleB {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        50%      { transform: translate(16px, -18px) rotate(-12deg); }
    }


    /* Logo jurusan bobbing halus naik-turun */
    .hero-logo {
        animation: logoBob 4s ease-in-out infinite;
    }

    @keyframes logoBob {
        0%, 100% { transform: translateY(0); }
        50%      { transform: translateY(-8px); }
    }


    /* Ken Burns pada foto kaprodi: zoom & geser pelan terus-menerus */
    .kaprodi-photo img {
        animation: kaprodiKenBurns 18s ease-in-out infinite alternate;
        will-change: transform;
    }

    @keyframes kaprodiKenBurns {
        0%   { transform: scale(1)    translate(0, 0); }
        100% { transform: scale(1.1)  translate(-2%, -1%); }
    }

    .kaprodi-card:hover .kaprodi-photo img {
        animation-play-state: paused;
        transform: scale(1.06);
    }


    /* Dekorasi lingkaran di kaprodi-section juga sedikit berdenyut */
    .kaprodi-decoration-one {
        animation: pulseDecoration 6s ease-in-out infinite;
    }

    .kaprodi-decoration-two {
        animation: pulseDecoration 6s ease-in-out infinite 1.5s;
    }

    @keyframes pulseDecoration {
        0%, 100% { transform: scale(1);    opacity: 1; }
        50%      { transform: scale(1.12); opacity: .7; }
    }


    /* =========================================================
       SCROLL REVEAL — fade-in slide-up untuk semua card konten
    ========================================================= */

    [data-reveal] {
        opacity: 0;
        transform: translateY(40px);
    }

    [data-reveal].is-visible {
        opacity: 1;
        transform: translateY(0);
        transition:
            opacity .7s ease,
            transform .7s cubic-bezier(0.22, 1, 0.36, 1);
    }


    /* Hormati pengguna yang mematikan animasi di OS-nya */
    @media (prefers-reduced-motion: reduce) {

        .hero-circle-one,
        .hero-circle-two,
        .hero-logo,
        .kaprodi-photo img,
        .kaprodi-decoration-one,
        .kaprodi-decoration-two {
            animation: none !important;
        }

        [data-reveal] {
            opacity: 1 !important;
            transform: none !important;
            transition: none !important;
        }
    }

</style>

@endsection


@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | KODE JURUSAN
    |--------------------------------------------------------------------------
    */

    $kodeLower = strtolower(
        trim($jurusan->kode ?? '')
    );


    /*
    |--------------------------------------------------------------------------
    | LOGO JURUSAN
    |--------------------------------------------------------------------------
    */

    $mappingLogo = [

        'rpl'       => 'logo-pplg.jpeg',
        'pplg'      => 'logo-pplg.jpeg',

        'bd'        => 'logo-pemasaran.jpeg',
        'pemasaran' => 'logo-pemasaran.jpeg',

        'aphp'      => 'logo-aphp.jpeg',

        'tkr'       => 'logo-tkr.jpeg',

    ];


    $namaLogo =
        $mappingLogo[$kodeLower]
        ?? 'logo-pemasaran.jpeg';


    if (!empty($jurusan->logo)) {

        $logoPath =
            $jurusan->logo;

    } else {

        $logoPath =
            'images/jurusan/logojurusan/'
            . $namaLogo;
    }


    if (
        str_starts_with(
            $logoPath,
            'http'
        )
    ) {

        $logoUrl =
            $logoPath;

    } elseif (
        str_starts_with(
            $logoPath,
            'images/'
        )
    ) {

        if (
            file_exists(
                public_path($logoPath)
            )
        ) {

            $logoUrl =
                asset($logoPath);

        } else {

            $logoUrl =
                asset(
                    'images/jurusan/logojurusan/logo-pemasaran.jpeg'
                );
        }

    } else {

        $logoUrl =
            asset(
                'storage/' . $logoPath
            );
    }


    /*
    |--------------------------------------------------------------------------
    | KEPALA KONSENTRASI
    |--------------------------------------------------------------------------
    */

    $namaKaprodi =
        $jurusan->kaprodi_nama
        ?? 'Belum ada nama';


    $gelarKaprodi =
        trim(
            $jurusan->kaprodi_gelar
            ?? ''
        );


    /*
    |--------------------------------------------------------------------------
    | FOTO KAPRODI
    |--------------------------------------------------------------------------
    */

    $kaprodiPath =
        $jurusan->kaprodi_foto
        ?? '';


    if (!empty($kaprodiPath)) {

        if (
            str_starts_with(
                $kaprodiPath,
                'http'
            )
        ) {

            $kaprodiUrl =
                $kaprodiPath;

        } elseif (
            str_starts_with(
                $kaprodiPath,
                'images/'
            )
        ) {

            if (
                file_exists(
                    public_path($kaprodiPath)
                )
            ) {

                $kaprodiUrl =
                    asset($kaprodiPath);

            } else {

                $kaprodiUrl =
                    asset(
                        'images/default-user.png'
                    );
            }

        } else {

            $kaprodiUrl =
                asset(
                    'storage/' . $kaprodiPath
                );
        }

    } else {

        $kaprodiUrl =
            asset(
                'images/default-user.png'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | DESKRIPSI JURUSAN
    |--------------------------------------------------------------------------
    */

    $getDeskripsiJurusan =
        function () use (
            $kodeLower,
            $jurusan
        ) {

            /*
            | RPL / PPLG
            */

            if (
                $kodeLower === 'rpl'
                ||
                $kodeLower === 'pplg'
            ) {

                return [

                    "Rekayasa Perangkat Lunak (RPL) merupakan konsentrasi keahlian yang membekali siswa dengan kompetensi di bidang pengembangan perangkat lunak dan teknologi informasi. Program ini dirancang untuk menghasilkan lulusan yang memiliki kemampuan berpikir logis, analitis, serta mampu mengembangkan solusi berbasis teknologi sesuai dengan kebutuhan masyarakat dan dunia industri.",

                    "Siswa akan mempelajari berbagai kompetensi inti, meliputi pemrograman dasar dan lanjutan, pengembangan aplikasi berbasis web dan mobile, pengelolaan basis data, perancangan sistem informasi, serta penerapan konsep rekayasa perangkat lunak sesuai standar industri. Selain itu, siswa juga dibekali dengan pemahaman tentang keamanan sistem, pengujian perangkat lunak, dan dokumentasi proyek.",

                    "Proses pembelajaran dilaksanakan melalui pendekatan pembelajaran berbasis praktik, project-based learning, serta penerapan Teaching Factory (TeFa). Siswa dilatih untuk mengerjakan proyek nyata secara individu maupun tim dengan dukungan sarana ruang praktik komputer dan perangkat lunak yang memadai.",

                    "Lulusan Rekayasa Perangkat Lunak memiliki peluang kerja yang luas, antara lain sebagai programmer, web developer, mobile application developer, database administrator, maupun junior software engineer. Selain memasuki dunia kerja, lulusan juga memiliki kesempatan untuk melanjutkan pendidikan ke jenjang yang lebih tinggi atau mengembangkan usaha mandiri di bidang teknologi informasi."

                ];

            }


            /*
            | TKR
            */

            if (
                $kodeLower === 'tkr'
                ||
                $kodeLower === 'tkro'
            ) {

                return [

                    "Teknik Kendaraan Ringan (TKR) merupakan konsentrasi keahlian yang mempersiapkan siswa untuk memiliki kompetensi di bidang perawatan, perbaikan, dan diagnosis kendaraan ringan. Program ini berorientasi pada penguasaan teknologi otomotif sesuai dengan standar dan kebutuhan industri.",

                    "Siswa dibekali dengan kompetensi sistem mesin, sistem pemindah tenaga, sistem sasis, sistem kelistrikan kendaraan, serta teknologi kendaraan modern. Selain itu, siswa juga mempelajari penggunaan alat diagnosis dan peralatan bengkel kendaraan ringan.",

                    "Proses pembelajaran dilaksanakan melalui pembelajaran berbasis praktik di ruang praktik kendaraan ringan yang dilengkapi dengan peralatan dan unit kendaraan. Pembelajaran juga menanamkan budaya kerja industri, disiplin, dan keselamatan kerja.",

                    "Lulusan Teknik Kendaraan Ringan memiliki peluang kerja sebagai mekanik kendaraan ringan, teknisi otomotif, tenaga servis kendaraan, maupun wirausahawan di bidang bengkel otomotif."

                ];

            }


            /*
            | APHP
            */

            if (
                $kodeLower === 'aphp'
            ) {

                return [

                    "Program keahlian Agriteknologi Pengolahan Hasil Pertanian pada konsentrasi keahlian Agribisnis Pengolahan Hasil Pertanian berisikan sekumpulan unit kompetensi yang meliputi pengetahuan, keterampilan dan sikap yang harus dikuasai dalam mengembangkan produksi olahan hasil nabati, produksi olahan hasil hewani, produksi olahan hasil tanaman bahan penyegar dan perkebunan, produksi olahan hasil tanaman rempah, sistem manajemen keamanan pangan dan kualitas produk, pengemasan, penyimpanan dan penggudangan, penanganan limbah pengolahan hasil pertanian serta analisa usaha pengolahan hasil pertanian.",

                    "Cakupan kompetensi yang ada pada program keahlian Agribisnis Pengolahan Hasil Pertanian diharapkan dapat membekali peserta didik secara pengetahuan, keterampilan dan sikap agar kompeten dalam melakukan pekerjaan sebagai pengolah hasil pertanian secara mandiri atau wirausaha, mengembangkan dan melakukan pekerjaan sebagai pelaksana atau operator pengolahan yang ada di industri pengolahan hasil pertanian."

                ];

            }


            /*
            | BD / PEMASARAN
            */

            if (
                $kodeLower === 'bd'
                ||
                $kodeLower === 'pemasaran'
            ) {

                return [

                    "Konsentrasi Keahlian Bisnis Digital membekali peserta didik dalam hal karakter, sikap dan moral etos kerja, pengetahuan, keterampilan, dan teknologi dengan lingkup cakupan Manajemen bisnis, Pemasaran digital, E-commerce, Content marketing, SEO (Search Engine Optimization), SEM (Search Engine Marketing), Social media marketing, Data analytics, Cloud computing."

                ];

            }


            /*
            | DATABASE
            */

            $deskripsi =
                $jurusan->deskripsi
                ?? '';


            if (!$deskripsi) {

                return [
                    'Belum ada deskripsi untuk konsentrasi keahlian ini.'
                ];

            }


            return preg_split(
                '/\r\n|\r|\n/',
                $deskripsi
            );

        };


    /*
    |--------------------------------------------------------------------------
    | KOMPETENSI
    |--------------------------------------------------------------------------
    */

    $kompetensi =
        $jurusan->kompetensi
        ?? [];


    if (!is_array($kompetensi)) {

        $kompetensi =
            preg_split(
                '/\r\n|\r|\n/',
                $kompetensi
            );
    }


    /*
    |--------------------------------------------------------------------------
    | PROSPEK KARIR
    |--------------------------------------------------------------------------
    */

    $prospekKarir =
        $jurusan->prospek_karir
        ?? [];


    if (!is_array($prospekKarir)) {

        $prospekKarir =
            preg_split(
                '/\r\n|\r|\n/',
                $prospekKarir
            );
    }


    /*
    |--------------------------------------------------------------------------
    | HAPUS DATA KOSONG
    |--------------------------------------------------------------------------
    */

    $kompetensi =
        array_values(
            array_filter(
                $kompetensi,
                fn ($item) =>
                    trim($item) !== ''
            )
        );


    $prospekKarir =
        array_values(
            array_filter(
                $prospekKarir,
                fn ($item) =>
                    trim($item) !== ''
            )
        );

@endphp


<!-- =========================================================
     BREADCRUMB
========================================================= -->

<div class="detail-breadcrumb">

    <a href="{{ route('beranda') }}">
        Beranda
    </a>

    <span> &raquo; </span>

    <a href="{{ route('jurusan') }}">
        Konsentrasi Keahlian
    </a>

    <span> &raquo; </span>

    <span>
        {{ $jurusan->nama_jurusan ?? 'Detail' }}
    </span>

</div>


<!-- =========================================================
     HERO
========================================================= -->

<section class="jurusan-hero">

    <div class="hero-circle-one"></div>

    <div class="hero-circle-two"></div>


    <div class="hero-content">

        <div class="hero-label">

            <i class="fas fa-graduation-cap"></i>

            KONSENTRASI KEAHLIAN

        </div>


        <img
            src="{{ $logoUrl }}"
            alt="{{ $jurusan->nama_jurusan ?? 'Logo Jurusan' }}"
            class="hero-logo"
        >


        <h1>
            {{ $jurusan->nama_jurusan ?? 'Detail Jurusan' }}
        </h1>


        <p>
            SMK Negeri 1 Cijati
            &nbsp;•&nbsp;
            Pendidikan Vokasi
        </p>

    </div>

</section>


<!-- =========================================================
     KONTEN
========================================================= -->

<main class="jurusan-wrapper">


    <!-- =====================================================
         PROFIL
    ====================================================== -->

    <section class="profil-card" data-reveal>

        <div class="section-title">

            <div class="icon">

                <i class="fas fa-school"></i>

            </div>


            <h2>
                Profil Konsentrasi Keahlian
            </h2>


            <div class="line"></div>

        </div>


        @foreach($getDeskripsiJurusan() as $paragraf)

            @if(trim($paragraf) !== '')

                <p>
                    {{ trim($paragraf) }}
                </p>

            @endif

        @endforeach

    </section>


    <!-- =====================================================
         KOMPETENSI & KARIR
    ====================================================== -->

    @if(
        count($kompetensi) > 0
        ||
        count($prospekKarir) > 0
    )

        <div class="info-grid">


            <!-- KOMPETENSI -->

            @if(count($kompetensi) > 0)

                <section class="info-card" data-reveal>

                    <div class="info-header">

                        <div class="info-icon">

                            <i class="fas fa-book-open"></i>

                        </div>


                        <h3>
                            Kompetensi yang Dipelajari
                        </h3>

                    </div>


                    <ul>

                        @foreach($kompetensi as $poin)

                            @if(trim($poin) !== '')

                                <li>
                                    {{ trim($poin) }}
                                </li>

                            @endif

                        @endforeach

                    </ul>

                </section>

            @endif


            <!-- KARIR -->

            @if(count($prospekKarir) > 0)

                <section class="info-card" data-reveal>

                    <div class="info-header">

                        <div class="info-icon">

                            <i class="fas fa-briefcase"></i>

                        </div>


                        <h3>
                            Peluang Kerja & Karir
                        </h3>

                    </div>


                    <ul>

                        @foreach($prospekKarir as $karir)

                            @if(trim($karir) !== '')

                                <li>
                                    {{ trim($karir) }}
                                </li>

                            @endif

                        @endforeach

                    </ul>

                </section>

            @endif


        </div>

    @endif


    <!-- =====================================================
         KEPALA KONSENTRASI KEAHLIAN
    ====================================================== -->

    <section class="kaprodi-section" data-reveal>

        <div class="kaprodi-decoration-one"></div>

        <div class="kaprodi-decoration-two"></div>


        <div class="kaprodi-heading">

            <div class="kaprodi-label">

                <i class="fas fa-user-tie"></i>

                PIMPINAN KONSENTRASI

            </div>


            <h2>
                Kepala Konsentrasi Keahlian
            </h2>

        </div>


        <div class="kaprodi-card">


            <!-- FOTO -->

            <div class="kaprodi-photo">

                <img
                    src="{{ $kaprodiUrl }}"
                    alt="{{ $namaKaprodi }}"
                    loading="lazy"
                >


                <div class="kaprodi-badge">

                    <i class="fas fa-award"></i>

                    {{ strtoupper(
                        $jurusan->singkatan
                        ?? $jurusan->kode
                        ?? 'JURUSAN'
                    ) }}

                </div>

            </div>


            <!-- NAMA -->

            <div class="kaprodi-name">

                {{ $namaKaprodi }}

                @if($gelarKaprodi)

                    {{ $gelarKaprodi }}

                @endif

            </div>


            <!-- JABATAN -->

            <div class="kaprodi-role">

                <i class="fas fa-user-graduate"></i>

                Kaprodi
                {{ $jurusan->nama_jurusan }}

            </div>

        </div>

    </section>


    <!-- =====================================================
         NAVIGASI JURUSAN
    ====================================================== -->

    <section class="jurusan-navigation" data-reveal>


        <div class="nav-icon">

            <i class="fas fa-layer-group"></i>

        </div>


        <h3>
            Eksplorasi Konsentrasi Keahlian
        </h3>


        <p>
            Pilih konsentrasi lain untuk melihat informasi lengkap
        </p>


        @php

            $jurusanNavigasi = [

                'rpl'  => 'RPL',

                'tkr'  => 'TKR',

                'aphp' => 'APHP',

                'bd'   => 'BD',

            ];

        @endphp


        <div class="nav-jurusan">

            @foreach(
                $jurusanNavigasi
                as $kode => $nama
            )

                @php

                    $kodeSekarang =
                        strtolower(
                            $jurusan->kode
                            ?? ''
                        );


                    $aktif =
                        $kodeSekarang === $kode

                        ||

                        (
                            $kode === 'rpl'
                            &&
                            $kodeSekarang === 'pplg'
                        )

                        ||

                        (
                            $kode === 'bd'
                            &&
                            $kodeSekarang === 'pemasaran'
                        );

                @endphp


                <a
                    href="{{ route(
                        'jurusan.detail',
                        $kode
                    ) }}"
                    class="{{ $aktif ? 'active' : '' }}"
                >

                    {{ $nama }}

                </a>

            @endforeach

        </div>

    </section>


</main>

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