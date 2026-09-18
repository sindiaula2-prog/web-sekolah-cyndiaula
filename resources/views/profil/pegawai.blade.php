@extends('layouts.app')

@section('title', 'Pegawai & Guru - SMK Negeri 1 Cijati')


@section('styles')
<style>

    /* =========================================================
       VARIABLE
    ========================================================= */

    :root {
        --primary: #0B2545;
        --primary-light: #123B72;
        --accent: #00A8B5;
        --accent-dark: #008c98;

        --accent-light: #e6f8fa;

        --bg-color: #f4f7fa;
        --card-bg: #ffffff;

        --text-main: #1E293B;
        --text-muted: #64748b;

        --border-color: #E2E8F0;
    }


    /* =========================================================
       RESET
    ========================================================= */

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }


    body {
        font-family:
            'Plus Jakarta Sans',
            'Segoe UI',
            Tahoma,
            Geneva,
            Verdana,
            sans-serif;

        background: var(--bg-color);

        color: var(--text-main);

        overflow-x: hidden;
    }


    /* =========================================================
       HERO
    ========================================================= */

    .guru-hero {

        position: relative;

        width: 100%;

        min-height: 350px;

        background:
            url("{{ asset('images/sekolah/sekolah.jpg.png') }}")
            center/cover no-repeat;

        display: flex;

        align-items: center;

        justify-content: center;

        padding: 60px 20px;

        overflow: hidden;
    }


    /* OVERLAY */

    .guru-hero::before {

        content: '';

        position: absolute;

        inset: 0;

        background:
            linear-gradient(
                180deg,
                rgba(11, 37, 69, 0.88),
                rgba(11, 37, 69, 0.68) 55%,
                rgba(11, 37, 69, 0.90)
            );

        z-index: 1;
    }


    /* =========================================================
       WATERMARK
    ========================================================= */

    .guru-watermark {

        position: absolute;

        inset: 0;

        display: flex;

        align-items: center;

        justify-content: center;

        z-index: 2;

        pointer-events: none;

        overflow: hidden;
    }


    /* Watermark melayang pelan supaya hero terasa lebih hidup */

    .guru-watermark span {

        font-size:
            clamp(
                60px,
                12vw,
                160px
            );

        font-weight: 900;

        color:
            rgba(255,255,255,0.055);

        letter-spacing: 18px;

        white-space: nowrap;

        display: inline-block;

        animation: guruWatermarkMelayang 8s ease-in-out infinite;
    }


    @keyframes guruWatermarkMelayang {
        0%   { transform: translateY(0px) scale(1); }
        50%  { transform: translateY(-10px) scale(1.02); }
        100% { transform: translateY(0px) scale(1); }
    }


    /* =========================================================
       HERO CARD
    ========================================================= */

    .guru-hero-card {

        position: relative;

        z-index: 3;

        width: 100%;

        max-width: 720px;

        padding: 38px 45px;

        text-align: center;

        color: #ffffff;

        background:
            rgba(11, 37, 69, 0.52);

        border:
            1px solid
            rgba(255,255,255,0.15);

        border-radius: 26px;

        backdrop-filter: blur(10px);

        box-shadow:
            0 20px 50px
            rgba(0,0,0,0.25);
    }


    /* =========================================================
       BREADCRUMB
    ========================================================= */

    .guru-breadcrumb {

        font-size: 12.5px;

        font-weight: 700;

        letter-spacing: 0.4px;

        color: #CBD5E1;

        margin-bottom: 15px;
    }


    .guru-breadcrumb a {

        color: #E0F2FE;

        text-decoration: none;

        transition: 0.2s ease;
    }


    .guru-breadcrumb a:hover {

        color: #ffffff;

        text-decoration: underline;
    }


    /* =========================================================
       HERO TITLE
    ========================================================= */

    .guru-hero-card h1 {

        font-size: 36px;

        font-weight: 800;

        line-height: 1.2;

        margin-bottom: 14px;

        text-shadow:
            0 3px 8px
            rgba(0,0,0,0.30);
    }


    .guru-hero-card p {

        max-width: 560px;

        margin: 0 auto;

        font-size: 14.5px;

        line-height: 1.7;

        color: #E2E8F0;
    }


    /* =========================================================
       SECTION
    ========================================================= */

    .guru-section {

        max-width: 1200px;

        margin: 0 auto;

        padding:
            60px 24px
            80px;
    }


    /* =========================================================
       SECTION HEADER
    ========================================================= */

    .guru-section-header {

        text-align: center;

        margin-bottom: 42px;
    }


    .guru-eyebrow {

        display: inline-flex;

        align-items: center;

        justify-content: center;

        padding:
            7px 14px;

        border-radius: 50px;

        background:
            var(--accent-light);

        color:
            var(--accent-dark);

        font-size: 11px;

        font-weight: 800;

        text-transform: uppercase;

        letter-spacing: 1px;

        margin-bottom: 13px;
    }


    .guru-section-header h2 {

        font-size: 30px;

        font-weight: 800;

        color: var(--primary);

        margin-bottom: 12px;
    }


    /* GARIS */

    .guru-divider {

        width: 60px;

        height: 4px;

        border-radius: 20px;

        background:
            linear-gradient(
                90deg,
                var(--primary),
                var(--accent)
            );

        margin:
            0 auto 14px;
    }


    .guru-section-header p {

        max-width: 650px;

        margin: 0 auto;

        color: var(--text-muted);

        font-size: 14px;

        line-height: 1.7;
    }


    /* =========================================================
       GRID GURU
    ========================================================= */

    .pegawai-grid {

        display: grid;

        grid-template-columns:
            repeat(
                auto-fill,
                minmax(225px, 1fr)
            );

        gap: 26px;
    }


    /* =========================================================
       CARD GURU — DENGAN REVEAL SAAT SCROLL
    ========================================================= */

    .pegawai-card {

        position: relative;

        background: #ffffff;

        border:
            1px solid
            var(--border-color);

        border-radius: 22px;

        overflow: hidden;

        box-shadow:
            0 10px 25px
            rgba(11,37,69,0.06);

        text-align: center;

        display: flex;

        flex-direction: column;

        transition:
            transform 0.35s ease,
            box-shadow 0.35s ease,
            border-color 0.35s ease,
            opacity 0.7s ease;
    }


    /* Kondisi awal sebelum terlihat di layar */

    .pegawai-card.reveal {
        opacity: 0;
        transform: translateY(35px) scale(.95);
    }


    /* Saat masuk viewport, class "show" ditambahkan lewat JS */

    .pegawai-card.reveal.show {
        opacity: 1;
        transform: translateY(0) scale(1);
    }


    .pegawai-card:hover {

        transform:
            translateY(-8px);

        border-color:
            rgba(0,168,181,0.5);

        box-shadow:
            0 20px 40px
            rgba(0,168,181,0.14);
    }


    /* =========================================================
       GARIS ATAS CARD
    ========================================================= */

    .pegawai-card::before {

        content: '';

        position: absolute;

        top: 0;

        left: 0;

        width: 100%;

        height: 5px;

        background:
            linear-gradient(
                90deg,
                var(--primary),
                var(--accent)
            );

        z-index: 3;
    }


    /* =========================================================
       FOTO — EFEK KEN BURNS (zoom halus otomatis)
    ========================================================= */

    .pegawai-img-wrap {

        position: relative;

        width: 100%;

        height: 245px;

        background:
            linear-gradient(
                145deg,
                #eaf4f7,
                #f8fafc
            );

        overflow: hidden;

        display: flex;

        align-items: center;

        justify-content: center;

        padding-top: 5px;
    }


    .pegawai-img-wrap img {

        width: 100%;

        height: 100%;

        object-fit: cover;

        object-position: top center;

        /* zoom in-out pelan berkelanjutan supaya foto terasa hidup */
        animation: pegawaiKenBurns 12s ease-in-out infinite;

        transition:
            transform 0.5s ease;
    }


    @keyframes pegawaiKenBurns {
        0%   { transform: scale(1); }
        50%  { transform: scale(1.07); }
        100% { transform: scale(1); }
    }


    /* Saat di-hover, animasi otomatis berhenti dan diganti
       zoom yang lebih tegas mengikuti kursor */

    .pegawai-card:hover
    .pegawai-img-wrap img {

        animation-play-state: paused;

        transform:
            scale(1.1);
    }


    /* =========================================================
       BADGE
    ========================================================= */

    .pegawai-badge {

        position: absolute;

        top: 16px;

        left: 16px;

        z-index: 5;

        background:
            rgba(11,37,69,0.88);

        color: #ffffff;

        padding:
            6px 10px;

        border-radius: 50px;

        font-size: 10px;

        font-weight: 700;

        letter-spacing: 0.3px;

        backdrop-filter: blur(5px);
    }


    /* =========================================================
       BODY CARD
    ========================================================= */

    .pegawai-body {

        padding:
            20px 17px 22px;

        flex-grow: 1;

        display: flex;

        flex-direction: column;

        align-items: center;

        justify-content: center;
    }


    /* =========================================================
       NAMA
    ========================================================= */

    .pegawai-name {

        font-size: 16px;

        font-weight: 800;

        color: var(--primary);

        line-height: 1.4;

        margin-bottom: 7px;
    }


    /* =========================================================
       JABATAN / MAPEL
    ========================================================= */

    .pegawai-position {

        display: inline-block;

        padding:
            6px 12px;

        border-radius: 50px;

        background:
            var(--accent-light);

        color:
            var(--accent-dark);

        font-size: 11.5px;

        font-weight: 700;

        line-height: 1.4;
    }


    /* =========================================================
       NIP
    ========================================================= */

    .pegawai-nip {

        font-size: 11px;

        color: #94a3b8;

        margin-top: 8px;

        font-weight: 500;
    }


    /* =========================================================
       CARD KOSONG
    ========================================================= */

    .pegawai-kosong {

        grid-column:
            1 / -1;

        text-align: center;

        padding:
            70px 20px;

        background: #ffffff;

        border:
            1px dashed
            #cbd5e1;

        border-radius: 22px;

        color: var(--text-muted);

        box-shadow:
            0 8px 20px
            rgba(11,37,69,0.03);
    }


    .pegawai-kosong-icon {

        width: 65px;

        height: 65px;

        margin:
            0 auto 15px;

        border-radius: 50%;

        background:
            var(--accent-light);

        color:
            var(--accent);

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 28px;
    }


    .pegawai-kosong p {

        font-size: 14px;

        line-height: 1.6;
    }


    /* =========================================================
       RESPONSIVE TABLET
    ========================================================= */

    @media (max-width: 900px) {

        .pegawai-grid {

            grid-template-columns:
                repeat(
                    3,
                    minmax(0, 1fr)
                );

            gap: 20px;
        }

    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 768px) {

        .guru-hero {

            min-height: 320px;

            padding:
                50px 18px;
        }


        .guru-hero-card {

            padding:
                30px 24px;
        }


        .guru-hero-card h1 {

            font-size: 29px;
        }


        .guru-section {

            padding:
                45px 18px
                65px;
        }


        .guru-section-header h2 {

            font-size: 27px;
        }


        .pegawai-grid {

            grid-template-columns:
                repeat(
                    2,
                    minmax(0, 1fr)
                );

            gap: 16px;
        }


        .pegawai-img-wrap {

            height: 215px;
        }

    }


    /* =========================================================
       RESPONSIVE HP
    ========================================================= */

    @media (max-width: 520px) {

        .guru-hero-card {

            padding:
                26px 20px;
        }


        .guru-hero-card h1 {

            font-size: 25px;
        }


        .guru-hero-card p {

            font-size: 13px;
        }


        .guru-watermark span {

            letter-spacing: 8px;
        }


        .guru-section-header h2 {

            font-size: 24px;
        }


        .pegawai-grid {

            grid-template-columns: 1fr;
        }


        .pegawai-img-wrap {

            height: 270px;
        }


        .pegawai-name {

            font-size: 17px;
        }

    }


    /* Menghormati pengguna dengan pengaturan "reduce motion" */

    @media (prefers-reduced-motion: reduce) {

        .pegawai-img-wrap img { animation: none !important; }
        .guru-watermark span { animation: none !important; }

        .pegawai-card.reveal {
            opacity: 1;
            transform: none;
        }

    }

