@extends('layouts.app')

@section('title', 'Beranda - SMK Negeri 1 Cijati')


{{-- =========================================================
    DATA BERANDA
========================================================= --}}

@php

    /* =====================================================
       BANNER SEKOLAH
    ===================================================== */

    $kandidatBannerSekolah = [
        'images/sekolah/sekolah.jpg.png',
        'images/sekolah/sekolah.jpg',
        'images/sekolah/rpl.jpeg',
    ];

    $bannerUtama = null;

    foreach ($kandidatBannerSekolah as $path) {

        if (file_exists(public_path($path))) {
            $bannerUtama = asset($path);
            break;
        }
    }

    if (!$bannerUtama) {
        $bannerUtama = asset('images/image_c6c626.png');
    }


    /* =====================================================
       FOTO KEPALA SEKOLAH
    ===================================================== */

    $kepsekPath = 'images/kepalasekolah/kepalasekolah.png';

    if (!file_exists(public_path($kepsekPath))) {
        $kepsekPath = 'images/kepalasekolah/kepalasekolah.jpg';
    }

    $kepsekFoto =
        file_exists(public_path($kepsekPath))
        ? asset($kepsekPath)
        : asset('images/image_c6c626.png');


    /* =====================================================
       DATA GURU
    ===================================================== */

    $semuaGuru =
        class_exists(\App\Models\Guru::class)
        ? \App\Models\Guru::latest()->take(10)->get()
        : collect([]);


    /* =====================================================
       DATA BERITA DARI DATABASE
    ===================================================== */

    $semuaBerita =
        class_exists(\App\Models\Berita::class)
        ? \App\Models\Berita::latest()->take(8)->get()
        : collect([]);


    /* =====================================================
       DATA AGENDA DARI DATABASE
    ===================================================== */

    $agendaBeranda =
        class_exists(\App\Models\Agenda::class)
        ? \App\Models\Agenda::latest()->take(5)->get()
        : collect([]);


    /* =====================================================
       FUNCTION FOTO GURU
    ===================================================== */

    function fotoGuruBeranda($foto)
    {
        if (empty($foto)) {
            return asset('images/image_c6c626.png');
        }

        if (file_exists(public_path($foto))) {
            return asset($foto);
        }

        if (file_exists(public_path('storage/' . $foto))) {
            return asset('storage/' . $foto);
        }

        $namaFile = str_replace('storage/', '', $foto);

        if (
            file_exists(
                storage_path('app/public/' . $namaFile)
            )
        ) {
            return asset('storage/' . $namaFile);
        }

        return asset('images/image_c6c626.png');
    }


    /* =====================================================
       FUNCTION FOTO BERITA
    ===================================================== */

    function fotoBeritaBeranda($foto)
    {
        if (empty($foto)) {
            return asset('images/image_c6c626.png');
        }

        if (file_exists(public_path($foto))) {
            return asset($foto);
        }

        if (
            file_exists(
                public_path('storage/' . $foto)
            )
        ) {
            return asset('storage/' . $foto);
        }

        $namaFile = str_replace('storage/', '', $foto);

        if (
            file_exists(
                storage_path(
                    'app/public/' . $namaFile
                )
            )
        ) {
            return asset('storage/' . $namaFile);
        }

        return asset('images/image_c6c626.png');
    }

@endphp



@section('styles')

<style>

/* =========================================================
   ROOT
========================================================= */

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


/* =========================================================
   GENERAL
========================================================= */

* {
    box-sizing: border-box;
}

html {
    scroll-behavior: smooth;
}

body {
    overflow-x: hidden;
}


/* =========================================================
   HERO
========================================================= */

.hero-container {
    position: relative;
    min-height: 90vh;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    padding: 60px 24px;
    color: #fff;
    text-align: center;
    overflow: hidden;
    background: var(--navy);
}

.hero-slides {
    position: absolute;
    inset: 0;
    z-index: 0;
}

.hero-slide {
    position: absolute;
    inset: -20px;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    filter: blur(2px) saturate(.95);
    opacity: 0;
    transition: opacity 1.2s ease;
}

.hero-slide::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(160deg, rgba(11,37,69,.48), rgba(0,168,181,.28));
}

.hero-slide.active {
    opacity: 1;
}

.hero-content,
.hero-cards-grid,
.slider-arrow,
.hero-dots {
    position: relative;
    z-index: 2;
}

.hero-content {
    max-width: 850px;
    margin-top: 30px;
}

.hero-subtitle {
    font-size: 1.25rem;
    font-weight: 500;
    margin-bottom: 8px;
    color: #fff;
    text-shadow: 0 2px 8px rgba(0,0,0,.6);
}

.hero-title {
    font-size: 3.6rem;
    font-weight: 800;
    letter-spacing: 2px;
    margin-bottom: 22px;
    color: #fff;
    text-shadow: 0 4px 20px rgba(0,0,0,.5);
}

.hero-text {
    max-width: 650px;
    margin: 0 auto 28px;
    font-size: 1.05rem;
    color: #f1f5f9;
    line-height: 1.6;
    text-shadow: 0 2px 10px rgba(0,0,0,.6);
}


/* =========================================================
   HERO BUTTON
========================================================= */

.hero-buttons {
    display: flex;
    justify-content: center;
    gap: 14px;
    flex-wrap: wrap;
}

.btn-explore {
    background: #2563eb;
    color: #fff;
    padding: 12px 34px;
    border-radius: 8px;
    font-weight: 700;
    text-decoration: none;
    display: inline-block;
    box-shadow: 0 4px 15px rgba(37,99,235,.4);
    transition: .3s;
}

.btn-explore:hover {
    background: #1d4ed8;
    transform: translateY(-2px);
    color: #fff;
}

.btn-outline-hero {
    border: 2px solid #fff;
    color: #fff;
    font-weight: 600;
    padding: 10px 26px;
    border-radius: 8px;
    text-decoration: none;
    transition: .3s;
}

.btn-outline-hero:hover {
    background: #fff;
    color: var(--navy);
}


/* =========================================================
   HERO ARROW
========================================================= */

.slider-arrow {
    position: absolute;
    top: 40%;
    transform: translateY(-50%);
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background: rgba(255,255,255,.20);
    color: #fff;
    border: 1px solid rgba(255,255,255,.5);
    font-size: 1.4rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 10;
    transition: .3s;
}

.slider-arrow:hover {
    background: rgba(255,255,255,.4);
    transform: translateY(-50%) scale(1.05);
}

.slider-arrow.left { left: 24px; }
.slider-arrow.right { right: 24px; }


/* =========================================================
   HERO DOT
========================================================= */

.hero-dots {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin: 20px 0 10px;
}

.hero-dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: rgba(255,255,255,.5);
    border: none;
    cursor: pointer;
    padding: 0;
    transition: .3s;
}

.hero-dot.active {
    background: #fff;
    width: 26px;
    border-radius: 6px;
}


/* =========================================================
   HERO FEATURE CARD
========================================================= */

.hero-cards-grid {
    display: grid;
    grid-template-columns: repeat(3,1fr);
    gap: 24px;
    width: 100%;
    max-width: 1140px;
    margin-top: 40px;
    margin-bottom: -60px;
    z-index: 5;
}

.feature-card {
    background: rgba(255,255,255,.95);
    backdrop-filter: blur(12px);
    border-radius: 16px;
    padding: 30px 20px;
    text-align: center;
    color: #1e293b;
    box-shadow: 0 10px 30px rgba(0,0,0,.12);
    transition: .3s;
}

