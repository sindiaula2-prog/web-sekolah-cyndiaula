@extends('layouts.app')

@section('title', 'Fasilitas Sekolah - SMK Negeri 1 Cijati')

@section('styles')

<style>
    /* =========================================================
       VARIABLES
    ========================================================= */
    :root {
        --navy: #0B2545;
        --navy-light: #123B72;
        --blue: #1E5CA8;
        --cyan: #00A8B5;

        --bg: #f1f5f9;
        --white: #ffffff;

        --text: #0B2545;
        --text-soft: #64748B;

        --border: #E2E8F0;

        --shadow-sm:
            0 8px 25px rgba(11, 37, 69, 0.06);

        --shadow-md:
            0 15px 35px rgba(11, 37, 69, 0.10);

        --shadow-lg:
            0 25px 55px rgba(11, 37, 69, 0.16);
    }


    /* =========================================================
       RESET
    ========================================================= */
    * {
        box-sizing: border-box;
    }


    body {
        margin: 0;
        padding: 0;

        font-family:
            'Segoe UI',
            Tahoma,
            Geneva,
            Verdana,
            sans-serif;

        background: var(--bg);
        color: var(--text);

        overflow-x: hidden;
    }


    /* =========================================================
       HERO
    ========================================================= */
    .fasilitas-hero {
        position: relative;

        width: 100%;
        min-height: 330px;

        display: flex;
        align-items: center;
        justify-content: center;

        text-align: center;

        padding: 55px 20px;

        overflow: hidden;

        background:
            linear-gradient(
                180deg,
                rgba(11, 37, 69, 0.80),
                rgba(11, 37, 69, 0.68),
                rgba(11, 37, 69, 0.84)
            ),
            url("{{ asset('images/sekolah/poto.sekolah.jpeg') }}")
            center / cover no-repeat;
    }


    /* garis kecil atas */
    .fasilitas-hero::after {
        content: "";

        position: absolute;

        left: 0;
        right: 0;
        bottom: 0;

        height: 4px;

        background:
            linear-gradient(
                90deg,
                var(--cyan),
                #ffffff,
                var(--cyan)
            );

        opacity: .8;
    }


    /* =========================================================
       WATERMARK
    ========================================================= */
    .hero-watermark {
        position: absolute;

        inset: 0;

        display: flex;
        align-items: center;
        justify-content: center;

        overflow: hidden;

        pointer-events: none;
    }


    .hero-watermark span {
        font-size: clamp(65px, 12vw, 165px);

        font-weight: 900;

        letter-spacing: 14px;

        color: rgba(255,255,255,0.055);

        white-space: nowrap;

        user-select: none;
    }


    /* =========================================================
       HERO CARD
    ========================================================= */
    .fasilitas-hero-card {
        position: relative;

        z-index: 3;

        width: 100%;
        max-width: 650px;

        padding: 30px 35px;

        color: #ffffff;

        background:
            rgba(11, 37, 69, 0.62);

        border:
            1px solid rgba(255,255,255,0.14);

        border-radius: 22px;

        backdrop-filter: blur(10px);

        box-shadow:
            0 20px 50px rgba(0,0,0,0.24);
    }


    /* =========================================================
       BREADCRUMB
    ========================================================= */
    .hero-breadcrumb {
        font-size: 12px;

        font-weight: 700;

        color: #CBD5E1;

        margin-bottom: 17px;
    }


    .hero-breadcrumb a {
        color: #E0F2FE;

        text-decoration: none;

        transition: color .2s ease;
    }


    .hero-breadcrumb a:hover {
        color: #ffffff;

        text-decoration: underline;
    }


    /* =========================================================
       HERO ICON
    ========================================================= */
    .hero-icon {
        width: 58px;
        height: 58px;

        margin: 0 auto 15px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 18px;

        background:
            rgba(255,255,255,0.14);

        border:
            1px solid rgba(255,255,255,0.20);

        font-size: 27px;

        box-shadow:
            0 8px 20px rgba(0,0,0,.15);
    }


    /* =========================================================
       HERO TITLE
    ========================================================= */
    .fasilitas-hero-title {
        margin: 0 0 10px;

        font-size: 34px;

        line-height: 1.2;

        font-weight: 800;

        letter-spacing: -.5px;

        text-shadow:
            0 3px 8px rgba(0,0,0,.25);
    }


    .fasilitas-hero-subtitle {
        margin: 0;

        font-size: 14px;

        line-height: 1.65;

        color: #E2F1F8;
    }


    /* =========================================================
       CONTENT WRAPPER
    ========================================================= */
    .fasilitas-wrapper {
        position: relative;

        z-index: 5;

        max-width: 1180px;

        margin:
            -38px auto 70px;

        padding:
            0 22px;
    }


    /* =========================================================
       INTRO CARD
    ========================================================= */
    .fasilitas-intro {
        background: #ffffff;

        border:
            1px solid var(--border);

        border-radius: 22px;

        padding:
            28px 32px;

        margin-bottom: 30px;

        box-shadow:
            var(--shadow-md);

        display: flex;

        align-items: center;

        gap: 20px;
    }


    .intro-icon {
        flex-shrink: 0;

        width: 58px;
        height: 58px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 17px;

        background:
            linear-gradient(
                135deg,
                var(--navy),
                var(--blue)
            );

        color: #ffffff;

        font-size: 25px;

        box-shadow:
            0 8px 18px rgba(11,37,69,.18);
    }


    .intro-text h2 {
        margin: 0 0 5px;

        color: var(--navy);

        font-size: 20px;

        font-weight: 800;
    }


    .intro-text p {
        margin: 0;

        color: var(--text-soft);

        font-size: 14px;

        line-height: 1.6;
    }


    /* =========================================================
       GRID
    ========================================================= */
    .fasilitas-grid {
        display: grid;

        grid-template-columns:
            repeat(3, minmax(0, 1fr));

        gap: 26px;
    }


    /* =========================================================
       CARD FASILITAS
    ========================================================= */
    .fasilitas-card {
        position: relative;

        display: flex;

        flex-direction: column;

        min-width: 0;

        background: #ffffff;

        border:
            1px solid var(--border);

        border-radius: 20px;

        overflow: hidden;

        box-shadow:
            var(--shadow-sm);

        transition:
            transform .3s ease,
            box-shadow .3s ease,
            border-color .3s ease;

        /* --- SCROLL REVEAL (state awal sebelum kelihatan) --- */
        opacity: 0;
        transform: translateY(40px);
    }


    /* --- SCROLL REVEAL (state saat sudah masuk viewport) --- */
    .fasilitas-card.is-visible {
        opacity: 1;
        transform: translateY(0);
        transition:
            opacity .7s ease,
            transform .7s cubic-bezier(0.22, 1, 0.36, 1),
            box-shadow .3s ease,
            border-color .3s ease;
    }


    .fasilitas-card:hover {
        transform:
            translateY(-8px);

        border-color:
            rgba(0,168,181,.35);

        box-shadow:
            var(--shadow-lg);
    }


    /* =========================================================
       FOTO
    ========================================================= */
    .fasilitas-img-wrap {
        position: relative;

        width: 100%;

        height: 245px;

        overflow: hidden;

        background:
            linear-gradient(
                135deg,
                #e8f1f7,
                #f8fafc
            );
    }


    .fasilitas-img-wrap img {
        width: 100%;
        height: 100%;

        display: block;

        object-fit: cover;

        object-position: center;

        transition:
            filter .35s ease;

        /* --- KEN BURNS: foto bergerak zoom & geser pelan terus-menerus --- */
        animation: kenBurns 16s ease-in-out infinite alternate;
        transform-origin: center;
        will-change: transform;
    }


    /* Variasi arah pergerakan tiap foto biar nggak seragam/monoton */
    .fasilitas-card:nth-child(3n+1) .fasilitas-img-wrap img {
        animation-name: kenBurnsA;
    }

    .fasilitas-card:nth-child(3n+2) .fasilitas-img-wrap img {
        animation-name: kenBurnsB;
    }

    .fasilitas-card:nth-child(3n+3) .fasilitas-img-wrap img {
        animation-name: kenBurnsC;
    }


    @keyframes kenBurnsA {
        0%   { transform: scale(1)     translate(0, 0); }
        100% { transform: scale(1.14)  translate(-2%, -2%); }
    }

    @keyframes kenBurnsB {
        0%   { transform: scale(1.06)  translate(1%, 0); }
        100% { transform: scale(1.16)  translate(-1%, 2%); }
    }

    @keyframes kenBurnsC {
        0%   { transform: scale(1)     translate(-1%, 1%); }
        100% { transform: scale(1.15)  translate(2%, -1%); }
    }


    /* Saat hover, animasi Ken Burns dijeda & ganti sedikit lebih dramatis */
    .fasilitas-card:hover .fasilitas-img-wrap img {
        animation-play-state: paused;
        transform: scale(1.1);
        filter: brightness(.92);
    }


    /* =========================================================
       OVERLAY FOTO
    ========================================================= */
    .fasilitas-img-wrap::after {
        content: "";

        position: absolute;

        inset: 0;

        background:
            linear-gradient(
                180deg,
                rgba(11,37,69,0) 50%,
                rgba(11,37,69,.38)
            );

        pointer-events: none;
    }


    /* =========================================================
       BADGE
    ========================================================= */
    .fasilitas-badge {
        position: absolute;

        z-index: 2;

        top: 15px;
        left: 15px;

        display: inline-flex;

        align-items: center;

        gap: 6px;

        padding:
            7px 13px;

        border-radius: 30px;

        background:
            rgba(11,37,69,.90);

        color: #ffffff;

        font-size: 11px;

        font-weight: 700;

        letter-spacing: .2px;

        backdrop-filter:
            blur(7px);

        box-shadow:
            0 5px 14px rgba(0,0,0,.18);
    }


    /* =========================================================
       NOMOR CARD
    ========================================================= */
    .fasilitas-number {
        position: absolute;

        z-index: 2;

        right: 14px;
        top: 14px;

        width: 32px;
        height: 32px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 50%;

        background:
            rgba(255,255,255,.92);

        color:
            var(--navy);

        font-size: 12px;

        font-weight: 800;

        box-shadow:
            0 5px 14px rgba(0,0,0,.12);
    }


    /* =========================================================
       CARD BODY
    ========================================================= */
    .fasilitas-body {
        padding:
            21px 21px 23px;

        display: flex;

        flex-direction: column;

        flex: 1;
    }


    .fasilitas-name {
        margin: 0 0 9px;

        color:
            var(--navy);

        font-size: 17px;

        font-weight: 800;

        line-height: 1.4;
    }


    .fasilitas-desc {
        margin: 0;

        color:
            var(--text-soft);

        font-size: 13.5px;

        line-height: 1.7;
    }


    /* =========================================================
       GARIS BAWAH CARD
    ========================================================= */
    .fasilitas-line {
        width: 45px;

        height: 3px;

        margin-top: 17px;

        border-radius: 10px;

        background:
            linear-gradient(
                90deg,
                var(--navy),
                var(--cyan)
            );

        transition:
            width .3s ease;
    }


    .fasilitas-card:hover
    .fasilitas-line {
        width: 80px;
    }


    /* =========================================================
       EMPTY STATE
    ========================================================= */
    .fasilitas-empty {
        grid-column:
            1 / -1;

        padding:
            65px 25px;

        text-align: center;

        background:
            #ffffff;

        border:
            1px solid var(--border);

        border-radius: 20px;

        box-shadow:
            var(--shadow-sm);
    }


    .fasilitas-empty-icon {
        width: 65px;
        height: 65px;

        margin:
            0 auto 15px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 50%;

        background:
            #e8f4f8;

        color:
            var(--cyan);

        font-size: 27px;
    }


    .fasilitas-empty h3 {
        margin: 0 0 8px;

        color:
            var(--navy);

        font-size: 18px;
    }


    .fasilitas-empty p {
        margin: 0;

        color:
            var(--text-soft);

        font-size: 14px;
    }


    /* =========================================================
       RESPONSIVE TABLET
    ========================================================= */
    @media (max-width: 950px) {

        .fasilitas-grid {
            grid-template-columns:
                repeat(2, minmax(0, 1fr));
        }

        .fasilitas-img-wrap {
            height: 235px;
        }
    }


    /* =========================================================
       RESPONSIVE MOBILE
    ========================================================= */
    @media (max-width: 650px) {

        .fasilitas-hero {
            min-height: 300px;

            padding:
                45px 16px;
        }

        .fasilitas-hero-card {
            padding:
                27px 20px;
        }

        .fasilitas-hero-title {
            font-size: 27px;
        }

        .fasilitas-hero-subtitle {
            font-size: 13px;
        }

        .hero-watermark span {
            font-size: 65px;
            letter-spacing: 7px;
        }

        .fasilitas-wrapper {
            margin-top: -28px;

            padding:
                0 15px;
        }

        .fasilitas-intro {
            padding:
                22px;

            align-items:
                flex-start;
        }

        .intro-icon {
            width: 48px;
            height: 48px;

            font-size: 20px;
        }

        .intro-text h2 {
            font-size: 17px;
        }

        .intro-text p {
            font-size: 13px;
        }

        .fasilitas-grid {
            grid-template-columns: 1fr;

            gap: 20px;
        }

        .fasilitas-img-wrap {
            height: 245px;
        }
    }


    /* =========================================================
       MOBILE KECIL
    ========================================================= */
    @media (max-width: 420px) {

        .fasilitas-hero-title {
            font-size: 24px;
        }

        .fasilitas-hero-card {
            border-radius: 18px;
        }

        .fasilitas-img-wrap {
            height: 220px;
        }
    }


    /* =========================================================
       HORMATI PENGGUNA YANG MEMATIKAN ANIMASI DI OS-NYA
    ========================================================= */
    @media (prefers-reduced-motion: reduce) {

        .fasilitas-img-wrap img {
            animation: none !important;
        }

        .fasilitas-card {
            opacity: 1 !important;
            transform: none !important;
            transition: none !important;
        }
    }

