@extends('layouts.app')

@section('title', 'Galeri Sekolah - SMK Negeri 1 Cijati')

@section('styles')
<style>
    :root {
        --primary: #0B2545;
        --accent: #00A8B5;
        --accent-glow: rgba(0, 168, 181, 0.2);
        --bg-color: #f4f7fa;
        --card-bg: #ffffff;
        --text-main: #1E293B;
        --text-muted: #64748B;
        --border-color: #E2E8F0;
    }

    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
        font-family: 'Plus Jakarta Sans', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        overflow-x: hidden;
    }

    /* ============================================================
       HERO BANNER — GAYA SAMA SEPERTI HALAMAN PROFIL SEKOLAH
    ============================================================ */

    .hero-banner-v2 {
        position: relative;
        width: 100%;
        min-height: 340px;
        background: url("{{ asset('images/sekolah/poto.sekolah.jpeg') }}") center/cover no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        padding: 60px 20px;
    }

    .hero-banner-v2::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(11, 37, 69, 0.85), rgba(11, 37, 69, 0.65) 60%, rgba(11, 37, 69, 0.85));
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

    /* Watermark melayang pelan supaya hero terasa lebih hidup */

    .hero-watermark span {
        font-size: clamp(60px, 12vw, 160px);
        font-weight: 900;
        color: rgba(255, 255, 255, 0.06);
        letter-spacing: 18px;
        white-space: nowrap;
        display: inline-block;
        animation: galeriWatermarkMelayang 8s ease-in-out infinite;
    }

    @keyframes galeriWatermarkMelayang {
        0%   { transform: translateY(0px) scale(1); }
        50%  { transform: translateY(-10px) scale(1.02); }
        100% { transform: translateY(0px) scale(1); }
    }

    .hero-card-v2 {
        position: relative;
        z-index: 3;
        background: rgba(11, 37, 69, 0.55);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 24px;
        padding: 34px 46px;
        max-width: 680px;
        width: 100%;
        text-align: center;
        color: #ffffff;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.25);
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
        text-shadow: 0 2px 6px rgba(0,0,0,0.3);
    }

    .hero-card-v2 p {
        font-size: 14.5px;
        color: #E2E8F0;
        line-height: 1.6;
        max-width: 520px;
        margin: 0 auto;
    }

    @media (max-width: 576px) {
        .hero-card-v2 {
            padding: 26px 24px;
        }

        .hero-card-v2 h1 {
            font-size: 26px;
        }

        .hero-watermark span {
            letter-spacing: 10px;
        }
    }

    /* ============================================================
       SECTION GALERI
    ============================================================ */

    .galeri-section {
        max-width: 1250px;
        margin: 0 auto;
        padding: 60px 24px 80px;
        background: var(--bg-color);
    }

    /* FILTER KATEGORI */
    .galeri-filter {
        display: flex;
        justify-content: center;
        gap: 12px;
        margin-bottom: 45px;
        flex-wrap: wrap;
    }

    .galeri-filter a {
        padding: 10px 26px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 700;
        font-size: 13.5px;
        border: 1px solid var(--border-color);
        background: #ffffff;
        color: var(--primary);
        transition: all 0.25s ease;
    }

    .galeri-filter a:hover {
        border-color: var(--accent);
        color: var(--accent);
        transform: translateY(-2px);
    }

    .galeri-filter a.active {
        background: linear-gradient(135deg, var(--primary), var(--accent));
        color: #ffffff;
        border-color: transparent;
        box-shadow: 0 8px 20px var(--accent-glow);
    }

    /* GRID GALERI */
    .galeri-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 28px;
    }

    /* ============================================================
       CARD GALERI — DENGAN REVEAL SAAT SCROLL
    ============================================================ */

    .galeri-card {
        background: var(--card-bg);
        border-radius: 22px;
        overflow: hidden;
        border: 1px solid var(--border-color);
        box-shadow: 0 10px 25px rgba(11, 37, 69, 0.05);
        transition:
            transform 0.4s cubic-bezier(0.165, 0.84, 0.44, 1),
            box-shadow 0.4s cubic-bezier(0.165, 0.84, 0.44, 1),
            border-color 0.4s ease,
            opacity 0.7s ease;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        position: relative;
    }

    /* Kondisi awal sebelum terlihat di layar */

    .galeri-card.reveal {
        opacity: 0;
        transform: translateY(35px) scale(.95);
    }

    /* Saat masuk viewport, class "show" ditambahkan lewat JS */

    .galeri-card.reveal.show {
        opacity: 1;
        transform: translateY(0) scale(1);
    }

    .galeri-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 6px;
        background: linear-gradient(90deg, var(--primary), var(--accent));
        opacity: 0.8;
        transition: opacity 0.3s ease;
        z-index: 2;
    }

    .galeri-card:hover {
        transform: translateY(-8px) scale(1);
        box-shadow: 0 20px 40px rgba(0, 168, 181, 0.15);
        border-color: var(--accent);
    }

    .galeri-card:hover::before {
        opacity: 1;
    }

    /* ============================================================
       FOTO GALERI — EFEK KEN BURNS (zoom halus otomatis)
    ============================================================ */

    .galeri-img-box {
        width: 100%;
        height: 210px;
        overflow: hidden;
        background: #f1f5f9;
        position: relative;
    }

    .galeri-img-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        /* zoom in-out pelan berkelanjutan supaya foto terasa hidup */
        animation: galeriKenBurns 12s ease-in-out infinite;
        transition: transform 0.5s ease;
    }

    @keyframes galeriKenBurns {
        0%   { transform: scale(1); }
        50%  { transform: scale(1.08); }
        100% { transform: scale(1); }
    }

    /* Saat di-hover, animasi otomatis berhenti dan diganti
       zoom yang lebih tegas mengikuti kursor */

    .galeri-card:hover .galeri-img-box img {
        animation-play-state: paused;
        transform: scale(1.12);
    }

    .galeri-img-kosong {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        color: #b2bec3;
        font-size: 13.5px;
    }

    .galeri-body {
        padding: 20px 22px 22px;
    }

    .galeri-kategori-badge {
        font-size: 11.5px;
        background: linear-gradient(135deg, #f8fafc, #edf9fc);
        border: 1px solid rgba(0, 168, 181, 0.2);
        padding: 5px 14px;
        border-radius: 50px;
        color: var(--primary);
        font-weight: 700;
        display: inline-block;
        margin-bottom: 10px;
    }

    .galeri-title {
        font-size: 16px;
        font-weight: 700;
        color: var(--primary);
        line-height: 1.4;
        margin-bottom: 8px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .galeri-deskripsi {
        font-size: 13.5px;
        color: var(--text-muted);
        line-height: 1.6;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .galeri-lihat-hint {
        margin-top: 14px;
        font-size: 12.5px;
        font-weight: 700;
        color: var(--accent);
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: gap 0.2s ease;
    }

    .galeri-card:hover .galeri-lihat-hint {
        gap: 10px;
    }

    .galeri-kosong {
        text-align: center;
        padding: 60px 20px;
        width: 100%;
        color: var(--text-muted);
        font-size: 14.5px;
        grid-column: 1 / -1;
    }

    /* ============================================================
       MODAL LIGHTBOX FOTO
    ============================================================ */

    .galeri-modal-overlay {
        position: fixed;
        inset: 0;
        background: rgba(11, 37, 69, 0.65);
        backdrop-filter: blur(4px);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        padding: 20px;
        opacity: 0;
        transition: opacity 0.25s ease;
    }

    .galeri-modal-overlay.tampil {
        display: flex;
        opacity: 1;
    }

    .galeri-modal-box {
        background: #fff;
        border-radius: 26px;
        max-width: 560px;
        width: 100%;
        max-height: 88vh;
        overflow-y: auto;
        position: relative;
        box-shadow: 0 30px 60px rgba(0,0,0,0.35);
        transform: translateY(20px) scale(0.97);
        transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .galeri-modal-overlay.tampil .galeri-modal-box {
        transform: translateY(0) scale(1);
    }

    .galeri-modal-img {
        width: 100%;
        max-height: 420px;
        object-fit: cover;
        background: #f1f5f9;
        display: block;
    }

    .galeri-modal-close {
        position: absolute;
        top: 14px;
        right: 14px;
        width: 34px;
        height: 34px;
        border-radius: 50%;
        background: rgba(11, 37, 69, 0.55);
        border: none;
        color: #fff;
        font-size: 18px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
        backdrop-filter: blur(2px);
        z-index: 5;
    }

    .galeri-modal-close:hover {
        background: rgba(11, 37, 69, 0.8);
        transform: rotate(90deg);
    }

    .galeri-modal-body {
        padding: 24px 26px 28px;
    }

    .galeri-modal-kategori {
        font-size: 11.5px;
        background: #f8fafc;
        border: 1px solid var(--border-color);
        padding: 5px 14px;
        border-radius: 50px;
        color: var(--primary);
        font-weight: 700;
        display: inline-block;
        margin-bottom: 12px;
    }

    .galeri-modal-body h3 {
        font-size: 19px;
        font-weight: 800;
        color: var(--primary);
        margin-bottom: 10px;
        line-height: 1.35;
    }

    .galeri-modal-body p {
        font-size: 14px;
        color: var(--text-muted);
        line-height: 1.75;
    }

    .btn-modal-tutup-galeri {
        margin-top: 20px;
        width: 100%;
        background: #f1f5f9;
        color: var(--text-main);
        border: none;
        padding: 12px 20px;
        border-radius: 50px;
        font-size: 14px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.25s ease;
    }

    .btn-modal-tutup-galeri:hover { background: #e2e8f0; }

    /* ============================================================
       RESPONSIVE
    ============================================================ */

    @media (max-width: 640px) {
        .galeri-grid { grid-template-columns: 1fr; }
        .galeri-img-box { height: 190px; }
        .galeri-section { padding: 45px 18px 60px; }
        .galeri-filter a { padding: 9px 18px; font-size: 12.5px; }
    }

    /* Menghormati pengguna dengan pengaturan "reduce motion" */

    @media (prefers-reduced-motion: reduce) {

        .galeri-img-box img { animation: none !important; }
        .hero-watermark span { animation: none !important; }

        .galeri-card.reveal {
            opacity: 1;
            transform: none;
        }

    }
</style>
@endsection

@section('content')

<!-- HERO BANNER — GAYA SAMA SEPERTI PROFIL SEKOLAH -->
<div class="hero-banner-v2">

    <div class="hero-watermark">
        <span>SMK N 1 CIJATI</span>
    </div>

    <div class="hero-card-v2">
        <div class="hero-breadcrumb-v2">
            <a href="{{ route('beranda') }}">Beranda</a> / Galeri
        </div>

        <h1>Galeri Sekolah</h1>

        <p>Dokumentasi kegiatan dan momen penting di SMK Negeri 1 Cijati.</p>
    </div>

</div>

<section class="galeri-section">

    <!-- TOMBOL FILTER KATEGORI -->
    <div class="galeri-filter">
        <a href="{{ route('galeri') }}" class="{{ request('kategori') == '' ? 'active' : '' }}">Semua</a>
        <a href="{{ route('galeri', ['kategori' => 'GTK']) }}" class="{{ request('kategori') == 'GTK' ? 'active' : '' }}">GTK</a>
        <a href="{{ route('galeri', ['kategori' => 'Kegiatan Sekolah']) }}" class="{{ request('kategori') == 'Kegiatan Sekolah' ? 'active' : '' }}">Kegiatan Sekolah</a>
    </div>

    <!-- GRID GALERI -->
    <div class="galeri-grid">
        @isset($galeris)
            @forelse($galeris as $galeri)

                @php
                    $adaFoto = !empty($galeri->foto);
                    $fotoSrc = $adaFoto ? asset('images/galeri/' . $galeri->foto) : '';

                    /*
                    |--------------------------------------------------------------------------
                    | DELAY BERTAHAP UNTUK ANIMASI REVEAL
                    |--------------------------------------------------------------------------
                    | $loop->index adalah nomor urut otomatis dari Laravel di dalam
                    | @forelse (dimulai dari 0). Dibatasi modulo 8 supaya kalau foto
                    | banyak, delay tidak jadi kelamaan.
                    */
                    $delayReveal = ($loop->index % 8) * 0.1;
                @endphp

                <div class="galeri-card reveal"
                     style="transition-delay: {{ $delayReveal }}s;"
                     onclick="bukaModalGaleri('{{ $fotoSrc }}', '{{ addslashes($galeri->judul) }}', '{{ addslashes($galeri->kategori) }}', `{{ addslashes($galeri->deskripsi ?? '') }}`)">

                    <div class="galeri-img-box">
                        @if($adaFoto)
                            <img src="{{ $fotoSrc }}" alt="{{ $galeri->judul }}">
                        @else
                            <div class="galeri-img-kosong">Tidak Ada Foto</div>
                        @endif
                    </div>

                    <div class="galeri-body">
                        <span class="galeri-kategori-badge">{{ $galeri->kategori }}</span>

                        <div class="galeri-title">{{ $galeri->judul }}</div>

                        <p class="galeri-deskripsi">{{ $galeri->deskripsi }}</p>

                        <div class="galeri-lihat-hint">
                            Lihat Foto <span>&rarr;</span>
                        </div>
                    </div>
                </div>

            @empty
                <div class="galeri-kosong">
                    Belum ada foto galeri untuk kategori ini.
                </div>
            @endforelse
        @endisset
    </div>

</section>

<!-- ============================================================
     MODAL LIGHTBOX GALERI
============================================================ -->

<div class="galeri-modal-overlay" id="galeriModalOverlay" onclick="tutupModalJikaDiLuar(event)">
    <div class="galeri-modal-box">

        <button type="button" class="galeri-modal-close" onclick="tutupModalGaleri()">&times;</button>

        <img id="modalGaleriImg" class="galeri-modal-img" src="" alt="Foto Galeri">

        <div class="galeri-modal-body">
            <span class="galeri-modal-kategori" id="modalGaleriKategori"></span>
            <h3 id="modalGaleriJudul">Judul Foto</h3>
            <p id="modalGaleriDeskripsi"></p>

            <button type="button" class="btn-modal-tutup-galeri" onclick="tutupModalGaleri()">Tutup</button>
        </div>

    </div>
</div>

@endsection

@section('scripts')
<script>
    function bukaModalGaleri(foto, judul, kategori, deskripsi) {
        const overlay = document.getElementById('galeriModalOverlay');
        const imgEl = document.getElementById('modalGaleriImg');

        if (foto) {
            imgEl.src = foto;
            imgEl.style.display = 'block';
        } else {
            imgEl.style.display = 'none';
        }

        document.getElementById('modalGaleriJudul').textContent = judul;
        document.getElementById('modalGaleriKategori').textContent = kategori;
        document.getElementById('modalGaleriDeskripsi').textContent = deskripsi && deskripsi.trim() !== '' ? deskripsi : 'Tidak ada deskripsi.';

        overlay.classList.add('tampil');
        document.body.style.overflow = 'hidden';
    }

    function tutupModalGaleri() {
        const overlay = document.getElementById('galeriModalOverlay');
        overlay.classList.remove('tampil');
        document.body.style.overflow = '';
    }

    function tutupModalJikaDiLuar(event) {
        if (event.target.id === 'galeriModalOverlay') {
            tutupModalGaleri();
        }
    }

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            tutupModalGaleri();
        }
    });

    /* =====================================================
       REVEAL ANIMATION SAAT SCROLL — CARD GALERI
       -----------------------------------------------------
       Menambahkan class "show" ke setiap .galeri-card.reveal
       ketika card tersebut masuk ke area layar (viewport).
    ===================================================== */

    document.addEventListener('DOMContentLoaded', function () {

        const kartuGaleri = document.querySelectorAll('.galeri-card.reveal');

        if (kartuGaleri.length === 0) {
            return;
        }

        if ('IntersectionObserver' in window) {

            const observerGaleri = new IntersectionObserver(
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

            kartuGaleri.forEach(function (kartu) {
                observerGaleri.observe(kartu);
            });

        } else {

            // Fallback untuk browser lama
            kartuGaleri.forEach(function (kartu) {
                kartu.classList.add('show');
            });

        }

    });
</script>
@endsection