.feature-card:hover {
    transform: translateY(-5px);
}

.card-icon {
    width: 52px;
    height: 52px;
    margin: 0 auto 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #eff6ff;
    color: #2563eb;
    border-radius: 12px;
    font-size: 1.5rem;
}

.feature-card h3 {
    font-size: 1.15rem;
    margin-bottom: 8px;
    color: #0f172a;
}

.feature-card p {
    font-size: .88rem;
    color: #64748b;
    line-height: 1.5;
}


/* =========================================================
   GENERAL SECTION
========================================================= */

.section {
    max-width: 1160px;
    margin: 0 auto;
    padding: 80px 24px;
}

.section-header {
    text-align: center;
    margin-bottom: 45px;
}

.section-header h2 {
    font-size: 2.2rem;
    font-weight: 800;
    color: #1A4D62;
    margin-bottom: 8px;
}

.section-header .divider {
    width: 50px;
    height: 3px;
    background: var(--cyan);
    margin: 0 auto 14px;
    border-radius: 2px;
}

.section-header p {
    color: var(--ink-soft);
}


/* =========================================================
   SAMBUTAN
========================================================= */

.sambutan-section {
    background: #fff;
    border-top: 1px solid var(--line);
}

.sambutan-block {
    display: grid;
    grid-template-columns: 1.3fr .7fr;
    gap: 40px;
    align-items: center;
}

.sambutan-text h3 {
    font-size: 1.6rem;
    color: var(--navy);
    margin-bottom: 14px;
}

.sambutan-text p {
    color: var(--ink-soft);
    font-size: .95rem;
    line-height: 1.75;
    margin-bottom: 12px;
}


/* =========================================================
   KEPALA SEKOLAH
========================================================= */

.kepsek-card {
    background: #fff;
    border-radius: 18px;
    padding: 20px;
    text-align: center;
    box-shadow: 0 12px 35px rgba(0,0,0,.08);
    border: 1px solid var(--line);
    transition: .3s;
}

.kepsek-card:hover {
    transform: translateY(-5px);
}

.kepsek-photo {
    width: 100%;
    height: 360px;
    border-radius: 14px;
    overflow: hidden;
    background: #f1f5f9;
    margin-bottom: 15px;
}

.kepsek-photo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center top;
}

.kepsek-card h3 {
    font-size: 1.1rem;
    color: var(--navy);
    margin: 12px 0 4px;
}

.kepsek-card span {
    font-size: .88rem;
    color: var(--cyan);
    font-weight: 600;
}


/* =========================================================
   JURUSAN
========================================================= */

.jurusan-section {
    background: var(--paper);
}

.jurusan-grid-container {
    display: grid;
    grid-template-columns: repeat(4,1fr);
    gap: 24px;
}

.jurusan-card-v2 {
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(0,0,0,.05);
    display: flex;
    flex-direction: column;
    text-decoration: none;
    transition: transform .25s ease, box-shadow .25s ease;
}

.jurusan-card-v2:hover {
    transform: translateY(-6px);
    box-shadow: 0 14px 32px rgba(0,0,0,.1);
}

.jurusan-banner {
    position: relative;
    height: 200px;
    background: #e2e8f0;
}

.jurusan-banner > img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.jurusan-badge-logo {
    position: absolute;
    bottom: -24px;
    left: 50%;
    transform: translateX(-50%);
    width: 56px;
    height: 56px;
    border-radius: 50%;
    background: #fff;
    box-shadow: 0 4px 12px rgba(0,0,0,.15);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 6px;
}

.jurusan-badge-logo img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.jurusan-body {
    padding: 38px 22px 24px;
    text-align: center;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.jurusan-body h3 {
    font-size: 1.15rem;
    color: #1A4D62;
    margin-bottom: 10px;
}

.jurusan-deskripsi {
    font-size: .85rem;
    color: var(--ink-soft);
    line-height: 1.6;
    margin-bottom: 16px;
}

.jurusan-link {
    margin-top: auto;
    font-size: .85rem;
    font-weight: 700;
    color: var(--cyan);
}


/* =========================================================
   REVEAL KHUSUS JURUSAN & STATISTIK (fade + scale + stagger)
   Class .reveal dasar (opacity/translateY) sudah didefinisikan
   di bagian ANIMASI di bawah. Di sini kita override supaya
   card jurusan & statistik punya efek scale tambahan supaya
   terasa lebih "hidup" dan estetik.
========================================================= */

.jurusan-card-v2.reveal,
.statistik-card.reveal {
    opacity: 0;
    transform: translateY(35px) scale(.94);
    transition:
        opacity .7s ease,
        transform .7s cubic-bezier(.22,1,.36,1);
}

.jurusan-card-v2.reveal.show,
.statistik-card.reveal.show {
    opacity: 1;
    transform: translateY(0) scale(1);
}


/* =========================================================
   STATISTIK
========================================================= */

.statistik-section {
    background: #fff;
    border-top: 1px solid var(--line);
}

.statistik-grid {
    display: grid;
    grid-template-columns: repeat(4,1fr);
    gap: 20px;
    margin-bottom: 20px;
}

.statistik-card {
    background: #fff;
    border-radius: 16px;
    padding: 24px 20px;
    text-align: center;
    border: 1px solid var(--line);
    box-shadow: 0 4px 20px rgba(0,0,0,.04);
    border-left: 5px solid var(--cyan);
    transition: transform .2s ease;
}

.statistik-card:hover {
    transform: translateY(-4px);
}

.statistik-number {
    font-size: 2rem;
    font-weight: 900;
    color: var(--navy);
    margin-bottom: 6px;
    display: inline-block;
}

/* Animasi "pop" saat angka statistik mulai menghitung naik */
.statistik-card.show .statistik-number {
    animation: popNumber .5s ease;
}

@keyframes popNumber {
    0%   { transform: scale(.6); }
    60%  { transform: scale(1.15); }
    100% { transform: scale(1); }
}

.statistik-label {
    font-size: .9rem;
    color: var(--ink-soft);
    font-weight: 600;
}

.statistik-center-row {
    display: flex;
    justify-content: center;
}

.statistik-center-row .statistik-card {
    width: 100%;
    max-width: 280px;
}


/* =========================================================
   BERITA + AGENDA
========================================================= */

.berita-agenda-section {
    background: #fff;
    border-top: 1px solid var(--line);
}

.berita-agenda-container {
    max-width: 1120px;
    margin: 0 auto;
}

.berita-agenda-header {
    text-align: center;
    margin-bottom: 40px;
}

.berita-agenda-header h2 {
    color: #1A4D62;
    font-size: 2.2rem;
    font-weight: 700;
    margin-bottom: 8px;
}

.berita-agenda-header .divider {
    width: 48px;
    height: 3px;
    background: var(--cyan);
    margin: 0 auto 14px;
    border-radius: 5px;
}

.berita-agenda-header p {
    color: var(--ink-soft);
    font-size: .95rem;
}

.berita-agenda-layout {
    display: grid;
    grid-template-columns: minmax(0, 3fr) minmax(270px, 1fr);
    gap: 35px;
    align-items: start;
}

.berita-home-area {
    min-width: 0;
}

.berita-home-title {
    font-size: 1.35rem;
    font-weight: 500;
    color: #1A4D62;
    margin: 0 0 20px 5px;
}


/* =========================================================
   CAROUSEL BERITA
========================================================= */

.berita-carousel-wrapper {
    position: relative;
    width: 100%;
    overflow: hidden;
    padding: 8px 4px 20px;
}

.berita-carousel {
    display: flex;
    gap: 20px;
    overflow-x: auto;
    overflow-y: hidden;
    scroll-behavior: smooth;
    scroll-snap-type: x mandatory;
    scrollbar-width: none;
    padding: 5px 5px 15px;
    cursor: grab;
}

.berita-carousel::-webkit-scrollbar {
    display: none;
}

.berita-carousel:active {
    cursor: grabbing;
}

.berita-home-card {
    flex: 0 0 calc(50% - 10px);
    min-width: 0;
    display: block;
    text-decoration: none;
    color: inherit;
    background: #ffffff;
    border-radius: 20px;
    overflow: hidden;
    border: 1px solid #e2e8f0;
    box-shadow: 0 8px 25px rgba(11, 37, 69, 0.07);
    scroll-snap-align: start;
    transition: all 0.35s ease;
}

.berita-home-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 18px 35px rgba(0, 168, 181, 0.16);
}

