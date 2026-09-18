@extends('layouts.app')

@section('title', 'Ekstrakurikuler - SMK Negeri 1 Cijati')

@section('styles')

<style>
    :root {
        --primary: #0F2C59;
        --accent: #00B4D8;
        --accent-glow: rgba(0, 180, 216, 0.2);
        --bg-color: #f4f7fa;
        --card-bg: #ffffff;
        --text-main: #1E293B;
        --text-muted: #64748B;
        --border-color: #E2E8F0;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Plus Jakarta Sans', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: var(--bg-color);
        color: var(--text-main);
        overflow-x: hidden;
    }

    /* =========================
       HERO BANNER
    ========================= */
    .hero-banner {
        position: relative;
        width: 100%;
        height: 320px;

        background:
            linear-gradient(
                135deg,
                rgba(15, 44, 89, 0.85),
                rgba(0, 180, 216, 0.75)
            ),
            url("{{ asset('images/sekolah/poto.sekolah.jpeg') }}")
            center/cover no-repeat;

        background-size: 115%, cover;

        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;

        color: #ffffff;
        padding: 0 20px;

        border-bottom-left-radius: 40px;
        border-bottom-right-radius: 40px;

        box-shadow: 0 15px 35px rgba(15, 44, 89, 0.15);
        margin-bottom: -30px;

        overflow: hidden;

        animation: heroDrift 20s ease-in-out infinite alternate;
    }

    @keyframes heroDrift {
        0%   { background-position: 50% 40%, center; }
        100% { background-position: 55% 60%, center; }
    }

    .hero-content {
        z-index: 2;
        max-width: 700px;
    }

    .hero-content h1 {
        font-size: 38px;
        font-weight: 800;
        margin-bottom: 10px;
        letter-spacing: 0.5px;
        text-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }

    .hero-content p {
        font-size: 16px;
        color: #E0F2FE;
        font-weight: 400;
        line-height: 1.5;
        text-shadow: 0 1px 2px rgba(0,0,0,0.2);
    }

    /* =========================
       SECTION EKSTRAKURIKULER
    ========================= */
    .ekstrakurikuler {
        padding: 60px 20px 80px;
        position: relative;
        z-index: 3;
    }

    .ekskul-container {
        max-width: 1200px;
        width: 100%;
        margin: 0 auto;
    }

    .ekskul-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
        gap: 25px;
    }

    /* =========================
       CARD EKSKUL
    ========================= */
    .ekskul-card {
        background: var(--card-bg);
        border-radius: 24px;
        padding: 28px 20px;

        box-shadow: 0 10px 25px rgba(15, 44, 89, 0.05);
        border: 1px solid var(--border-color);

        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);

        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;

        position: relative;
        overflow: hidden;
        cursor: pointer;

        /* --- SCROLL REVEAL (state awal) --- */
        opacity: 0;
        transform: translateY(40px);
    }

    .ekskul-card.is-visible {
        opacity: 1;
        transform: translateY(0);
        transition:
            opacity .7s ease,
            transform .7s cubic-bezier(0.22, 1, 0.36, 1);
    }

    .ekskul-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;

        width: 100%;
        height: 6px;

        background: linear-gradient(
            90deg,
            var(--primary),
            var(--accent)
        );

        opacity: 0.8;
        transition: opacity 0.3s ease;
    }

    .ekskul-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 180, 216, 0.15);
        border-color: var(--accent);
    }

    .ekskul-card:hover::before {
        opacity: 1;
    }

    /* =========================
       LOGO
    ========================= */
    .ekskul-logo {
        width: 90px;
        height: 90px;

        margin-bottom: 16px;

        background: #f8fafc;
        border-radius: 50%;

        display: flex;
        align-items: center;
        justify-content: center;

        padding: 14px;

        border: 2px dashed #cbd5e1;

        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.03);

        transition: all 0.4s ease;

        /* --- Bobbing halus waktu idle --- */
        animation: logoBobEkskul 3.6s ease-in-out infinite;
    }

    /* Variasi delay biar tiap card nggak bobbing bareng-bareng */
    .ekskul-grid .ekskul-card:nth-child(2n) .ekskul-logo {
        animation-delay: .6s;
    }

    .ekskul-grid .ekskul-card:nth-child(3n) .ekskul-logo {
        animation-delay: 1.2s;
    }

    @keyframes logoBobEkskul {
        0%, 100% { transform: translateY(0); }
        50%      { transform: translateY(-6px); }
    }

    .ekskul-card:hover .ekskul-logo {
        animation-play-state: paused;
        transform: rotate(8deg) scale(1.08);
        background: #e0f2fe;
        border-color: var(--accent);
        box-shadow: 0 6px 15px var(--accent-glow);
    }

    .ekskul-logo img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    /* =========================
       NAMA EKSKUL
    ========================= */
    .ekskul-name {
        color: var(--primary);
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    /* =========================
       PEMBINA
    ========================= */
    .ekskul-pembina {
        display: inline-flex;
        align-items: center;
        gap: 6px;

        font-size: 13px;
        color: #475569;

        background: linear-gradient(
            135deg,
            #f8fafc,
            #edf9fc
        );

        padding: 8px 16px;
        border-radius: 50px;

        border: 1px solid rgba(0, 180, 216, 0.2);

        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.02);

        transition: all 0.3s ease;
    }

    .ekskul-card:hover .ekskul-pembina {
        background: linear-gradient(
            135deg,
            #e0f2fe,
            #ccfbf1
        );

        border-color: var(--accent);
        transform: scale(1.03);
    }

    .ekskul-pembina span {
        color: var(--primary);
        font-weight: 700;
    }

    /* =========================
       PETUNJUK LIHAT DESKRIPSI
    ========================= */
    .ekskul-lihat-hint {
        margin-top: 16px;

        font-size: 12.5px;
        font-weight: 700;

        color: var(--accent);

        display: inline-flex;
        align-items: center;
        gap: 6px;

        transition: gap 0.2s ease;
    }

    .ekskul-card:hover .ekskul-lihat-hint {
        gap: 10px;
    }

    /* =========================
       MODAL
    ========================= */
    .ekskul-modal-overlay {
        position: fixed;
        inset: 0;

        background: rgba(15, 44, 89, 0.55);
        backdrop-filter: blur(4px);

        display: none;

        align-items: center;
        justify-content: center;

        z-index: 9999;
        padding: 20px;

        opacity: 0;
        transition: opacity 0.25s ease;
    }

    .ekskul-modal-overlay.tampil {
        display: flex;
        opacity: 1;
    }

    .ekskul-modal-box {
        background: #fff;

        border-radius: 26px;

        max-width: 480px;
        width: 100%;

        max-height: 85vh;
        overflow-y: auto;

        position: relative;

        box-shadow: 0 30px 60px rgba(0,0,0,0.3);

        transform: translateY(20px) scale(0.97);

        transition:
            transform 0.3s
            cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .ekskul-modal-overlay.tampil .ekskul-modal-box {
        transform: translateY(0) scale(1);
    }

    /* =========================
       MODAL HEADER
    ========================= */
    .ekskul-modal-header {
        background: linear-gradient(
            135deg,
            var(--primary),
            var(--accent)
        );

        padding: 36px 30px 50px;

        text-align: center;

        color: #fff;

        position: relative;

        border-top-left-radius: 26px;
        border-top-right-radius: 26px;
    }

    .ekskul-modal-close {
        position: absolute;

        top: 16px;
        right: 16px;

        width: 34px;
        height: 34px;

        border-radius: 50%;

        background: rgba(255,255,255,0.2);

        border: none;

        color: #fff;

        font-size: 18px;

        cursor: pointer;

        display: flex;
        align-items: center;
        justify-content: center;

        transition: all 0.2s ease;
    }

    .ekskul-modal-close:hover {
        background: rgba(255,255,255,0.35);
        transform: rotate(90deg);
    }

    /* =========================
       MODAL LOGO
    ========================= */
    .ekskul-modal-logo {
        width: 84px;
        height: 84px;

        background: #fff;

        border-radius: 50%;

        padding: 12px;

        margin: 0 auto 14px;

        box-shadow: 0 8px 20px rgba(0,0,0,0.18);
    }

    .ekskul-modal-logo img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .ekskul-modal-header h3 {
        font-size: 22px;
        font-weight: 800;
        margin-bottom: 8px;
    }

    .ekskul-modal-pembina {
        display: inline-flex;

        align-items: center;
        gap: 6px;

        font-size: 12.5px;

        background: rgba(255,255,255,0.18);

        padding: 6px 16px;

        border-radius: 50px;

        border: 1px solid rgba(255,255,255,0.3);
    }

    /* =========================
       MODAL BODY
    ========================= */
    .ekskul-modal-body {
        padding: 28px 30px 30px;

        margin-top: -22px;

        position: relative;
    }

    .ekskul-modal-card-deskripsi {
        background: var(--card-bg);

        border: 1px solid var(--border-color);

        border-radius: 18px;

        padding: 22px;

        box-shadow:
            0 8px 20px
            rgba(15, 44, 89, 0.06);
    }

    .ekskul-modal-card-deskripsi h4 {
        font-size: 13px;

        text-transform: uppercase;

        letter-spacing: 0.5px;

        color: var(--accent);

        font-weight: 800;

        margin-bottom: 10px;
    }

    .ekskul-modal-card-deskripsi p {
        font-size: 14.5px;

        color: var(--text-muted);

        line-height: 1.8;

        white-space: pre-line;
    }

    .ekskul-modal-kosong {
        font-style: italic;

        color: #94a3b8;

        font-size: 13.5px;
    }

    /* =========================
       TOMBOL TUTUP
    ========================= */
    .ekskul-modal-actions {
        display: flex;
        justify-content: center;

        margin-top: 20px;
    }

    .btn-modal-tutup {
        width: 100%;

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

    .btn-modal-tutup:hover {
        background: #e2e8f0;
    }

    /* =========================
       RESPONSIVE
    ========================= */
    @media (max-width: 576px) {

        .hero-banner {
            height: 280px;
        }

        .hero-content h1 {
            font-size: 30px;
        }

        .hero-content p {
            font-size: 14px;
        }

        .ekskul-grid {
            grid-template-columns: 1fr;
        }

        .ekskul-modal-header {
            padding: 30px 22px 44px;
        }

        .ekskul-modal-body {
            padding: 22px 22px 24px;
        }

        .ekskul-modal-actions {
            flex-direction: column;
        }
    }

    /* =========================
       HORMATI PENGGUNA REDUCE MOTION
    ========================= */
    @media (prefers-reduced-motion: reduce) {

        .hero-banner,
        .ekskul-logo {
            animation: none !important;
        }

        .ekskul-card {
            opacity: 1 !important;
            transform: none !important;
            transition: none !important;
        }
    }
</style>

@endsection

@section('content')

<!-- =========================
     HERO
========================= -->

<div class="hero-banner">

    <div class="hero-content">

        <h1>Ekstrakurikuler</h1>

        <p>
            Wadah pengembangan bakat, minat, dan kreativitas
            siswa-siswi SMK Negeri 1 Cijati ✨
        </p>

    </div>

</div>

<!-- =========================
     DAFTAR EKSTRAKURIKULER
========================= -->

<section class="ekstrakurikuler">

    <div class="ekskul-container">

        <div class="ekskul-grid">

            @forelse($ekstrakurikulers as $ekskul)

                <div
                    class="ekskul-card"
                    data-reveal
                    style="transition-delay: {{ ($loop->index % 3) * 0.12 }}s;"

                    onclick="bukaModalEkskul(
                        {{ $ekskul->id }},
                        '{{ addslashes($ekskul->nama_ekskul) }}',
                        '{{ addslashes($ekskul->pembina ?? '-') }}',
                        '{{ $ekskul->logo ? asset('storage/' . $ekskul->logo) : '' }}',
                        `{{ addslashes($ekskul->deskripsi ?? '') }}`
                    )"
                >

                    <!-- LOGO -->
                    <div class="ekskul-logo">

                        <img
                            src="{{ $ekskul->logo ? asset('storage/' . $ekskul->logo) : '' }}"

                            onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($ekskul->nama_ekskul) }}&background=0F2C59&color=fff';"

                            alt="Logo {{ $ekskul->nama_ekskul }}"
                        >

                    </div>


                    <!-- NAMA -->
                    <div class="ekskul-name">
                        {{ $ekskul->nama_ekskul }}
                    </div>


                    <!-- PEMBINA -->
                    <div class="ekskul-pembina">

                        <span>🧑‍🏫 Pembina:</span>

                        {{ $ekskul->pembina ?? '-' }}

                    </div>


                    <!-- LIHAT DESKRIPSI -->
                    <div class="ekskul-lihat-hint">

                        Lihat Deskripsi

                        <span>→</span>

                    </div>

                </div>

            @empty

                <p
                    style="
                        text-align: center;
                        grid-column: 1 / -1;
                        color: #64748B;
                    "
                >
                    Belum ada data ekstrakurikuler
                    yang ditambahkan.
                </p>

            @endforelse

        </div>

    </div>

