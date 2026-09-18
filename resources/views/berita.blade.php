@extends('layouts.app')

@section('title', 'Berita & Informasi Terbaru - SMK Negeri 1 Cijati')

@section('styles')
<style>
    :root {
        --primary: #0B2545;
        --accent: #00A8B5;
        --accent-light: #e6f8fa;
        --accent-glow: rgba(0, 168, 181, 0.2);
        --bg-color: #f4f7fa;
        --card-bg: #ffffff;
        --text-main: #1E293B;
        --text-muted: #64748b;
        --border-color: #E2E8F0;
    }

    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
        font-family: 'Plus Jakarta Sans', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        overflow-x: hidden;
    }

    /* ============================================================
       HERO BANNER
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

    /* =========================================================
       WATERMARK MELAYANG (estetik, gerakan halus tak berhenti)
    ========================================================= */

    .hero-watermark span {
        font-size: clamp(60px, 12vw, 160px);
        font-weight: 900;
        color: rgba(255, 255, 255, 0.06);
        letter-spacing: 18px;
        white-space: nowrap;
        display: inline-block;
        animation: watermarkMelayang 8s ease-in-out infinite;
    }

    @keyframes watermarkMelayang {
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
       SECTION BERITA
    ============================================================ */

    .news-section {
        max-width: 1200px;
        margin: 0 auto;
        padding: 60px 24px 80px;
        background: var(--bg-color);
    }

    .news-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 28px;
    }

    /* ============================================================
       CARD BERITA — CLICKABLE + REVEAL SAAT SCROLL
    ============================================================ */

    .news-card {
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
        height: 100%;
    }

    /* Kondisi awal sebelum terlihat di layar: transparan + turun + kecil */
    .news-card.reveal {
        opacity: 0;
        transform: translateY(35px) scale(.95);
    }

    /* Saat elemen sudah masuk viewport, class "show" ditambahkan lewat JS */
    .news-card.reveal.show {
        opacity: 1;
        transform: translateY(0) scale(1);
    }

    .news-card::before {
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

    .news-card:hover {
        transform: translateY(-8px) scale(1);
        box-shadow: 0 20px 40px rgba(0, 168, 181, 0.15);
        border-color: var(--accent);
    }

    .news-card:hover::before {
        opacity: 1;
    }

    /* ============================================================
       FOTO BERITA — EFEK KEN BURNS (zoom halus otomatis)
    ============================================================ */

    .news-image-box {
        width: 100%;
        height: 190px;
        overflow: hidden;
        background: #f1f5f9;
        position: relative;
    }

    .news-image-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        /* animasi zoom in-out pelan yang berjalan terus menerus
           supaya foto terasa "hidup" walau tidak di-hover */
        animation: kenBurns 12s ease-in-out infinite;
        transition: transform 0.5s ease;
    }

    @keyframes kenBurns {
        0%   { transform: scale(1); }
        50%  { transform: scale(1.08); }
        100% { transform: scale(1); }
    }

    /* Saat di-hover, animasi otomatis dihentikan dan diganti
       efek zoom yang lebih tegas mengikuti kursor */
    .news-card:hover .news-image-box img {
        animation-play-state: paused;
        transform: scale(1.12);
    }

    .news-content {
        padding: 22px 22px 24px;
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .news-date {
        font-size: 12.5px;
        font-weight: 700;
        color: var(--accent);
        margin-bottom: 10px;
    }

    .news-title {
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

    .news-excerpt {
        font-size: 13.5px;
        color: var(--text-muted);
        line-height: 1.6;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        flex: 1;
    }

    .news-lihat-hint {
        margin-top: 16px;
        font-size: 12.5px;
        font-weight: 700;
        color: var(--accent);
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: gap 0.2s ease;
    }

    .news-card:hover .news-lihat-hint {
        gap: 10px;
    }

    /* ============================================================
       PAGINATION
    ============================================================ */

    .pagination-wrapper {
        margin-top: 50px;
        display: flex;
        justify-content: center;
    }

    .pagination-wrapper nav { display: flex; justify-content: center; }

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
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.03);
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
        transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .pagination-wrapper .active span,
    .pagination-wrapper span[aria-current="page"] {
        background: var(--accent);
        color: #ffffff;
        box-shadow: 0 4px 14px rgba(0, 168, 181, 0.35);
        transform: scale(1.08);
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
        transform: none !important;
    }

    /* ============================================================
       MODAL PREVIEW BERITA
    ============================================================ */

    .berita-modal-overlay {
        position: fixed;
        inset: 0;
        background: rgba(11, 37, 69, 0.55);
        backdrop-filter: blur(4px);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        padding: 20px;
        opacity: 0;
        transition: opacity 0.25s ease;
    }

    .berita-modal-overlay.tampil {
        display: flex;
        opacity: 1;
    }

    .berita-modal-box {
        background: #fff;
        border-radius: 26px;
        max-width: 560px;
        width: 100%;
        max-height: 85vh;
        overflow-y: auto;
        position: relative;
        box-shadow: 0 30px 60px rgba(0,0,0,0.3);
        transform: translateY(20px) scale(0.97);
        transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .berita-modal-overlay.tampil .berita-modal-box {
        transform: translateY(0) scale(1);
    }

    .berita-modal-img {
        width: 100%;
        height: 220px;
        object-fit: cover;
        background: #f1f5f9;
        display: block;
    }

    .berita-modal-close {
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

    .berita-modal-close:hover {
        background: rgba(11, 37, 69, 0.8);
        transform: rotate(90deg);
    }

    .berita-modal-body {
        padding: 26px 28px 30px;
    }

    .berita-modal-date {
        font-size: 12.5px;
        font-weight: 700;
        color: var(--accent);
        margin-bottom: 8px;
    }

    .berita-modal-body h3 {
        font-size: 20px;
        font-weight: 800;
        color: var(--primary);
        margin-bottom: 14px;
        line-height: 1.35;
    }

    .berita-modal-card-ringkasan {
        background: #f8fafc;
        border: 1px solid var(--border-color);
        border-radius: 16px;
        padding: 18px;
    }

    .berita-modal-card-ringkasan p {
        font-size: 14px;
        color: var(--text-muted);
        line-height: 1.8;
    }

    .berita-modal-actions {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }

    .btn-modal-baca {
        flex: 1;
        text-align: center;
        background: var(--accent);
        color: #fff;
        text-decoration: none;
        padding: 13px 20px;
        border-radius: 50px;
        font-size: 14px;
        font-weight: 700;
        transition: all 0.25s ease;
    }

    .btn-modal-baca:hover {
        background: var(--primary);
        color: #fff;
        transform: translateY(-2px);
    }

    .btn-modal-tutup {
        background: #f1f5f9;
        color: var(--text-main);
        border: none;
        padding: 13px 20px;
        border-radius: 50px;
        font-size: 14px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.25s ease;
    }

    .btn-modal-tutup:hover { background: #e2e8f0; }

    /* ============================================================
       RESPONSIVE
    ============================================================ */

    @media (max-width: 640px) {
        .news-grid { grid-template-columns: 1fr; }
        .news-image-box { height: 200px; }
        .news-section { padding: 45px 18px 60px; }
        .berita-modal-body { padding: 20px 20px 24px; }
        .berita-modal-actions { flex-direction: column; }
    }

    /* Menghormati pengguna yang mengaktifkan "reduce motion" di OS/browser */
    @media (prefers-reduced-motion: reduce) {
        .news-image-box img { animation: none !important; }
        .hero-watermark span { animation: none !important; }
        .news-card.reveal {
            opacity: 1;
            transform: none;
        }
    }
</style>
@endsection

@section('content')

<!-- HERO BANNER — GAYA SAMA SEPERTI PROFIL SEKOLAH & GALERI -->
<div class="hero-banner-v2">

    <div class="hero-watermark">
        <span>SMK N 1 CIJATI</span>
    </div>

    <div class="hero-card-v2">
        <div class="hero-breadcrumb-v2">
            <a href="{{ route('beranda') }}">Beranda</a> / Berita
        </div>

        <h1>Berita & Informasi</h1>

        <p>Ikuti perkembangan, kegiatan, serta pengumuman resmi terbaru dari SMK Negeri 1 Cijati.</p>
    </div>

</div>

<section class="news-section">

    <div class="news-grid">
        @forelse($beritas as $item)

            @php
                if ($item->gambar) {
                    if (Str::startsWith($item->gambar, 'http')) {
                        $imgSrc = $item->gambar;
                    } elseif (Str::contains($item->gambar, 'images/')) {
                        $imgSrc = asset($item->gambar);
                    } else {
                        $imgSrc = asset('images/berita/' . $item->gambar);
                    }
                } else {
                    $imgSrc = asset('images/default.jpg');
                }

                $ringkasanPanjang = Str::limit(strip_tags($item->konten), 220);
                $ringkasanSingkat = Str::limit(strip_tags($item->konten), 90);
                $tanggal = optional($item->created_at)->translatedFormat('d F Y');

                /*
                |----------------------------------------------------------------
                | DELAY BERTAHAP UNTUK ANIMASI REVEAL
                |----------------------------------------------------------------
                | $loop->index adalah nomor urut otomatis dari Laravel di dalam
                | @forelse (dimulai dari 0). Dipakai untuk transition-delay agar
                | card muncul satu-satu, bukan langsung serentak.
                | Dibatasi maksimal 8 tingkat delay (modulo 8) supaya kalau
                | beritanya banyak, delay tidak jadi kelamaan.
                */
                $delayReveal = ($loop->index % 8) * 0.1;
            @endphp

            <article class="news-card reveal"
                style="transition-delay: {{ $delayReveal }}s;"
                onclick="bukaModalBerita({{ $item->id }}, '{{ addslashes($item->judul) }}', '{{ $imgSrc }}', `{{ addslashes($ringkasanPanjang) }}`, '{{ $tanggal }}')">

                <div class="news-image-box">
                    <img src="{{ $imgSrc }}" alt="{{ $item->judul }}">
                </div>

                <div class="news-content">
                    <div class="news-date">&#128197; {{ $tanggal }}</div>

                    <div class="news-title" title="{{ $item->judul }}">
                        {{ $item->judul }}
                    </div>

                    <p class="news-excerpt">
                        {{ $ringkasanSingkat }}
                    </p>

                    <div class="news-lihat-hint">
                        Baca Ringkasan <span>&rarr;</span>
                    </div>
                </div>
            </article>

        @empty
            <p style="grid-column: 1 / -1; text-align: center; color: var(--text-muted); padding: 60px 0;">Belum ada berita atau informasi terbaru saat ini.</p>
        @endforelse
    </div>

    <div class="pagination-wrapper">
        {{ $beritas->links() }}
    </div>

</section>

<!-- ============================================================
     MODAL PREVIEW BERITA
============================================================ -->

<div class="berita-modal-overlay" id="beritaModalOverlay" onclick="tutupModalJikaDiLuar(event)">
    <div class="berita-modal-box">

        <button type="button" class="berita-modal-close" onclick="tutupModalBerita()">&times;</button>

        <img id="modalBeritaImg" class="berita-modal-img" src="" alt="Gambar Berita">

        <div class="berita-modal-body">
            <div class="berita-modal-date">&#128197; <span id="modalBeritaTanggal"></span></div>
            <h3 id="modalBeritaJudul">Judul Berita</h3>

            <div class="berita-modal-card-ringkasan">
                <p id="modalBeritaRingkasan"></p>
            </div>

            <div class="berita-modal-actions">
                <a href="#" id="modalBeritaBacaBtn" class="btn-modal-baca">Baca Selengkapnya</a>
                <button type="button" class="btn-modal-tutup" onclick="tutupModalBerita()">Tutup</button>
            </div>
        </div>

    </div>
</div>

@endsection

@section('scripts')
<script>
    function bukaModalBerita(id, judul, gambar, ringkasan, tanggal) {
        const overlay = document.getElementById('beritaModalOverlay');

        document.getElementById('modalBeritaJudul').textContent = judul;
        document.getElementById('modalBeritaImg').src = gambar;
        document.getElementById('modalBeritaRingkasan').textContent = ringkasan;
        document.getElementById('modalBeritaTanggal').textContent = tanggal;
        document.getElementById('modalBeritaBacaBtn').href = '/berita/' + id;

        overlay.classList.add('tampil');
        document.body.style.overflow = 'hidden';
    }

    function tutupModalBerita() {
        const overlay = document.getElementById('beritaModalOverlay');
        overlay.classList.remove('tampil');
        document.body.style.overflow = '';
    }

    function tutupModalJikaDiLuar(event) {
        if (event.target.id === 'beritaModalOverlay') {
            tutupModalBerita();
        }
    }

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            tutupModalBerita();
        }
    });

    /* =====================================================
       REVEAL ANIMATION SAAT SCROLL
       -----------------------------------------------------
       Menambahkan class "show" ke setiap .news-card.reveal
       ketika card tersebut masuk ke area layar (viewport).
       Card yang sudah dianimasikan langsung dilepas dari
       pengamatan (unobserve) supaya animasi tidak berulang
       terus setiap kali di-scroll naik-turun.
    ===================================================== */

    document.addEventListener('DOMContentLoaded', function () {

        const kartuBerita = document.querySelectorAll('.news-card.reveal');

        if (kartuBerita.length === 0) {
            return;
        }

        if ('IntersectionObserver' in window) {

            const observerBerita = new IntersectionObserver(
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

            kartuBerita.forEach(function (kartu) {
                observerBerita.observe(kartu);
            });

        } else {

            // Fallback untuk browser lama yang tidak dukung IntersectionObserver
            kartuBerita.forEach(function (kartu) {
                kartu.classList.add('show');
            });

        }

    });
</script>
@endsection