.berita-home-image {
    width: 100%;
    height: 185px;
    overflow: hidden;
    background: #eaf0f5;
    position: relative;
}

.berita-home-image img {
    width: 100%;
    height: 100%;
    display: block;
    object-fit: cover;
    object-position: center;
    transition: transform 0.5s ease;
}

.berita-home-card:hover .berita-home-image img {
    transform: scale(1.06);
}

.berita-home-body {
    padding: 20px;
}

.berita-home-date {
    display: block;
    font-size: 12px;
    font-weight: 700;
    color: #00A8B5;
    margin-bottom: 10px;
}

.berita-home-date i {
    margin-right: 5px;
}

.berita-home-body h3 {
    color: #0B2545;
    font-size: 17px;
    line-height: 1.45;
    font-weight: 800;
    margin: 0 0 10px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.berita-home-body p {
    color: #64748b;
    font-size: 13px;
    line-height: 1.7;
    margin: 0 0 15px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.berita-home-read {
    color: #00A8B5;
    font-size: 12.5px;
    font-weight: 800;
}

.berita-home-read i {
    margin-left: 5px;
    transition: margin-left 0.2s ease;
}

.berita-home-card:hover .berita-home-read i {
    margin-left: 9px;
}


/* =========================================================
   TOMBOL BERITA
========================================================= */

.berita-carousel-btn {
    position: absolute;
    top: 43%;
    transform: translateY(-50%);
    width: 38px;
    height: 38px;
    border-radius: 50%;
    border: 1px solid #dce5eb;
    background: rgba(255,255,255,.96);
    color: var(--navy);
    box-shadow: 0 5px 15px rgba(0,0,0,.12);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 5;
    transition: .3s;
}

.berita-carousel-btn:hover {
    background: var(--navy);
    color: #fff;
    transform: translateY(-50%) scale(1.08);
}

.berita-carousel-btn.left { left: 0; }
.berita-carousel-btn.right { right: 0; }


/* =========================================================
   DOT BERITA
========================================================= */

.berita-indicator {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 7px;
    margin: 3px 0 20px;
}

.berita-indicator-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #cbd5e1;
    transition: .3s;
}

.berita-indicator-dot.active {
    width: 25px;
    border-radius: 5px;
    background: var(--cyan);
}


/* =========================================================
   LIHAT SEMUA BERITA
========================================================= */

.berita-home-all {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    color: var(--cyan);
    text-decoration: none;
    font-size: .85rem;
    font-weight: 800;
    margin-left: 5px;
}

.berita-home-all:hover {
    color: var(--blue);
}


/* =========================================================
   AGENDA
========================================================= */

.agenda-home-area {
    border-left: 1px solid #dce5eb;
    padding-left: 28px;
}

.agenda-home-title {
    font-size: 1.35rem;
    font-weight: 500;
    color: #1A4D62;
    margin: 0 0 20px;
}

.agenda-home-list {
    display: flex;
    flex-direction: column;
    gap: 9px;
}

.agenda-pangandaran-card {
    display: flex;
    align-items: flex-start;
    gap: 8px;
    padding: 12px 12px;
    background: #fff;
    border-radius: 13px;
    border-left: 3px solid var(--cyan);
    box-shadow: 0 5px 14px rgba(0,0,0,.07);
    transition: .25s;
}

.agenda-pangandaran-card:hover {
    transform: translateX(4px);
    box-shadow: 0 8px 20px rgba(0,0,0,.10);
}

.agenda-pangandaran-content {
    min-width: 0;
}

.agenda-pangandaran-date {
    display: block;
    color: var(--cyan);
    font-size: .68rem;
    font-weight: 700;
    margin-bottom: 5px;
}

.agenda-pangandaran-title {
    color: var(--navy);
    font-size: .82rem;
    line-height: 1.35;
    margin: 0;
}

.agenda-pangandaran-description {
    color: var(--ink-soft);
    font-size: .72rem;
    line-height: 1.4;
    margin-top: 4px;
}

.agenda-home-all {
    display: flex;
    justify-content: flex-end;
    margin-top: 20px;
    color: var(--cyan);
    text-decoration: none;
    font-size: .82rem;
    font-weight: 800;
}

.agenda-home-all:hover {
    color: var(--blue);
}


/* =========================================================
   BERITA / AGENDA KOSONG
========================================================= */

.berita-kosong {
    background: var(--paper);
    border-radius: 15px;
    padding: 45px 20px;
    text-align: center;
    color: var(--ink-soft);
}

.agenda-kosong {
    background: var(--paper);
    border-radius: 14px;
    padding: 30px 15px;
    text-align: center;
    color: var(--ink-soft);
    font-size: .85rem;
}


/* =========================================================
   PEGAWAI
========================================================= */

.pegawai-section {
    background: #fff;
    border-top: 1px solid var(--line);
    overflow: hidden;
}

.kepsek-pegawai-card {
    width: 290px;
    margin: 0 auto 42px;
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    border: 1px solid var(--line);
    box-shadow: 0 12px 30px rgba(11,37,69,.1);
    text-align: center;
    transition: transform .5s ease, opacity .7s ease;
    opacity: 0;
    transform: translateY(45px);
}

.kepsek-pegawai-card.show {
    opacity: 1;
    transform: translateY(0);
}

.kepsek-pegawai-card:hover {
    transform: translateY(-7px);
    box-shadow: 0 18px 38px rgba(11,37,69,.15);
}

.kepsek-pegawai-img {
    width: 100%;
    height: 330px;
    overflow: hidden;
    background: #f1f5f9;
}

.kepsek-pegawai-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center top;
    transition: transform .5s ease;
}

.kepsek-pegawai-card:hover .kepsek-pegawai-img img {
    transform: scale(1.04);
}

.kepsek-pegawai-body {
    padding: 18px;
}

.kepsek-pegawai-body h4 {
    font-size: 1rem;
    color: var(--navy);
    margin: 0 0 6px;
}

.kepsek-pegawai-body p {
    color: var(--cyan);
    font-size: .82rem;
    font-weight: 700;
    margin: 0;
}


/* =========================================================
   CAROUSEL PEGAWAI
========================================================= */

.pegawai-carousel-wrapper {
    position: relative;
    max-width: 1160px;
    margin: 0 auto;
}

.pegawai-carousel {
    display: flex;
    gap: 22px;
    overflow-x: auto;
    overflow-y: hidden;
    scroll-behavior: smooth;
    scroll-snap-type: x mandatory;
    padding: 12px 12px 28px;
    scrollbar-width: none;
    cursor: grab;
}