</section>

<!-- =========================
     MODAL DESKRIPSI
========================= -->

<div
    class="ekskul-modal-overlay"
    id="ekskulModalOverlay"
    onclick="tutupModalJikaDiLuar(event)"
>

    <div class="ekskul-modal-box">

        <!-- HEADER MODAL -->
        <div class="ekskul-modal-header">

            <button
                type="button"
                class="ekskul-modal-close"
                onclick="tutupModalEkskul()"
            >
                &times;
            </button>


            <!-- LOGO -->
            <div class="ekskul-modal-logo">

                <img
                    id="modalEkskulLogo"
                    src=""
                    alt="Logo Ekskul"
                >

            </div>


            <!-- NAMA -->
            <h3 id="modalEkskulNama">
                Nama Ekskul
            </h3>


            <!-- PEMBINA -->
            <div class="ekskul-modal-pembina">

                🧑‍🏫

                <span id="modalEkskulPembina">
                    Pembina
                </span>

            </div>

        </div>


        <!-- BODY MODAL -->
        <div class="ekskul-modal-body">

            <div class="ekskul-modal-card-deskripsi">

                <h4>
                    Tentang Ekstrakurikuler
                </h4>

                <p id="modalEkskulDeskripsi"></p>

            </div>


            <!-- HANYA TOMBOL TUTUP -->
            <div class="ekskul-modal-actions">

                <button
                    type="button"
                    class="btn-modal-tutup"
                    onclick="tutupModalEkskul()"
                >
                    Tutup
                </button>

            </div>

        </div>

    </div>

