@extends('layouts.app')

@section('title', 'Agenda Sekolah - SMK Negeri 1 Cijati')

@section('styles')
<style>
    :root {
        --primary: #0B2545;
        --accent: #00A8B5;
        --accent-light: #e6f8fa;
        --bg-color: #f4f7fa;
        --card-bg: #ffffff;
        --text-main: #1E293B;
        --text-muted: #64748b;
        --border-color: #E2E8F0;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Plus Jakarta Sans', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        overflow-x: hidden;
    }


    /* =========================================================
       HERO
    ========================================================= */

    .hero-banner-v2 {
        position: relative;
        width: 100%;
        min-height: 340px;

        background:
            url("{{ asset('images/sekolah/poto.sekolah.jpeg') }}")
            center/cover no-repeat;

        background-size: 115%;

        display: flex;
        align-items: center;
        justify-content: center;

        overflow: hidden;
        padding: 60px 20px;

        animation: heroDriftAgenda 22s ease-in-out infinite alternate;
    }

    @keyframes heroDriftAgenda {
        0%   { background-position: 45% 40%; }
        100% { background-position: 55% 60%; }
    }

    .hero-banner-v2::before {
        content: '';
        position: absolute;
        inset: 0;

        background:
            linear-gradient(
                180deg,
                rgba(11, 37, 69, 0.85),
                rgba(11, 37, 69, 0.65) 60%,
                rgba(11, 37, 69, 0.85)
            );

        z-index: 1;
    }

    .hero-watermark {
        position: absolute;
        inset: 0;

        display: flex;
        align-items: center;
        justify-content: center;

        z-index: 2;
        pointer-events: none;
        overflow: hidden;
    }

    .hero-watermark span {
        font-size: clamp(60px, 12vw, 160px);
        font-weight: 900;

        color: rgba(255,255,255,0.06);

        letter-spacing: 18px;
        white-space: nowrap;

        display: inline-block;

        animation: watermarkPulseAgenda 8s ease-in-out infinite;
    }

    @keyframes watermarkPulseAgenda {
        0%, 100% { opacity: 1; transform: scale(1); }
        50%      { opacity: .6; transform: scale(1.02); }
    }

    .hero-card-v2 {
        position: relative;
        z-index: 3;

        background: rgba(11, 37, 69, 0.55);

        backdrop-filter: blur(10px);

        border: 1px solid rgba(255,255,255,0.12);

        border-radius: 24px;

        padding: 34px 46px;

        max-width: 680px;
        width: 100%;

        text-align: center;

        color: #ffffff;

        box-shadow:
            0 20px 50px rgba(0,0,0,0.25);
    }

    .hero-breadcrumb-v2 {
        font-size: 12.5px;
        font-weight: 700;

        letter-spacing: 0.5px;

        color: #CBD5E1;

        margin-bottom: 14px;
    }

    .hero-breadcrumb-v2 a {
        color: #E0F2FE;
        text-decoration: none;
    }

    .hero-breadcrumb-v2 a:hover {
        text-decoration: underline;
    }

    .hero-card-v2 h1 {
        font-size: 34px;
        font-weight: 800;

        margin-bottom: 14px;

        text-shadow:
            0 2px 6px rgba(0,0,0,0.3);
    }

    .hero-card-v2 p {
        font-size: 14.5px;

        color: #E2E8F0;

        line-height: 1.6;

        max-width: 520px;

        margin: 0 auto;
    }


    /* =========================================================
       SECTION AGENDA
    ========================================================= */

    .agenda-section {
        max-width: 1200px;

        margin: 0 auto;

        padding: 60px 24px 80px;

        background: var(--bg-color);
    }


    /* =========================================================
       HEADER AGENDA - TENGAH
    ========================================================= */

    .agenda-header {
        margin-bottom: 40px;

        text-align: center;
    }

    .agenda-header h2 {
        font-size: 30px;

        font-weight: 800;

        color: var(--primary);

        margin-bottom: 12px;
    }

    .agenda-header .divider {
        width: 60px;
        height: 4px;

        border-radius: 10px;

        background:
            linear-gradient(
                90deg,
                var(--primary),
                var(--accent)
            );

        margin: 0 auto 14px;
    }

    .agenda-header p {
        font-size: 14px;

        color: var(--text-muted);

        line-height: 1.6;

        text-align: center;
    }


    /* =========================================================
       GRID
    ========================================================= */

    .agenda-grid {
        display: grid;

        grid-template-columns:
            repeat(
                auto-fill,
                minmax(300px, 1fr)
            );

        gap: 28px;
    }


    /* =========================================================
       CARD AGENDA
    ========================================================= */

    .agenda-card {
        position: relative;

        background: var(--card-bg);

        border-radius: 22px;

        overflow: hidden;

        border: 1px solid var(--border-color);

        box-shadow:
            0 10px 25px rgba(11,37,69,0.05);

        transition:
            all 0.4s
            cubic-bezier(
                0.165,
                0.84,
                0.44,
                1
            );

        display: flex;

        flex-direction: column;

        min-height: 240px;

        /* --- SCROLL REVEAL (state awal) --- */
        opacity: 0;
        transform: translateY(40px);
    }

    .agenda-card.is-visible {
        opacity: 1;
        transform: translateY(0);
        transition:
            opacity .7s ease,
            transform .7s cubic-bezier(0.22, 1, 0.36, 1);
    }


    /* =========================================================
       GARIS ATAS CARD
    ========================================================= */

    .agenda-card::before {
        content: '';

        position: absolute;

        top: 0;
        left: 0;

        width: 100%;
        height: 6px;

        background:
            linear-gradient(
                90deg,
                var(--primary),
                var(--accent)
            );

        opacity: 0.8;

        z-index: 2;
    }


    .agenda-card:hover {
        transform: translateY(-8px);

        box-shadow:
            0 20px 40px
            rgba(0,168,181,0.15);

        border-color: var(--accent);
    }


    .agenda-card:hover::before {
        opacity: 1;
    }


    /* =========================================================
       BAGIAN TANGGAL
    ========================================================= */

    .agenda-date-area {
        padding: 28px 22px 18px;

        display: flex;

        align-items: center;

        gap: 16px;
    }


    .agenda-date-icon {
        width: 58px;
        height: 58px;

        flex-shrink: 0;

        border-radius: 16px;

        background:
            linear-gradient(
                135deg,
                var(--primary),
                #164d86
            );

        color: #ffffff;

        display: flex;

        flex-direction: column;

        justify-content: center;

        align-items: center;

        box-shadow:
            0 8px 18px
            rgba(11,37,69,0.18);

        transition: transform .35s ease;

        animation: dateIconFloat 3.6s ease-in-out infinite;
    }

    .agenda-grid .agenda-card:nth-child(2n) .agenda-date-icon {
        animation-delay: .5s;
    }

    .agenda-grid .agenda-card:nth-child(3n) .agenda-date-icon {
        animation-delay: 1s;
    }

    @keyframes dateIconFloat {
        0%, 100% { transform: translateY(0); }
        50%      { transform: translateY(-5px); }
    }

    .agenda-card:hover .agenda-date-icon {
        animation-play-state: paused;
        transform: scale(1.06);
    }


    .agenda-date-icon .day {
        font-size: 20px;

        line-height: 1;

        font-weight: 800;
    }


    .agenda-date-icon .month {
        font-size: 9px;

        font-weight: 700;

        text-transform: uppercase;

        margin-top: 4px;

        letter-spacing: 0.5px;
    }


    .agenda-date-text {
        color: var(--accent);

        font-size: 12px;

        font-weight: 700;
    }


    /* =========================================================
       ISI CARD
    ========================================================= */

    .agenda-content {
        padding: 0 22px 24px;

        display: flex;

        flex-direction: column;

        flex: 1;
    }


    .agenda-title {
        font-size: 17px;

        font-weight: 700;

        color: var(--primary);

        line-height: 1.4;

        margin-bottom: 10px;

        display: -webkit-box;

        -webkit-line-clamp: 2;

        -webkit-box-orient: vertical;

        overflow: hidden;
    }


    .agenda-description {
        font-size: 13.5px;

        color: var(--text-muted);

        line-height: 1.6;

        display: -webkit-box;

        -webkit-line-clamp: 3;

        -webkit-box-orient: vertical;

        overflow: hidden;

        flex: 1;
    }


    /* =========================================================
       EMPTY
    ========================================================= */

    .agenda-empty {
        grid-column: 1 / -1;

        text-align: center;

        padding: 70px 20px;

        background: #ffffff;

        border-radius: 22px;

        border: 1px dashed #cbd5e1;

        color: var(--text-muted);
    }


    .agenda-empty i {
        font-size: 42px;

        color: var(--accent);

        margin-bottom: 15px;
    }


    .agenda-empty p {
        font-size: 14px;
    }


    /* =========================================================
       PAGINATION
    ========================================================= */

    .pagination-wrapper {
        margin-top: 50px;

        display: flex;

        justify-content: center;
    }


    .pagination-wrapper nav {
        display: flex;

        justify-content: center;
    }


    .pagination-wrapper ul,
    .pagination-wrapper .flex {
        display: flex;

        align-items: center;

        gap: 6px;

        list-style: none;

        padding: 8px 16px;

        margin: 0;

        background: #f8fafc;

        border-radius: 50px;

        border: 1px solid #e2e8f0;

        box-shadow:
            0 8px 20px rgba(0,0,0,0.03);
    }


    .pagination-wrapper a,
    .pagination-wrapper span {
        display: inline-flex;

        align-items: center;

        justify-content: center;

        min-width: 36px;

        height: 36px;

        padding: 0 10px;

        border-radius: 50px;

        font-size: 0.88rem;

        font-weight: 700;

        text-decoration: none;

        background: transparent;

        color: var(--primary);

        transition: all 0.3s ease;
    }


    .pagination-wrapper .active span,
    .pagination-wrapper span[aria-current="page"] {
        background: var(--accent);

        color: #ffffff;

        box-shadow:
            0 4px 14px
            rgba(0,168,181,0.35);
    }


    .pagination-wrapper a:hover {
        background: var(--accent-light);

        color: var(--accent);

        transform: translateY(-2px);
    }


    .pagination-wrapper svg {
        width: 14px !important;
        height: 14px !important;

        fill: currentColor;
    }


    .pagination-wrapper .disabled span {
        background: transparent;

        color: #cbd5e1;

        cursor: not-allowed;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 768px) {

        .agenda-grid {
            grid-template-columns: repeat(
                2,
                minmax(0, 1fr)
            );
        }

        .hero-card-v2 {
            padding: 28px 25px;
        }

        .hero-card-v2 h1 {
            font-size: 28px;
        }

        .agenda-header h2 {
            font-size: 27px;
        }
    }


    @media (max-width: 600px) {

        .agenda-grid {
            grid-template-columns: 1fr;
        }

        .agenda-section {
            padding: 45px 18px 60px;
        }

        .agenda-header h2 {
            font-size: 24px;
        }

        .hero-card-v2 h1 {
            font-size: 26px;
        }

        .hero-watermark span {
            letter-spacing: 10px;
        }
    }


    /* =========================================================
       HORMATI PENGGUNA REDUCE MOTION
    ========================================================= */

    @media (prefers-reduced-motion: reduce) {

        .hero-banner-v2,
        .hero-watermark span,
        .agenda-date-icon {
            animation: none !important;
        }

        .agenda-card {
            opacity: 1 !important;
            transform: none !important;
            transition: none !important;
        }
    }