.pegawai-carousel::-webkit-scrollbar {
    display: none;
}

.pegawai-carousel:active {
    cursor: grabbing;
}

.pegawai-carousel-card {
    flex: 0 0 250px;
    scroll-snap-align: center;
    background: #fff;
    border-radius: 18px;
    overflow: hidden;
    border: 1px solid var(--line);
    box-shadow: 0 8px 25px rgba(11,37,69,.08);
    text-align: center;
    transition: transform .35s ease, box-shadow .35s ease, opacity .7s ease;
    opacity: 0;
    transform: translateY(45px);
}

.pegawai-carousel-card.show {
    opacity: 1;
    transform: translateY(0);
}

.pegawai-carousel-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 18px 35px rgba(11,37,69,.15);
}

.pegawai-carousel-img {
    width: 100%;
    height: 280px;
    background: linear-gradient(135deg, #eef4f8, #dfeaf2);
    overflow: hidden;
}

.pegawai-carousel-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center top;
    display: block;
    transition: transform .5s ease;
}

.pegawai-carousel-card:hover .pegawai-carousel-img img {
    transform: scale(1.05);
}

.pegawai-carousel-body {
    padding: 18px 15px 20px;
    min-height: 110px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.pegawai-carousel-body h4 {
    font-size: .98rem;
    line-height: 1.4;
    color: var(--navy);
    margin: 0 0 6px;
}

.pegawai-carousel-body p {
    font-size: .82rem;
    color: var(--cyan);
    font-weight: 700;
    margin: 0 0 5px;
}

.pegawai-carousel-body span {
    font-size: .76rem;
    color: var(--ink-soft);
    line-height: 1.4;
}

.pegawai-carousel-btn {
    position: absolute;
    top: 45%;
    transform: translateY(-50%);
    width: 45px;
    height: 45px;
    border-radius: 50%;
    border: 1px solid rgba(11,37,69,.1);
    background: rgba(255,255,255,.96);
    color: var(--navy);
    box-shadow: 0 6px 18px rgba(0,0,0,.12);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    cursor: pointer;
    z-index: 5;
    transition: .3s;
}

.pegawai-carousel-btn:hover {
    background: var(--navy);
    color: #fff;
    transform: translateY(-50%) scale(1.08);
}

.pegawai-carousel-btn.left { left: -18px; }
.pegawai-carousel-btn.right { right: -18px; }

.pegawai-carousel-indicator {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 7px;
    margin: 3px 0 0;
}

.pegawai-indicator-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #cbd5e1;
    transition: .3s;
}

.pegawai-indicator-dot.active {
    width: 25px;
    border-radius: 5px;
    background: var(--cyan);
}

.btn-pegawai-wrapper {
    display: flex;
    justify-content: center;
    margin-top: 35px;
}

.btn-pegawai {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    background: var(--navy);
    color: #fff;
    text-decoration: none;
    padding: 13px 30px;
    border-radius: 10px;
    font-size: .9rem;
    font-weight: 700;
    transition: .3s;
    box-shadow: 0 6px 18px rgba(11,37,69,.18);
}

.btn-pegawai:hover {
    background: var(--blue);
    color: #fff;
    transform: translateY(-3px);
}


/* =========================================================
   ANIMASI DASAR (REVEAL)
========================================================= */

.reveal {
    opacity: 0;
    transform: translateY(35px);
    transition: opacity .7s ease, transform .7s ease;
}

.reveal.show {
    opacity: 1;
    transform: translateY(0);
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 992px) {

    .hero-title { font-size: 2.5rem; }

    .hero-cards-grid {
        grid-template-columns: 1fr;
        margin-bottom: 0;
    }

    .jurusan-grid-container,
    .statistik-grid {
        grid-template-columns: repeat(2,1fr);
    }

    .sambutan-block {
        grid-template-columns: 1fr;
    }

    .berita-agenda-layout {
        grid-template-columns: 1fr;
    }

    .agenda-home-area {
        border-left: none;
        border-top: 1px solid #dce5eb;
        padding-left: 0;
        padding-top: 30px;
    }

    .agenda-home-list {
        display: grid;
        grid-template-columns: repeat(2,1fr);
    }
}


@media (max-width: 768px) {

    .hero-container {
        min-height: 90vh;
        padding: 50px 18px;
    }

    .hero-title { font-size: 2.2rem; }
    .hero-subtitle { font-size: 1.05rem; }
    .hero-text { font-size: .92rem; }

    .slider-arrow {
        width: 40px;
        height: 40px;
        font-size: 1.1rem;
    }

    .slider-arrow.left { left: 12px; }
    .slider-arrow.right { right: 12px; }

    .berita-home-card { flex: 0 0 85%; }
    .berita-home-image { height: 200px; }

    .pegawai-carousel-card { flex: 0 0 220px; }
    .pegawai-carousel-img { height: 260px; }

    .pegawai-carousel-btn.left { left: 5px; }
    .pegawai-carousel-btn.right { right: 5px; }

    .kepsek-pegawai-card { width: 260px; }
    .kepsek-pegawai-img { height: 300px; }

    .agenda-home-list { grid-template-columns: 1fr; }
}


@media (max-width: 576px) {

    .hero-title { font-size: 1.9rem; }

    .jurusan-grid-container,
    .statistik-grid {
        grid-template-columns: 1fr;
    }

    .hero-buttons {
        flex-direction: column;
        align-items: center;
    }

    .btn-explore,
    .btn-outline-hero {
        width: 100%;
        max-width: 280px;
    }

    .section { padding: 60px 18px; }

    .berita-home-card { flex: 0 0 88%; }
    .berita-home-image { height: 190px; }

    .pegawai-carousel-card { flex: 0 0 82%; }
    .pegawai-carousel-img { height: 300px; }

    .pegawai-carousel-btn {
        width: 38px;
        height: 38px;
    }

    .kepsek-pegawai-card { width: 85%; }

    .berita-home-body { padding: 17px; }
}

</style>

@endsection



@section('content')


{{-- =========================================================
   HERO
========================================================= --}}

<section
    class="hero-container"
    id="hero-slider"
>

    <div class="hero-slides">

        <div
            class="hero-slide active"
            style="background-image: url('{{ $bannerUtama }}');"
        ></div>

        <div
            class="hero-slide"
            style="background-image: url('{{
                file_exists(public_path('images/sekolah/upacar1.JPG'))
                ? asset('images/sekolah/upacar1.JPG')
                : $bannerUtama
            }}');"
        ></div>

        <div
            class="hero-slide"
            style="background-image: url('{{
                file_exists(public_path('images/sekolah/rpl.jpeg'))
                ? asset('images/sekolah/rpl.jpeg')
                : $bannerUtama
            }}');"
        ></div>

    </div>


    <button type="button" class="slider-arrow left" id="hero-prev" aria-label="Slide sebelumnya">
        &#10094;
    </button>

    <button type="button" class="slider-arrow right" id="hero-next" aria-label="Slide berikutnya">
        &#10095;
    </button>


    <div class="hero-content">

        <p class="hero-subtitle">
            Selamat Datang di Website Resmi
        </p>

        <h1 class="hero-title">
            SMK NEGERI 1 CIJATI
        </h1>

        <p class="hero-text">
            Mewujudkan generasi muda yang kompeten,
            berkarakter, dan siap menghadapi dunia kerja
            serta perkembangan teknologi.
        </p>

        <div class="hero-buttons">

            <a href="{{ route('profil') }}" class="btn-explore">
                Explore Now
            </a>

            <a href="#konsentrasi" class="btn-outline-hero">
                JELAJAHI SEKOLAH &rarr;
            </a>

        </div>

        <div class="hero-dots" id="hero-dots"></div>

    </div>


    <div class="hero-cards-grid">

        <div class="feature-card">
            <div class="card-icon">🎓</div>
            <h3>Lulusan Berkualitas</h3>
            <p>
                Kami mencetak lulusan berkualitas sesuai
                kebutuhan industri dengan program
                teaching factory.
            </p>
        </div>

        <div class="feature-card">
            <div class="card-icon">👥</div>
            <h3>Guru Berkompeten</h3>
            <p>
                Kami memiliki guru-guru berkompeten
                di bidangnya masing-masing untuk
                membimbing siswa.
            </p>
        </div>

        <div class="feature-card">
            <div class="card-icon">🧰</div>
            <h3>Fasilitas Lengkap</h3>
            <p>
                Kami memiliki fasilitas sarana yang
                lengkap untuk menunjang proses
                pembelajaran praktik dan teori.
            </p>
        </div>

    </div>