</div>

@endsection

@section('scripts')

<script>

    /* =========================
       BUKA MODAL
    ========================= */

    function bukaModalEkskul(
        id,
        nama,
        pembina,
        logo,
        deskripsi
    ) {

        const overlay =
            document.getElementById(
                'ekskulModalOverlay'
            );


        /* NAMA */
        document.getElementById(
            'modalEkskulNama'
        ).textContent = nama;


        /* PEMBINA */
        document.getElementById(
            'modalEkskulPembina'
        ).textContent = pembina;


        /* LOGO */
        const logoEl =
            document.getElementById(
                'modalEkskulLogo'
            );

        if (logo) {

            logoEl.src = logo;

        } else {

            logoEl.src =
                'https://ui-avatars.com/api/?name='
                + encodeURIComponent(nama)
                + '&background=0F2C59&color=fff';

        }


        /* DESKRIPSI */
        const deskripsiEl =
            document.getElementById(
                'modalEkskulDeskripsi'
            );

        if (
            deskripsi &&
            deskripsi.trim() !== ''
        ) {

            deskripsiEl.textContent =
                deskripsi;

            deskripsiEl.classList.remove(
                'ekskul-modal-kosong'
            );

        } else {

            deskripsiEl.textContent =
                'Deskripsi untuk ekstrakurikuler ini belum ditambahkan.';

            deskripsiEl.classList.add(
                'ekskul-modal-kosong'
            );

        }


        /* TAMPILKAN MODAL */
        overlay.classList.add('tampil');

        document.body.style.overflow =
            'hidden';
    }


    /* =========================
       TUTUP MODAL
    ========================= */

    function tutupModalEkskul() {

        const overlay =
            document.getElementById(
                'ekskulModalOverlay'
            );

        overlay.classList.remove(
            'tampil'
        );

        document.body.style.overflow =
            '';

    }


    /* =========================
       KLIK DI LUAR MODAL
    ========================= */

    function tutupModalJikaDiLuar(event) {

        if (
            event.target.id ===
            'ekskulModalOverlay'
        ) {

            tutupModalEkskul();

        }

    }


    /* =========================
       TOMBOL ESCAPE
    ========================= */

    document.addEventListener(
        'keydown',
        function (e) {

            if (e.key === 'Escape') {

                tutupModalEkskul();

            }

        }
    );


    /* =========================
       SCROLL REVEAL CARD EKSKUL
    ========================= */

    document.addEventListener('DOMContentLoaded', function () {
        var cards = document.querySelectorAll('[data-reveal]');

        if (!('IntersectionObserver' in window)) {
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