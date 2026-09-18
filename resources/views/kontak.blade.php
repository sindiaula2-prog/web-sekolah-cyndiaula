@extends('layouts.app')

@section('title', 'Kontak - SMK Negeri 1 Cijati')

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

        animation: heroDriftKontak 22s ease-in-out infinite alternate;
    }

    @keyframes heroDriftKontak {
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


    /* =========================================================
       WATERMARK
    ========================================================= */

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

        animation: watermarkPulse 8s ease-in-out infinite;
    }

    @keyframes watermarkPulse {
        0%, 100% { opacity: 1; transform: scale(1); }
        50%      { opacity: .6; transform: scale(1.02); }
    }


    /* =========================================================
       HERO CARD
    ========================================================= */

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
       SECTION KONTAK
    ========================================================= */

    .kontak-section {
        max-width: 1200px;

        margin: 0 auto;

        padding: 60px 24px 80px;

        background: var(--bg-color);
    }


    /* =========================================================
       HEADER - TENGAH
    ========================================================= */

    .section-header {
        text-align: center;

        margin-bottom: 40px;
    }


    .section-header h2 {
        font-size: 30px;

        font-weight: 800;

        color: var(--primary);

        margin-bottom: 12px;
    }


    .section-header .divider {
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


    .section-header p {
        color: var(--text-muted);

        font-size: 14px;

        line-height: 1.6;

        text-align: center;

        max-width: 650px;

        margin: 0 auto;
    }


    /* =========================================================
       ALERT SUKSES
    ========================================================= */

    .alert-sukses {
        max-width: 1000px;

        margin: 0 auto 30px;

        background: var(--accent-light);

        color: #05606a;

        padding: 14px 20px;

        border-radius: 14px;

        font-weight: 600;

        text-align: center;

        border: 1px solid #c7eef2;
    }


    /* =========================================================
       GRID UTAMA
    ========================================================= */

    .kontak-grid-wrapper {
        display: grid;

        grid-template-columns: 1fr 1.2fr;

        gap: 28px;
    }


    /* =========================================================
       CARD
    ========================================================= */

    .kontak-card {
        position: relative;

        background: var(--card-bg);

        border-radius: 22px;

        padding: 30px;

        border: 1px solid var(--border-color);

        box-shadow:
            0 10px 25px rgba(11,37,69,0.05);

        overflow: hidden;

        transition:
            all 0.4s
            cubic-bezier(
                0.165,
                0.84,
                0.44,
                1
            );

        /* --- SCROLL REVEAL (state awal) --- */
        opacity: 0;
        transform: translateY(40px);
    }

    .kontak-card.is-visible {
        opacity: 1;
        transform: translateY(0);
        transition:
            opacity .7s ease,
            transform .7s cubic-bezier(0.22, 1, 0.36, 1);
    }


    /* GARIS ATAS */

    .kontak-card::before {
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
    }


    .kontak-card:hover {
        transform: translateY(-6px);

        box-shadow:
            0 20px 40px
            rgba(0,168,181,0.12);

        border-color: var(--accent);
    }


    /* =========================================================
       JUDUL CARD
    ========================================================= */

    .kontak-card h3 {
        font-size: 19px;

        font-weight: 800;

        color: var(--primary);

        margin-bottom: 22px;

        display: flex;

        align-items: center;

        gap: 10px;
    }


    /* =========================================================
       INFO KONTAK
    ========================================================= */

    .info-list {
        display: flex;

        flex-direction: column;

        gap: 14px;
    }


    .info-item {
        display: flex;

        align-items: flex-start;

        gap: 14px;

        background: var(--accent-light);

        padding: 15px 16px;

        border-radius: 14px;

        transition: transform 0.2s ease;
    }


    .info-item:hover {
        transform: translateX(4px);
    }


    .info-item .icon {
        width: 40px;

        height: 40px;

        flex-shrink: 0;

        border-radius: 12px;

        background: #ffffff;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 18px;

        box-shadow:
            0 4px 10px rgba(11,37,69,0.08);

        animation: iconFloat 3.4s ease-in-out infinite;
    }

    .info-item:nth-child(2) .icon { animation-delay: .4s; }
    .info-item:nth-child(3) .icon { animation-delay: .8s; }
    .info-item:nth-child(4) .icon { animation-delay: 1.2s; }

    @keyframes iconFloat {
        0%, 100% { transform: translateY(0); }
        50%      { transform: translateY(-4px); }
    }


    .info-item strong {
        display: block;

        color: var(--primary);

        margin-bottom: 4px;

        font-size: 14px;
    }


    .info-item span,
    .info-item a {
        font-size: 13px;

        color: var(--text-muted);

        line-height: 1.6;
    }


    .info-item a {
        color: var(--accent);

        text-decoration: none;

        font-weight: 600;
    }


    .info-item a:hover {
        text-decoration: underline;
    }


    /* =========================================================
       MEDIA SOSIAL
    ========================================================= */

    .sosial-label {
        display: block;

        color: var(--primary);

        margin: 8px 0 12px;

        font-size: 14px;

        font-weight: 700;
    }


    .sosial-row {
        display: flex;

        gap: 10px;

        flex-wrap: wrap;
    }


    .sosial-circle {
        width: 42px;

        height: 42px;

        border-radius: 50%;

        background: #f1f5f9;

        color: var(--primary);

        display: flex;

        align-items: center;

        justify-content: center;

        text-decoration: none;

        font-size: 18px;

        box-shadow:
            0 2px 6px rgba(11,37,69,0.08);

        transition:
            transform 0.2s ease,
            background 0.2s ease,
            color 0.2s ease;
    }


    .sosial-circle:hover {
        transform: translateY(-4px);

        background: var(--primary);

        color: #ffffff;
    }


    /* =========================================================
       FORM
    ========================================================= */

    .form-group {
        margin-bottom: 18px;
    }


    .form-group label {
        display: block;

        font-weight: 700;

        font-size: 14px;

        color: var(--primary);

        margin-bottom: 8px;
    }


    .form-control {
        width: 100%;

        padding: 13px 16px;

        border-radius: 12px;

        border: 2px solid #e2e8f0;

        outline: none;

        font-size: 14px;

        background: #f8fafc;

        transition:
            border-color 0.2s ease,
            background 0.2s ease,
            box-shadow 0.2s ease;

        font-family: inherit;
    }


    .form-control:focus {
        border-color: var(--accent);

        background: #ffffff;

        box-shadow:
            0 0 0 3px rgba(0,168,181,0.08);
    }


    textarea.form-control {
        resize: vertical;

        min-height: 120px;
    }


    /* =========================================================
       TOMBOL KIRIM
    ========================================================= */

    .btn-kirim {
        background:
            linear-gradient(
                135deg,
                var(--accent),
                #0284c7
            );

        color: #ffffff;

        border: none;

        padding: 13px 28px;

        font-weight: 700;

        font-size: 14px;

        border-radius: 12px;

        cursor: pointer;

        width: 100%;

        box-shadow:
            0 6px 18px rgba(0,168,181,0.3);

        transition:
            transform 0.2s ease,
            box-shadow 0.2s ease;
    }


    .btn-kirim:hover {
        transform: translateY(-2px);

        box-shadow:
            0 10px 22px
            rgba(0,168,181,0.38);
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 768px) {

        .hero-card-v2 {
            padding: 28px 25px;
        }


        .hero-card-v2 h1 {
            font-size: 28px;
        }


        .kontak-grid-wrapper {
            grid-template-columns: 1fr;
        }


        .section-header h2 {
            font-size: 27px;
        }

    }


    @media (max-width: 600px) {

        .kontak-section {
            padding: 45px 18px 60px;
        }


        .hero-card-v2 h1 {
            font-size: 26px;
        }


        .section-header h2 {
            font-size: 24px;
        }


        .hero-watermark span {
            letter-spacing: 10px;
        }


        .kontak-card {
            padding: 24px 20px;
        }

    }


    /* =========================================================
       HORMATI PENGGUNA REDUCE MOTION
    ========================================================= */

    @media (prefers-reduced-motion: reduce) {

        .hero-banner-v2,
        .hero-watermark span,
        .info-item .icon {
            animation: none !important;
        }

        .kontak-card {
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

            / Kontak

        </div>


        <h1>
            Hubungi Kami
        </h1>


        <p>
            Informasi kontak dan layanan komunikasi
            SMK Negeri 1 Cijati.
        </p>

    </div>

</div>



{{-- =========================================================
   SECTION KONTAK
========================================================= --}}

<section class="kontak-section">


    {{-- =====================================================
       HEADER
    ====================================================== --}}

    <div class="section-header">

        <h2>
            Hubungi Kami
        </h2>

        <div class="divider"></div>

        <p>
            Punya pertanyaan, saran, atau ingin kerja sama?
            Sampaikan pesanmu melalui informasi kontak
            atau formulir di bawah ini.
        </p>

    </div>



    {{-- =====================================================
       ALERT
    ====================================================== --}}

    @if(session('success'))

        <div class="alert-sukses">

            Pesan kamu berhasil dikirim.
            Terima kasih!

        </div>

    @endif



    {{-- =====================================================
       GRID
    ====================================================== --}}

    <div class="kontak-grid-wrapper">


        {{-- =================================================
           INFO KONTAK
        ================================================== --}}

        <div class="kontak-card" data-reveal>


            <h3>
                <span>📍</span>
                Info Kontak &amp; Media Sosial
            </h3>


            <div class="info-list">


                {{-- ALAMAT --}}

                <div class="info-item">

                    <span class="icon">
                        🏫
                    </span>

                    <div>

                        <strong>
                            Alamat Sekolah
                        </strong>

                        <span>
                            Jl. Raya Cijati, RT.6/RW.2,
                            Cijati, Kec. Cijati,
                            Kabupaten Cianjur,
                            Jawa Barat 43284, Indonesia
                        </span>

                    </div>

                </div>



                {{-- EMAIL --}}

                <div class="info-item">

                    <span class="icon">
                        ✉️
                    </span>

                    <div>

                        <strong>
                            Email Resmi
                        </strong>

                        <a href="mailto:info@smkn1cijati.sch.id">
                            info@smkn1cijati.sch.id
                        </a>

                    </div>

                </div>



                {{-- TELEPON --}}

                <div class="info-item">

                    <span class="icon">
                        📞
                    </span>

                    <div>

                        <strong>
                            Telepon / WhatsApp
                        </strong>

                        <span>
                            0857-9722-7508 Kontak Resmi
                        </span>

                    </div>

                </div>



                {{-- JAM OPERASIONAL --}}

                <div class="info-item">

                    <span class="icon">
                        ⏰
                    </span>

                    <div>

                        <strong>
                            Jam Operasional
                        </strong>

                        <span>
                            Senin - Jumat:
                            06.30 - 15.00 WIB
                        </span>

                    </div>

                </div>



                {{-- MEDIA SOSIAL --}}

                <div style="margin-top: 6px;">

                    <span class="sosial-label">
                        Akun Resmi Media Sosial
                    </span>


                    <div class="sosial-row">

                        <a
                            href="https://smkn1cijati.sch.id"
                            target="_blank"
                            title="Website Resmi"
                            class="sosial-circle"
                        >
                            🌐
                        </a>


                        <a
                            href="https://instagram.com/namakun_ig_smkn1cijati"
                            target="_blank"
                            title="Instagram"
                            class="sosial-circle"
                        >
                            📷
                        </a>


                        <a
                            href="https://facebook.com/namakun_fb_smkn1cijati"
                            target="_blank"
                            title="Facebook"
                            class="sosial-circle"
                        >
                            📘
                        </a>


                        <a
                            href="https://youtube.com/@namakun_yt_smkn1cijati"
                            target="_blank"
                            title="YouTube"
                            class="sosial-circle"
                        >
                            📺
                        </a>


                        <a
                            href="https://tiktok.com/@namakun_tt_smkn1cijati"
                            target="_blank"
                            title="TikTok"
                            class="sosial-circle"
                        >
                            🎵
                        </a>

                    </div>

                </div>


            </div>

        </div>



        {{-- =================================================
           FORM KIRIM PESAN
        ================================================== --}}

        <div class="kontak-card" data-reveal style="transition-delay: .15s;">


            <h3>
                <span>💬</span>
                Kirim Pesan
            </h3>


            <form
                action="{{ route('kontak.kirim') }}"
                method="POST"
            >

                @csrf


                {{-- NAMA --}}

                <div class="form-group">

                    <label>
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        name="nama"
                        class="form-control"
                        placeholder="Masukkan nama kamu di sini..."
                        required
                    >

                </div>



                {{-- EMAIL --}}

                <div class="form-group">

                    <label>
                        Alamat Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        placeholder="nama@email.com"
                        required
                    >

                </div>



                {{-- NOMOR HP --}}

                <div class="form-group">

                    <label>
                        Nomor WhatsApp / HP
                    </label>

                    <input
                        type="text"
                        name="no_hp"
                        class="form-control"
                        placeholder="08xxxxxxxxxx"
                    >

                </div>



                {{-- PESAN --}}

                <div class="form-group">

                    <label>
                        Pesan Kamu
                    </label>

                    <textarea
                        name="pesan"
                        rows="4"
                        class="form-control"
                        placeholder="Tuliskan pesan atau pertanyaanmu di sini..."
                        required
                    ></textarea>

                </div>



                {{-- TOMBOL --}}

                <button
                    type="submit"
                    class="btn-kirim"
                >
                    Kirim Pesan
                </button>


            </form>

        </div>


    </div>


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
        threshold: 0.12,
        rootMargin: '0px 0px -40px 0px'
    });

    reveals.forEach(function (el) {
        observer.observe(el);
    });
});
</script>

@endsection