</section>



{{-- =========================================================
   SAMBUTAN KEPALA SEKOLAH
========================================================= --}}

<section class="section sambutan-section">

    <div class="sambutan-block">

        <div class="sambutan-text">

            <h3>SAMBUTAN KEPALA SEKOLAH</h3>

            <p>Assalamu'alaikum Warahmatullahi Wabarakatuh,</p>

            <p>
                Puji syukur kita panjatkan ke hadirat Allah SWT
                atas limpahan rahmat dan karunia-Nya, sehingga
                SMK Negeri 1 Cijati terus berkembang sebagai
                lembaga pendidikan vokasi yang unggul,
                berdaya saing, dan berorientasi pada kemajuan
                teknologi serta kebutuhan dunia kerja.
            </p>

            <p>
                Dalam era digitalisasi ini, kami berkomitmen
                untuk menghadirkan layanan pendidikan yang
                inovatif, berbasis teknologi, dan sesuai dengan
                perkembangan industri.
            </p>

            <p>
                Website ini kami hadirkan sebagai sarana
                informasi dan komunikasi bagi seluruh warga
                sekolah, orang tua, dunia usaha/industri,
                serta masyarakat luas.
            </p>

            <p>
                SMK Negeri 1 Cijati bertekad untuk mencetak
                lulusan yang tidak hanya memiliki kompetensi
                keahlian yang tinggi, tetapi juga memiliki
                karakter, kreativitas, dan daya saing global.
            </p>

            <p>Wassalamu'alaikum Warahmatullahi Wabarakatuh.</p>

        </div>

        <div class="kepsek-card">

            <div class="kepsek-photo">
                <img src="{{ $kepsekFoto }}" alt="Kepala Sekolah SMKN 1 Cijati">
            </div>

            <h3>A. RAHMAT DIMYATI, S.Pd., M.Pd.</h3>

            <span>KEPALA SEKOLAH</span>

        </div>

    </div>

</section>



{{-- =========================================================
   KONSENTRASI KEAHLIAN
========================================================= --}}

<section class="section jurusan-section" id="konsentrasi">

    <div class="section-header">
        <h2>Konsentrasi Keahlian</h2>
        <div class="divider"></div>
        <p>
            Program keahlian unggulan yang mendukung
            kompetensi dan kesiapan kerja
        </p>
    </div>


    @php

        $daftarJurusan = [

            [
                'kode' => 'RPL',
                'nama_tampil' => 'Rekayasa Perangkat Lunak',
                'logo' => 'images/jurusan/logojurusan/logo-pplg.jpeg',
                'banner' => 'images/lebjurusan/foto-leb-rpl.JPG',
                'deskripsi' => 'Membekali siswa dengan kompetensi pemrograman, pengembangan aplikasi web dan mobile, basis data, serta rekayasa perangkat lunak.'
            ],

            [
                'kode' => 'TKRO',
                'nama_tampil' => 'Teknik Kendaraan Ringan Otomotif',
                'logo' => 'images/jurusan/logojurusan/logo-tkr.jpeg',
                'banner' => 'images/lebjurusan/leb tkr.jpeg',
                'deskripsi' => 'Membekali siswa dengan kompetensi perawatan, perbaikan, dan overhaul mesin kendaraan ringan sesuai standar industri otomotif.'
            ],

            [
                'kode' => 'PEMASARAN',
                'nama_tampil' => 'Pemasaran',
                'logo' => 'images/jurusan/logojurusan/logo-pemasaran.jpeg',
                'banner' => 'images/lebjurusan/leb-bdp.JPG',
                'deskripsi' => 'Membekali siswa dengan kompetensi pemasaran, promosi digital, pengelolaan bisnis, dan strategi penjualan produk.'
            ],

            [
                'kode' => 'APHP',
                'nama_tampil' => 'Agribisnis Pengolahan Hasil Pertanian',
                'logo' => 'images/jurusan/logojurusan/logo-aphp.jpeg',
                'banner' => 'images/lebjurusan/leb aphp.JPG',
                'deskripsi' => 'Membekali siswa dengan kompetensi pengolahan, pengawasan mutu, dan pengemasan hasil pertanian menjadi produk bernilai jual tinggi.'
            ],

        ];

        $defaultLogo = 'images/image_c6c626.png';

    @endphp


    <div class="jurusan-grid-container">

        {{-- =====================================================
           PENTING: pakai "as $index => $j" (bukan cuma "as $j")
           supaya kita punya nomor urut untuk animasi bertahap
           (staggered) lewat transition-delay di bawah.
        ===================================================== --}}

        @foreach ($daftarJurusan as $index => $j)

            @php

                $logo =
                    file_exists(public_path($j['logo']))
                    ? asset($j['logo'])
                    : asset($defaultLogo);

                $jurusanBanner =
                    file_exists(public_path($j['banner']))
                    ? asset($j['banner'])
                    : $bannerUtama;

            @endphp

            {{-- =================================================
               class "reveal" + style transition-delay dibawah
               ini yang membuat card jurusan muncul satu-satu
               (fade + scale) saat halaman di-scroll ke section ini.
               Delay dihitung otomatis dari urutan index card.
            ================================================== --}}

            <a
                href="{{ route('jurusan.detail', $j['kode']) }}"
                class="jurusan-card-v2 reveal"
                style="transition-delay: {{ $index * 0.12 }}s;"
            >

                <div class="jurusan-banner">

                    <img src="{{ $jurusanBanner }}" alt="{{ $j['nama_tampil'] }}">

                    <div class="jurusan-badge-logo">
                        <img src="{{ $logo }}" alt="Logo {{ $j['nama_tampil'] }}">
                    </div>

                </div>

                <div class="jurusan-body">

                    <h3>{{ $j['nama_tampil'] }}</h3>

                    <p class="jurusan-deskripsi">
                        {{ $j['deskripsi'] }}
                    </p>

                    <span class="jurusan-link">
                        Selengkapnya &rarr;
                    </span>

                </div>

            </a>

        @endforeach

    </div>

</section>



{{-- =========================================================
   STATISTIK
========================================================= --}}