</style>
@endsection



@section('content')


{{-- =========================================================
   HERO
========================================================= --}}

<section class="guru-hero">


    {{-- WATERMARK --}}

    <div class="guru-watermark">

        <span>
            SMK N 1 CIJATI
        </span>

    </div>



    {{-- HERO CARD --}}

    <div class="guru-hero-card">


        {{-- BREADCRUMB --}}

        <div class="guru-breadcrumb">

            <a href="{{ route('beranda') }}">
                Beranda
            </a>

            &nbsp;/&nbsp;

            Guru & Pegawai

        </div>



        {{-- TITLE --}}

        <h1>
            Pegawai &amp; Guru
        </h1>



        <p>
            Dewan Guru dan Tenaga Kependidikan
            SMK Negeri 1 Cijati yang berperan dalam
            mendukung proses pendidikan dan kegiatan
            sekolah.
        </p>


    </div>

</section>



{{-- =========================================================
   SECTION GURU
========================================================= --}}

<section class="guru-section">


    {{-- =====================================================
       HEADER
    ====================================================== --}}

    <div class="guru-section-header">


        <div class="guru-eyebrow">

            👨‍🏫 Guru &amp; Staf

        </div>


        <h2>
            Dewan Guru &amp; Tenaga Kependidikan
        </h2>


        <div class="guru-divider"></div>



    </div>



    {{-- =====================================================
       GRID
    ====================================================== --}}

    <div class="pegawai-grid">


        @forelse ($gurus as $guru)


            @php

                /*
                |--------------------------------------------------------------------------
                | FOTO GURU
                |--------------------------------------------------------------------------
                */

                $fotoUrl = null;


                if (!empty($guru->foto)) {


                    /*
                    |--------------------------------------------------------------------------
                    | 1. FOTO DI PUBLIC
                    |--------------------------------------------------------------------------
                    */

                    if (
                        file_exists(
                            public_path($guru->foto)
                        )
                    ) {

                        $fotoUrl =
                            asset($guru->foto);

                    }


                    /*
                    |--------------------------------------------------------------------------
                    | 2. FOTO DI PUBLIC/STORAGE
                    |--------------------------------------------------------------------------
                    */

                    elseif (
                        file_exists(
                            public_path(
                                'storage/' .
                                $guru->foto
                            )
                        )
                    ) {

                        $fotoUrl =
                            asset(
                                'storage/' .
                                $guru->foto
                            );

                    }


                    /*
                    |--------------------------------------------------------------------------
                    | 3. FOTO DI STORAGE/APP/PUBLIC
                    |--------------------------------------------------------------------------
                    */

                    elseif (
                        file_exists(
                            storage_path(
                                'app/public/' .
                                str_replace(
                                    'storage/',
                                    '',
                                    $guru->foto
                                )
                            )
                        )
                    ) {

                        $fotoUrl =
                            asset(
                                'storage/' .
                                str_replace(
                                    'storage/',
                                    '',
                                    $guru->foto
                                )
                            );

                    }

                }


                /*
                |--------------------------------------------------------------------------
                | FOTO DEFAULT
                |--------------------------------------------------------------------------
                */

                $defaultImage =
                    asset(
                        'images/image_c6c626.png'
                    );


                $finalImage =
                    $fotoUrl ??
                    $defaultImage;


                /*
                |--------------------------------------------------------------------------
                | DELAY BERTAHAP UNTUK ANIMASI REVEAL
                |--------------------------------------------------------------------------
                | $loop->index adalah nomor urut otomatis dari Laravel di dalam
                | @forelse (dimulai dari 0). Dibatasi modulo 10 supaya kalau
                | guru banyak, delay tidak jadi kelamaan.
                */

                $delayReveal = ($loop->index % 10) * 0.08;


            @endphp



            {{-- =================================================
               CARD GURU
            ================================================== --}}

            <article
                class="pegawai-card reveal"
                style="transition-delay: {{ $delayReveal }}s;"
            >


                {{-- BADGE --}}

                <div class="pegawai-badge">

                    Guru &amp; Staf

                </div>



                {{-- FOTO --}}

                <div class="pegawai-img-wrap">


                    <img
                        src="{{ $finalImage }}"
                        alt="{{ $guru->nama_guru ?? $guru->nama ?? 'Guru SMK Negeri 1 Cijati' }}"
                        loading="lazy"
                    >


                </div>



                {{-- BODY --}}

                <div class="pegawai-body">


                    {{-- NAMA --}}

                    <h3 class="pegawai-name">

                        {{ $guru->nama_guru ?? $guru->nama ?? 'Nama Guru' }}

                    </h3>



                    {{-- MAPEL / JABATAN --}}

                    <div class="pegawai-position">

                        {{ $guru->mapel ?? 'Tenaga Kependidikan' }}

                    </div>



                    {{-- NIP --}}

                    @if(!empty($guru->nip))

                        <div class="pegawai-nip">

                            NIP.
                            {{ $guru->nip }}

                        </div>

                    @endif


                </div>


            </article>


        @empty


            {{-- =================================================
               DATA KOSONG
            ================================================== --}}

            <div class="pegawai-kosong">


                <div class="pegawai-kosong-icon">

                    👨‍🏫

                </div>


                <p>

                    Belum ada data guru atau pegawai
                    yang diinput ke dalam database.

                </p>


            </div>


        @endforelse


    </div>


</section>

@endsection


@section('scripts')
<script>

    /* =====================================================
       REVEAL ANIMATION SAAT SCROLL — CARD GURU/PEGAWAI
       -----------------------------------------------------
       Menambahkan class "show" ke setiap .pegawai-card.reveal
       ketika card tersebut masuk ke area layar (viewport).
    ===================================================== */

    document.addEventListener('DOMContentLoaded', function () {

        const kartuGuru = document.querySelectorAll('.pegawai-card.reveal');

        if (kartuGuru.length === 0) {
            return;
        }

        if ('IntersectionObserver' in window) {

            const observerGuru = new IntersectionObserver(
                function (entries, observer) {

                    entries.forEach(function (entry) {

                        if (entry.isIntersecting) {

                            entry.target.classList.add('show');
                            observer.unobserve(entry.target);

                        }

                    });

                },
                { threshold: 0.12 }
            );

            kartuGuru.forEach(function (kartu) {
                observerGuru.observe(kartu);
            });

        } else {

            // Fallback untuk browser lama
            kartuGuru.forEach(function (kartu) {
                kartu.classList.add('show');
            });

        }

    });

</script>
@endsection