</style>
@endsection


@section('content')


{{-- =========================================================
   HERO
========================================================= --}}

<div class="hero-banner-v2">

    <div class="hero-watermark">
        <span>SMK N 1 CIJATI</span>
    </div>


    <div class="hero-card-v2">

        <div class="hero-breadcrumb-v2">

            <a href="{{ route('beranda') }}">
                Beranda
            </a>

            / Agenda

        </div>


        <h1>
            Agenda Sekolah
        </h1>


        <p>
            Informasi jadwal kegiatan dan acara penting
            di SMK Negeri 1 Cijati.
        </p>

    </div>

</div>



{{-- =========================================================
   SECTION AGENDA
========================================================= --}}

<section class="agenda-section">


    {{-- =====================================================
       HEADER
    ====================================================== --}}

    <div class="agenda-header">

        <h2>
            Agenda Sekolah
        </h2>

        <div class="divider"></div>

        <p>
            Jadwal kegiatan dan acara terbaru
            SMK Negeri 1 Cijati.
        </p>

    </div>



    {{-- =====================================================
       GRID AGENDA
    ====================================================== --}}

    <div class="agenda-grid">


        @forelse($agendas as $agenda)

            @php

                /*
                |--------------------------------------------------------------------------
                | JUDUL
                |--------------------------------------------------------------------------
                */

                $judulAgenda =
                    $agenda->judul
                    ?? $agenda->nama_agenda
                    ?? 'Agenda Sekolah';


                /*
                |--------------------------------------------------------------------------
                | TANGGAL
                |--------------------------------------------------------------------------
                */

                $tanggalAgenda =
                    $agenda->tanggal
                    ?? $agenda->created_at
                    ?? null;


                /*
                |--------------------------------------------------------------------------
                | DESKRIPSI
                |--------------------------------------------------------------------------
                */

                $deskripsiAgenda =
                    $agenda->deskripsi
                    ?? $agenda->konten
                    ?? $agenda->isi
                    ?? '';

            @endphp



            {{-- =================================================
               CARD
            ================================================== --}}

            <article
                class="agenda-card"
                data-reveal
                style="transition-delay: {{ ($loop->index % 3) * 0.12 }}s;"
            >


                {{-- ================================
                   TANGGAL
                ================================= --}}

                <div class="agenda-date-area">


                    @if($tanggalAgenda)

                        @php
                            $tanggalCarbon =
                                \Carbon\Carbon::parse($tanggalAgenda);
                        @endphp


                        <div class="agenda-date-icon">

                            <span class="day">
                                {{ $tanggalCarbon->format('d') }}
                            </span>

                            <span class="month">
                                {{ $tanggalCarbon->translatedFormat('M') }}
                            </span>

                        </div>


                        <div class="agenda-date-text">

                            <i class="fa-regular fa-calendar"></i>

                            {{ $tanggalCarbon->translatedFormat('d F Y') }}

                        </div>

                    @else

                        <div class="agenda-date-icon">

                            <i class="fa-regular fa-calendar"></i>

                        </div>

                        <div class="agenda-date-text">
                            Agenda Sekolah
                        </div>

                    @endif


                </div>



                {{-- ================================
                   CONTENT
                ================================= --}}

                <div class="agenda-content">


                    <h3 class="agenda-title">

                        {{ $judulAgenda }}

                    </h3>



                    @if($deskripsiAgenda)

                        <p class="agenda-description">

                            {{ \Illuminate\Support\Str::limit(
                                strip_tags($deskripsiAgenda),
                                160
                            ) }}

                        </p>

                    @else

                        <p class="agenda-description">

                            Informasi kegiatan
                            SMK Negeri 1 Cijati.

                        </p>

                    @endif


                </div>


            </article>


        @empty


            <div class="agenda-empty">

                <i class="fa-regular fa-calendar"></i>

                <p>
                    Belum ada agenda sekolah saat ini.
                </p>

            </div>


        @endforelse


    </div>



    {{-- =========================================================
       PAGINATION
    ========================================================== --}}

    @if(method_exists($agendas, 'links'))

        <div class="pagination-wrapper">

            {{ $agendas->links() }}

        </div>

    @endif


</section>

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
        threshold: 0.15,
        rootMargin: '0px 0px -40px 0px'
    });

    reveals.forEach(function (el) {
        observer.observe(el);
    });
});
</script>

@endsection