<section class="section statistik-section">

    <div class="section-header">
        <h2>Statistik Sekolah</h2>
        <div class="divider"></div>
        <p>Data singkat dan capaian sekolah</p>
    </div>


    {{-- =====================================================
       Setiap card diberi class "reveal" supaya fade+scale
       masuk saat discroll, dan "transition-delay" berbeda
       tiap card supaya muncul bertahap (staggered).

       Angka asli dipindah ke atribut data-target="..." dan
       teks yang tampil di awal diisi "0" — nanti dihitung
       naik otomatis oleh JavaScript (lihat @section scripts).
    ===================================================== --}}

    <div class="statistik-grid">

        <div class="statistik-card reveal" style="transition-delay: 0s;">
            <div class="statistik-number" data-target="4">0</div>
            <div class="statistik-label">Konsentrasi Keahlian</div>
        </div>

        <div class="statistik-card reveal" style="transition-delay: .12s;">
            <div class="statistik-number" data-target="52">0</div>
            <div class="statistik-label">Guru dan Tenaga Kependidikan</div>
        </div>

        <div class="statistik-card reveal" style="transition-delay: .24s;">
            <div class="statistik-number" data-target="20">0</div>
            <div class="statistik-label">Ruang Kelas</div>
        </div>

        <div class="statistik-card reveal" style="transition-delay: .36s;">
            <div class="statistik-number" data-target="4">0</div>
            <div class="statistik-label">Ruang Praktik Siswa</div>
        </div>

    </div>


    <div class="statistik-center-row">

        <div class="statistik-card reveal" style="transition-delay: .48s;">
            <div class="statistik-number" data-target="663">0</div>
            <div class="statistik-label">Jumlah Siswa</div>
        </div>

    </div>

</section>



{{-- =========================================================
   BERITA + AGENDA
========================================================= --}}

<section class="section berita-agenda-section">

    <div class="berita-agenda-container">

        <div class="berita-agenda-header">
            <h2>Berita &amp; Agenda Sekolah</h2>
            <div class="divider"></div>
            <p>Informasi dan kegiatan terkini SMKN 1 Cijati</p>
        </div>


        <div class="berita-agenda-layout">

            {{-- BERITA --}}

            <div class="berita-home-area">

                <h3 class="berita-home-title">Berita Terbaru</h3>

                @if($semuaBerita->count() > 0)

                    <div class="berita-carousel-wrapper">

                        <button type="button" class="berita-carousel-btn left" id="beritaPrev" aria-label="Berita sebelumnya">
                            &#10094;
                        </button>

                        <div class="berita-carousel" id="beritaCarousel">

                            @foreach($semuaBerita as $berita)

                                @php

                                    $fotoBerita = $berita->gambar ?? null;

                                    if (!empty($fotoBerita)) {

                                        if (\Illuminate\Support\Str::startsWith($fotoBerita, ['http://', 'https://'])) {
                                            $gambarBerita = $fotoBerita;
                                        }
                                        elseif (\Illuminate\Support\Str::startsWith($fotoBerita, 'images/')) {
                                            $gambarBerita = asset($fotoBerita);
                                        }
                                        else {
                                            $gambarBerita = asset('images/berita/' . $fotoBerita);
                                        }

                                    } else {
                                        $gambarBerita = asset('images/default.jpg');
                                    }

                                    $judulBerita = $berita->judul ?? 'Berita Sekolah';
                                    $tanggalBerita = $berita->created_at;
                                    $deskripsiBerita = $berita->konten ?? '';

                                @endphp

                                <a href="{{ route('berita') }}" class="berita-home-card reveal">

                                    <div class="berita-home-image">
                                        <img
                                            src="{{ $gambarBerita }}"
                                            alt="{{ $judulBerita }}"
                                            loading="lazy"
                                            onerror="this.onerror=null;this.src='{{ asset('images/default.jpg') }}';"
                                        >
                                    </div>

                                    <div class="berita-home-body">

                                        @if($tanggalBerita)
                                            <span class="berita-home-date">
                                                <i class="fa-regular fa-calendar"></i>
                                                {{ \Carbon\Carbon::parse($tanggalBerita)->translatedFormat('d F Y') }}
                                            </span>
                                        @endif

                                        <h3>{{ $judulBerita }}</h3>

                                        @if($deskripsiBerita)
                                            <p>
                                                {{ \Illuminate\Support\Str::limit(strip_tags($deskripsiBerita), 120) }}
                                            </p>
                                        @endif

                                        <span class="berita-home-read">
                                            Baca selengkapnya
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </span>

                                    </div>

                                </a>

                            @endforeach

                        </div>

                        <button type="button" class="berita-carousel-btn right" id="beritaNext" aria-label="Berita berikutnya">
                            &#10095;
                        </button>

                    </div>

                    <div class="berita-indicator" id="beritaIndicator"></div>

                    <a href="{{ route('berita') }}" class="berita-home-all">
                        <i class="fa-solid fa-arrow-right"></i>
                        Lihat Semua Berita
                    </a>

                @else

                    <div class="berita-kosong">
                        <i class="fa-regular fa-newspaper"></i>
                        <p>Belum ada berita sekolah.</p>
                    </div>

                @endif

            </div>


            {{-- AGENDA --}}

            <div class="agenda-home-area">

                <h3 class="agenda-home-title">Agenda Sekolah</h3>

                @if($agendaBeranda->count() > 0)

                    <div class="agenda-home-list">

                        @foreach($agendaBeranda as $item)

                            @php
                                $tanggalAgenda = $item->tanggal ?? $item->created_at ?? null;
                            @endphp

                            <div class="agenda-pangandaran-card reveal">

                                <div class="agenda-pangandaran-content">

                                    @if($tanggalAgenda)
                                        <span class="agenda-pangandaran-date">
                                            <i class="fa-regular fa-calendar"></i>
                                            {{ \Carbon\Carbon::parse($tanggalAgenda)->translatedFormat('d F Y') }}
                                        </span>
                                    @endif

                                    <h4 class="agenda-pangandaran-title">
                                        {{ $item->judul ?? 'Agenda Sekolah' }}
                                    </h4>

                                    @if(!empty($item->deskripsi))
                                        <p class="agenda-pangandaran-description">
                                            {{ \Illuminate\Support\Str::limit(strip_tags($item->deskripsi), 75) }}
                                        </p>
                                    @endif

                                </div>

                            </div>

                        @endforeach

                    </div>

                    <a href="{{ route('agenda') }}" class="agenda-home-all">
                        <span>Lihat Semua Agenda</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>

                @else

                    <div class="agenda-kosong">
                        <i class="fa-regular fa-calendar"></i>
                        <p>Belum ada agenda sekolah.</p>
                    </div>

                @endif

            </div>

        </div>

    </div>

</section>



{{-- =========================================================
   PEGAWAI & STAF PENDIDIK
========================================================= --}}