</style>

@endsection


@section('content')

<!-- =========================================================
     HERO
========================================================= -->

<section class="fasilitas-hero">

    <!-- WATERMARK -->
    <div class="hero-watermark">
        <span>SMK N 1 CIJATI</span>
    </div>


    <!-- HERO CARD -->
    <div class="fasilitas-hero-card">

        <!-- BREADCRUMB -->
        <div class="hero-breadcrumb">

            <a href="{{ route('beranda') }}">
                Beranda
            </a>

            <span>
                &nbsp;/&nbsp;
            </span>

            <span>
                Profil Sekolah
            </span>

            <span>
                &nbsp;/&nbsp;
            </span>

            <span>
                Fasilitas
            </span>

        </div>


        <!-- ICON -->
        <div class="hero-icon">
            🏫
        </div>


        <!-- TITLE -->
        <h1 class="fasilitas-hero-title">
            Fasilitas Sekolah
        </h1>


        <!-- SUBTITLE -->
        <p class="fasilitas-hero-subtitle">
            Sarana dan prasarana penunjang kegiatan
            pembelajaran serta pengembangan potensi
            siswa SMK Negeri 1 Cijati.
        </p>

    </div>

</section>



<!-- =========================================================
     CONTENT
========================================================= -->

<section class="fasilitas-wrapper">


    <!-- =====================================================
         INTRO
    ====================================================== -->

    <div class="fasilitas-intro">

        <div class="intro-icon">
            🏢
        </div>


        <div class="intro-text">

            <h2>
                Sarana & Prasarana Sekolah
            </h2>

            <p>
                SMK Negeri 1 Cijati menyediakan berbagai
                fasilitas yang mendukung proses pembelajaran,
                kegiatan praktik, olahraga, ekstrakurikuler,
                dan aktivitas sekolah lainnya.
            </p>

        </div>

    </div>



    <!-- =====================================================
         GRID FASILITAS
    ====================================================== -->

    <div class="fasilitas-grid">

        @forelse ($fasilitas as $index => $item)

            @php

                /*
                |--------------------------------------------------------------------------
                | FOTO FASILITAS
                |--------------------------------------------------------------------------
                | Mendukung:
                | 1. images/...
                | 2. storage/...
                | 3. path upload dashboard
                */

                $fotoPath = $item->foto ?? null;

                $fotoFinal = asset(
                    'images/image_c6c626.png'
                );


                if (!empty($fotoPath)) {

                    if (
                        \Illuminate\Support\Str::startsWith(
                            $fotoPath,
                            'http'
                        )
                    ) {

                        $fotoFinal = $fotoPath;

                    }

                    elseif (
                        \Illuminate\Support\Str::startsWith(
                            $fotoPath,
                            'images/'
                        )
                    ) {

                        if (
                            file_exists(
                                public_path($fotoPath)
                            )
                        ) {

                            $fotoFinal =
                                asset($fotoPath);

                        }

                    }

                    else {

                        $fotoFinal =
                            asset(
                                'storage/' . $fotoPath
                            );

                    }

                }

            @endphp


            <!-- =================================================
                 CARD
            ================================================== -->

            <article class="fasilitas-card" data-reveal style="transition-delay: {{ ($index % 3) * 0.12 }}s;">


                <!-- FOTO -->
                <div class="fasilitas-img-wrap">

                    <img
                        src="{{ $fotoFinal }}"
                        alt="{{ $item->nama_fasilitas }}"
                        loading="lazy"

                        onerror="
                            this.onerror=null;
                            this.src='{{ asset('images/image_c6c626.png') }}';
                        "
                    >


                    <!-- BADGE -->
                    <span class="fasilitas-badge">
                        🏫 Sarana Sekolah
                    </span>


                    <!-- NOMOR -->
                    <span class="fasilitas-number">

                        {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}

                    </span>

                </div>



                <!-- BODY -->
                <div class="fasilitas-body">


                    <!-- NAMA -->
                    <h3 class="fasilitas-name">

                        {{ $item->nama_fasilitas }}

                    </h3>


                    <!-- DESKRIPSI -->
                    <p class="fasilitas-desc">

                        {{ $item->deskripsi }}

                    </p>


                    <!-- ACCENT LINE -->
                    <div class="fasilitas-line"></div>

                </div>

            </article>


        @empty


            <!-- =================================================
                 EMPTY STATE
            ================================================== -->

            <div class="fasilitas-empty">

                <div class="fasilitas-empty-icon">
                    🏫
                </div>

                <h3>
                    Belum Ada Data Fasilitas
                </h3>

                <p>
                    Data fasilitas sekolah belum
                    ditambahkan ke dalam database.
                </p>

            </div>


        @endforelse

    </div>

</section>


<!-- =========================================================
     SCRIPT: SCROLL REVEAL
     Card fade-in-up satu-satu saat masuk viewport
========================================================= -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    var cards = document.querySelectorAll('[data-reveal]');

    if (!('IntersectionObserver' in window)) {
        // Browser lama: langsung tampilkan semua tanpa animasi
        cards.forEach(function (card) {
            card.classList.add('is-visible');
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
        threshold: 0.15,
        rootMargin: '0px 0px -40px 0px'
    });

    cards.forEach(function (card) {
        observer.observe(card);
    });
});
</script>

@endsection