<section class="section pegawai-section" id="pegawai">

    <div class="section-header">
        <h2>Pegawai &amp; Staf Pendidik</h2>
        <div class="divider"></div>
        <p>Pendidik dan Tenaga Kependidikan SMKN 1 Cijati</p>
    </div>


    <div class="kepsek-pegawai-card reveal-pegawai">

        <div class="kepsek-pegawai-img">
            <img src="{{ $kepsekFoto }}" alt="A. Rahmat Dimyati, S.Pd., M.Pd.">
        </div>

        <div class="kepsek-pegawai-body">
            <h4>A. RAHMAT DIMYATI, S.Pd., M.Pd.</h4>
            <p>Kepala Sekolah</p>
        </div>

    </div>


    @if($semuaGuru->count() > 0)

        <div class="pegawai-carousel-wrapper">

            <button type="button" class="pegawai-carousel-btn left" id="pegawaiPrev" aria-label="Geser ke kiri">
                &#10094;
            </button>

            <div class="pegawai-carousel" id="pegawaiCarousel">

                @foreach($semuaGuru as $pegawai)

                    @php
                        $fotoPegawai = fotoGuruBeranda($pegawai->foto);
                    @endphp

                    <div class="pegawai-carousel-card reveal-pegawai">

                        <div class="pegawai-carousel-img">
                            <img src="{{ $fotoPegawai }}" alt="{{ $pegawai->nama_guru }}" loading="lazy">
                        </div>

                        <div class="pegawai-carousel-body">

                            <h4>{{ $pegawai->nama_guru }}</h4>

                            <p>{{ $pegawai->mapel ?? 'Guru' }}</p>

                            <span>
                                @if(!empty($pegawai->deskripsi))
                                    {{ $pegawai->deskripsi }}
                                @else
                                    Pendidik SMK Negeri 1 Cijati
                                @endif
                            </span>

                        </div>

                    </div>

                @endforeach

            </div>

            <button type="button" class="pegawai-carousel-btn right" id="pegawaiNext" aria-label="Geser ke kanan">
                &#10095;
            </button>

        </div>

        <div class="pegawai-carousel-indicator" id="pegawaiIndicator"></div>

    @else

        <div class="data-kosong">
            <p>Data guru belum tersedia.</p>
        </div>

    @endif


    <div class="btn-pegawai-wrapper">
        <a href="{{ route('profil.pegawai') }}" class="btn-pegawai">
            Lihat Selengkapnya
            <span>&rarr;</span>
        </a>
    </div>

</section>

@endsection



@section('scripts')

<script>

document.addEventListener("DOMContentLoaded", function () {


    /* =====================================================
       HERO SLIDER
    ===================================================== */

    const slides = document.querySelectorAll(".hero-slide");
    const dotsContainer = document.getElementById("hero-dots");
    const prevBtn = document.getElementById("hero-prev");
    const nextBtn = document.getElementById("hero-next");

    let currentIndex = 0;
    let slideInterval;

    if (slides.length > 0) {

        slides.forEach((_, index) => {

            const dot = document.createElement("button");
            dot.classList.add("hero-dot");

            if (index === 0) {
                dot.classList.add("active");
            }

            dot.setAttribute("aria-label", "Buka slide " + (index + 1));

            dot.addEventListener("click", function () {
                goToSlide(index);
                resetHeroTimer();
            });

            if (dotsContainer) {
                dotsContainer.appendChild(dot);
            }

        });

        const dots = document.querySelectorAll(".hero-dot");

        function updateSlider(index) {

            slides.forEach((slide, i) => {
                slide.classList.toggle("active", i === index);
            });

            dots.forEach((dot, i) => {
                dot.classList.toggle("active", i === index);
            });

        }

        function goToSlide(index) {
            currentIndex = (index + slides.length) % slides.length;
            updateSlider(currentIndex);
        }

        function nextSlide() {
            goToSlide(currentIndex + 1);
        }

        function prevSlide() {
            goToSlide(currentIndex - 1);
        }

        if (nextBtn) {
            nextBtn.addEventListener("click", function () {
                nextSlide();
                resetHeroTimer();
            });
        }

        if (prevBtn) {
            prevBtn.addEventListener("click", function () {
                prevSlide();
                resetHeroTimer();
            });
        }

        function startHeroTimer() {
            slideInterval = setInterval(nextSlide, 5000);
        }

        function resetHeroTimer() {
            clearInterval(slideInterval);
            startHeroTimer();
        }

        startHeroTimer();

    }



    /* =====================================================
       BERITA CAROUSEL
    ===================================================== */

    const beritaCarousel = document.getElementById("beritaCarousel");
    const beritaPrev = document.getElementById("beritaPrev");
    const beritaNext = document.getElementById("beritaNext");
    const beritaIndicator = document.getElementById("beritaIndicator");

    if (beritaCarousel) {

        const beritaCards = beritaCarousel.querySelectorAll(".berita-home-card");

        function jumlahBeritaTerlihat() {
            if (window.innerWidth <= 768) {
                return 1;
            }
            return 2;
        }

        function getBeritaScrollAmount() {

            const card = beritaCarousel.querySelector(".berita-home-card");

            if (!card) {
                return 300;
            }

            const style = window.getComputedStyle(beritaCarousel);
            const gap = parseFloat(style.columnGap || style.gap || 20);

            return card.offsetWidth + gap;

        }

        if (beritaIndicator && beritaCards.length > 0) {

            const jumlahSlide = Math.max(
                1,
                Math.ceil(beritaCards.length / jumlahBeritaTerlihat())
            );

            for (let i = 0; i < jumlahSlide; i++) {

                const dot = document.createElement("span");
                dot.classList.add("berita-indicator-dot");

                if (i === 0) {
                    dot.classList.add("active");
                }

                beritaIndicator.appendChild(dot);

            }

        }

        function updateBeritaIndicator() {

            if (!beritaIndicator) {
                return;
            }

            const dots = beritaIndicator.querySelectorAll(".berita-indicator-dot");

            if (dots.length === 0) {
                return;
            }

            const amount = getBeritaScrollAmount();

            let index = Math.round(beritaCarousel.scrollLeft / amount);
            index = Math.max(0, Math.min(index, dots.length - 1));

            dots.forEach((dot, i) => {
                dot.classList.toggle("active", i === index);
            });

        }

        if (beritaNext) {

            beritaNext.addEventListener("click", function () {

                const maksimal = beritaCarousel.scrollWidth - beritaCarousel.clientWidth;

                if (beritaCarousel.scrollLeft >= maksimal - 10) {
                    beritaCarousel.scrollTo({ left: 0, behavior: "smooth" });
                } else {
                    beritaCarousel.scrollBy({ left: getBeritaScrollAmount(), behavior: "smooth" });
                }

            });

        }

        if (beritaPrev) {

            beritaPrev.addEventListener("click", function () {

                if (beritaCarousel.scrollLeft <= 10) {
                    beritaCarousel.scrollTo({ left: beritaCarousel.scrollWidth, behavior: "smooth" });
                } else {
                    beritaCarousel.scrollBy({ left: -getBeritaScrollAmount(), behavior: "smooth" });
                }

            });

        }

        beritaCarousel.addEventListener("scroll", updateBeritaIndicator);

        let beritaAutoSlide;

        function mulaiBeritaAutoSlide() {

            if (beritaCards.length <= 2) {
                return;
            }

            clearInterval(beritaAutoSlide);

            beritaAutoSlide = setInterval(function () {

                const maksimal = beritaCarousel.scrollWidth - beritaCarousel.clientWidth;

                if (beritaCarousel.scrollLeft >= maksimal - 10) {
                    beritaCarousel.scrollTo({ left: 0, behavior: "smooth" });
                } else {
                    beritaCarousel.scrollBy({ left: getBeritaScrollAmount(), behavior: "smooth" });
                }

            }, 4500);

        }

        function berhentiBeritaAutoSlide() {
            clearInterval(beritaAutoSlide);
        }

        mulaiBeritaAutoSlide();

        beritaCarousel.addEventListener("mouseenter", berhentiBeritaAutoSlide);
        beritaCarousel.addEventListener("mouseleave", mulaiBeritaAutoSlide);

        let sedangDragBerita = false;
        let posisiAwalBerita = 0;
        let scrollAwalBerita = 0;

        beritaCarousel.addEventListener("mousedown", function (e) {

            sedangDragBerita = true;
            beritaCarousel.style.cursor = "grabbing";
            posisiAwalBerita = e.pageX - beritaCarousel.offsetLeft;
            scrollAwalBerita = beritaCarousel.scrollLeft;
            berhentiBeritaAutoSlide();

        });

        beritaCarousel.addEventListener("mouseup", function () {

            sedangDragBerita = false;
            beritaCarousel.style.cursor = "grab";
            mulaiBeritaAutoSlide();

        });

        beritaCarousel.addEventListener("mouseleave", function () {

            if (!sedangDragBerita) {
                return;
            }

            sedangDragBerita = false;
            beritaCarousel.style.cursor = "grab";
            mulaiBeritaAutoSlide();

        });

        beritaCarousel.addEventListener("mousemove", function (e) {

            if (!sedangDragBerita) {
                return;
            }

            e.preventDefault();

            const posisiSekarang = e.pageX - beritaCarousel.offsetLeft;
            const jarak = (posisiSekarang - posisiAwalBerita) * 1.2;

            beritaCarousel.scrollLeft = scrollAwalBerita - jarak;

        });

    }



    /* =====================================================
       CAROUSEL PEGAWAI
    ===================================================== */

    const carousel = document.getElementById("pegawaiCarousel");
    const pegawaiPrev = document.getElementById("pegawaiPrev");
    const pegawaiNext = document.getElementById("pegawaiNext");
    const indicator = document.getElementById("pegawaiIndicator");

    if (carousel) {

        const cards = carousel.querySelectorAll(".pegawai-carousel-card");

        function getScrollAmount() {

            const card = carousel.querySelector(".pegawai-carousel-card");

            if (!card) {
                return 270;
            }

            return card.offsetWidth + 22;

        }

        if (pegawaiNext) {

            pegawaiNext.addEventListener("click", function () {
                carousel.scrollBy({ left: getScrollAmount(), behavior: "smooth" });
            });

        }

        if (pegawaiPrev) {

            pegawaiPrev.addEventListener("click", function () {
                carousel.scrollBy({ left: -getScrollAmount(), behavior: "smooth" });
            });

        }

        if (indicator && cards.length > 0) {

            const jumlahDot = Math.max(1, Math.ceil(cards.length / 4));

            for (let i = 0; i < jumlahDot; i++) {

                const dot = document.createElement("span");
                dot.classList.add("pegawai-indicator-dot");

                if (i === 0) {
                    dot.classList.add("active");
                }

                indicator.appendChild(dot);

            }

        }

        const dots = document.querySelectorAll(".pegawai-indicator-dot");

        carousel.addEventListener("scroll", function () {

            if (cards.length === 0 || dots.length === 0) {
                return;
            }

            const posisi = carousel.scrollLeft;
            const ukuran = getScrollAmount();

            let index = Math.round(posisi / ukuran);
            index = Math.min(index, dots.length - 1);

            dots.forEach((dot, i) => {
                dot.classList.toggle("active", i === index);
            });

        });

        let autoSlide;

        function mulaiAutoSlide() {

            if (cards.length <= 1) {
                return;
            }

            autoSlide = setInterval(function () {

                const maksimalScroll = carousel.scrollWidth - carousel.clientWidth;

                if (carousel.scrollLeft >= maksimalScroll - 10) {
                    carousel.scrollTo({ left: 0, behavior: "smooth" });
                } else {
                    carousel.scrollBy({ left: getScrollAmount(), behavior: "smooth" });
                }

            }, 3500);

        }

        function berhentiAutoSlide() {
            clearInterval(autoSlide);
        }

        mulaiAutoSlide();

        carousel.addEventListener("mouseenter", berhentiAutoSlide);
        carousel.addEventListener("mouseleave", mulaiAutoSlide);

        let sedangDrag = false;
        let posisiAwal = 0;
        let scrollAwal = 0;

        carousel.addEventListener("mousedown", function (e) {

            sedangDrag = true;
            carousel.style.cursor = "grabbing";
            posisiAwal = e.pageX - carousel.offsetLeft;
            scrollAwal = carousel.scrollLeft;
            berhentiAutoSlide();

        });

        carousel.addEventListener("mouseup", function () {

            sedangDrag = false;
            carousel.style.cursor = "grab";
            mulaiAutoSlide();

        });

        carousel.addEventListener("mouseleave", function () {

            if (!sedangDrag) {
                return;
            }

            sedangDrag = false;
            carousel.style.cursor = "grab";
            mulaiAutoSlide();

        });

        carousel.addEventListener("mousemove", function (e) {

            if (!sedangDrag) {
                return;
            }

            e.preventDefault();

            const posisiSekarang = e.pageX - carousel.offsetLeft;
            const jarak = (posisiSekarang - posisiAwal) * 1.2;

            carousel.scrollLeft = scrollAwal - jarak;

        });

    }



    /* =====================================================
       COUNTER ANGKA STATISTIK
       -----------------------------------------------------
       Fungsi ini yang membuat angka statistik (mis. 663)
       "menghitung naik" dari 0 ke angka aslinya saat pertama
       kali terlihat di layar (bukan langsung muncul angka
       jadi begitu saja).
    ===================================================== */

    function animasiHitungAngka(elemen) {

        const target = parseInt(elemen.dataset.target, 10) || 0;
        const durasi = 1200; // ms
        const mulai = performance.now();

        function langkah(sekarang) {

            const progress = Math.min((sekarang - mulai) / durasi, 1);

            // easing halus (ease-out) supaya di akhir melambat
            const eased = 1 - Math.pow(1 - progress, 3);

            const nilaiSekarang = Math.floor(eased * target);

            elemen.textContent = nilaiSekarang;

            if (progress < 1) {
                requestAnimationFrame(langkah);
            } else {
                elemen.textContent = target;
            }

        }

        requestAnimationFrame(langkah);

    }


    const statistikCards = document.querySelectorAll(".statistik-card");

    if (statistikCards.length > 0 && "IntersectionObserver" in window) {

        const statistikObserver = new IntersectionObserver(
            function (entries, observer) {

                entries.forEach(function (entry) {

                    if (entry.isIntersecting) {

                        const angka = entry.target.querySelector(".statistik-number");

                        if (angka && !angka.dataset.sudahJalan) {

                            angka.dataset.sudahJalan = "true";
                            animasiHitungAngka(angka);

                        }

                        observer.unobserve(entry.target);

                    }

                });

            },
            { threshold: 0.3 }
        );

        statistikCards.forEach(function (card) {
            statistikObserver.observe(card);
        });

    }



    /* =====================================================
       ANIMASI SCROLL (REVEAL UMUM)
       -----------------------------------------------------
       Observer ini menangani semua elemen dengan class
       .reveal / .reveal-pegawai, termasuk card jurusan dan
       statistik yang sudah ditambahkan class "reveal" di
       Blade — sehingga fade + scale otomatis berjalan saat
       elemen masuk ke area layar.
    ===================================================== */

    const revealElements = document.querySelectorAll(".reveal, .reveal-pegawai");

    if ("IntersectionObserver" in window) {

        const observer = new IntersectionObserver(
            function (entries, observer) {

                entries.forEach(function (entry) {

                    if (entry.isIntersecting) {

                        entry.target.classList.add("show");
                        observer.unobserve(entry.target);

                    }

                });

            },
            { threshold: 0.12 }
        );

        revealElements.forEach(function (element) {
            observer.observe(element);
        });

    } else {

        revealElements.forEach(function (element) {
            element.classList.add("show");
        });

    }

});

</script>

@endsection