@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard Admin')

@section('content')

<style>

    /* =========================================================
       DASHBOARD ADMIN
       SMK NEGERI 1 CIJATI
    ========================================================= */

    :root {
        --navy: #0B2545;
        --navy-2: #123B72;
        --cyan: #00A8B5;
        --cyan-light: #E6F8FA;

        --white: #ffffff;
        --bg: #F4F7FA;

        --text: #1E293B;
        --muted: #64748B;
        --line: #E2E8F0;
    }


    /* =========================================================
       CONTAINER
    ========================================================= */

    .dashboard-admin {
        width: 100%;
        max-width: 1400px;
        margin: 0 auto;
    }


    /* =========================================================
       HERO
    ========================================================= */

    .dashboard-hero {

        position: relative;

        width: 100%;
        min-height: 310px;

        border-radius: 26px;

        overflow: hidden;

        margin-bottom: 32px;

        background:
            url("{{ asset('images/sekolah/poto.sekolah.jpeg') }}")
            center center / cover no-repeat;

        box-shadow:
            0 18px 45px
            rgba(11, 37, 69, 0.20);
    }


    /* OVERLAY FOTO */

    .dashboard-hero::before {

        content: "";

        position: absolute;

        inset: 0;

        background:
            linear-gradient(
                100deg,
                rgba(11,37,69,0.96) 0%,
                rgba(11,37,69,0.88) 45%,
                rgba(11,37,69,0.60) 75%,
                rgba(0,168,181,0.35) 100%
            );

        z-index: 1;
    }


    /* =========================================================
       DEKORASI
    ========================================================= */

    .hero-decoration {

        position: absolute;

        border-radius: 50%;

        z-index: 2;

        pointer-events: none;

        background:
            rgba(255,255,255,0.08);
    }


    .hero-decoration.one {

        width: 240px;
        height: 240px;

        right: -80px;
        top: -90px;
    }


    .hero-decoration.two {

        width: 150px;
        height: 150px;

        right: 170px;
        bottom: -90px;

        background:
            rgba(0,168,181,0.15);
    }


    .hero-decoration.three {

        width: 60px;
        height: 60px;

        right: 310px;
        top: 45px;

        background:
            rgba(255,255,255,0.10);
    }


    /* =========================================================
       HERO CONTENT
    ========================================================= */

    .dashboard-hero-content {

        position: relative;

        z-index: 3;

        min-height: 310px;

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 40px;

        padding: 45px 55px;
    }


    /* =========================================================
       TEXT
    ========================================================= */

    .dashboard-welcome {

        max-width: 680px;

        color: white;
    }


    .dashboard-badge {

        display: inline-flex;

        align-items: center;

        gap: 8px;

        padding: 8px 15px;

        border-radius: 50px;

        background:
            rgba(255,255,255,0.12);

        border:
            1px solid
            rgba(255,255,255,0.20);

        color: #ffffff;

        font-size: 11px;

        font-weight: 800;

        letter-spacing: 0.7px;

        text-transform: uppercase;

        margin-bottom: 18px;
    }


    .dashboard-welcome h1 {

        margin: 0 0 12px;

        font-size: 36px;

        line-height: 1.2;

        font-weight: 800;

        color: #ffffff;
    }


    .dashboard-welcome h1 span {

        color: #62E3EA;
    }


    .dashboard-welcome p {

        margin: 0;

        max-width: 600px;

        font-size: 14px;

        line-height: 1.8;

        color:
            rgba(255,255,255,0.86);
    }


    /* =========================================================
       LOGO SEKOLAH
    ========================================================= */

    .dashboard-logo {

        width: 145px;

        height: 145px;

        flex-shrink: 0;

        padding: 12px;

        display: flex;

        align-items: center;

        justify-content: center;

        background: #ffffff;

        border-radius: 30px;

        border:
            5px solid
            rgba(255,255,255,0.22);

        box-shadow:
            0 20px 45px
            rgba(0,0,0,0.28);

        animation:
            logoFloat 4s ease-in-out infinite;
    }


    .dashboard-logo img {

        width: 100%;

        height: 100%;

        object-fit: contain;

        display: block;
    }


    @keyframes logoFloat {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-6px);
        }

    }


    /* =========================================================
       SECTION HEADER
    ========================================================= */

    .dashboard-heading {

        margin-bottom: 22px;
    }


    .dashboard-heading h2 {

        margin: 0;

        font-size: 23px;

        font-weight: 800;

        color: var(--navy);
    }


    .dashboard-heading-line {

        width: 55px;

        height: 4px;

        margin-top: 9px;

        border-radius: 20px;

        background:
            linear-gradient(
                90deg,
                var(--navy),
                var(--cyan)
            );
    }


    .dashboard-heading p {

        margin: 8px 0 0;

        font-size: 13px;

        color: var(--muted);
    }


    /* =========================================================
       GRID MENU
    ========================================================= */

    .dashboard-grid {

        display: grid;

        grid-template-columns:
            repeat(3, minmax(0, 1fr));

        gap: 22px;
    }


    /* =========================================================
       CARD
    ========================================================= */

    .dashboard-card {

        position: relative;

        display: block;

        min-height: 205px;

        padding: 25px;

        background:
            #ffffff;

        border:
            1px solid
            var(--line);

        border-radius: 21px;

        overflow: hidden;

        text-decoration: none;

        box-shadow:
            0 7px 22px
            rgba(11,37,69,0.06);

        transition:
            transform .3s ease,
            box-shadow .3s ease,
            border-color .3s ease;
    }


    .dashboard-card:hover {

        transform:
            translateY(-7px);

        box-shadow:
            0 18px 38px
            rgba(11,37,69,0.13);

        border-color:
            rgba(0,168,181,0.45);

        text-decoration: none;
    }


    /* =========================================================
       CARD DECORATION
    ========================================================= */

    .card-decoration {

        position: absolute;

        width: 125px;

        height: 125px;

        right: -55px;

        top: -55px;

        border-radius: 50%;

        opacity: .28;

        transition:
            transform .4s ease;
    }


    .dashboard-card:hover
    .card-decoration {

        transform:
            scale(1.5);
    }


    /* =========================================================
       ICON
    ========================================================= */

    .dashboard-icon {

        position: relative;

        z-index: 2;

        width: 56px;

        height: 56px;

        display: flex;

        align-items: center;

        justify-content: center;

        border-radius: 17px;

        font-size: 25px;

        transition:
            transform .3s ease;
    }


    .dashboard-card:hover
    .dashboard-icon {

        transform:
            rotate(-5deg)
            scale(1.08);
    }


    /* =========================================================
       CARD TEXT
    ========================================================= */

    .dashboard-card h3 {

        position: relative;

        z-index: 2;

        margin:
            17px 0 7px;

        color:
            var(--navy);

        font-size: 16px;

        font-weight: 800;
    }


    .dashboard-card p {

        position: relative;

        z-index: 2;

        margin: 0 0 15px;

        color:
            var(--muted);

        font-size: 12.5px;

        line-height: 1.65;

        min-height: 42px;
    }


    /* =========================================================
       CARD LINK
    ========================================================= */

    .dashboard-card-link {

        position: relative;

        z-index: 2;

        display: inline-flex;

        align-items: center;

        gap: 5px;

        font-size: 12px;

        font-weight: 800;

        transition:
            gap .2s ease;
    }


    .dashboard-card:hover
    .dashboard-card-link {

        gap: 10px;
    }


    /* =========================================================
       WARNA CARD
    ========================================================= */

    .card-blue .dashboard-icon {
        background: #E0E7FF;
    }

    .card-blue .card-decoration {
        background: #6366F1;
    }

    .card-blue .dashboard-card-link {
        color: #4F46E5;
    }


    .card-cyan .dashboard-icon {
        background: #CFFAFE;
    }

    .card-cyan .card-decoration {
        background: #06B6D4;
    }

    .card-cyan .dashboard-card-link {
        color: #0891B2;
    }


    .card-yellow .dashboard-icon {
        background: #FEF3C7;
    }

    .card-yellow .card-decoration {
        background: #F59E0B;
    }

    .card-yellow .dashboard-card-link {
        color: #D97706;
    }


    .card-green .dashboard-icon {
        background: #DCFCE7;
    }

    .card-green .card-decoration {
        background: #22C55E;
    }

    .card-green .dashboard-card-link {
        color: #16A34A;
    }


    .card-red .dashboard-icon {
        background: #FEE2E2;
    }

    .card-red .card-decoration {
        background: #EF4444;
    }

    .card-red .dashboard-card-link {
        color: #DC2626;
    }


    .card-purple .dashboard-icon {
        background: #EDE9FE;
    }

    .card-purple .card-decoration {
        background: #8B5CF6;
    }

    .card-purple .dashboard-card-link {
        color: #7C3AED;
    }


    .card-orange .dashboard-icon {
        background: #FFEDD5;
    }

    .card-orange .card-decoration {
        background: #F97316;
    }

    .card-orange .dashboard-card-link {
        color: #EA580C;
    }


    .card-pink .dashboard-icon {
        background: #FCE7F3;
    }

    .card-pink .card-decoration {
        background: #EC4899;
    }

    .card-pink .dashboard-card-link {
        color: #DB2777;
    }


    /* =========================================================
       INFO BOX
    ========================================================= */

    .dashboard-info {

        margin-top: 28px;

        display: flex;

        align-items: center;

        gap: 15px;

        padding: 19px 23px;

        border-radius: 18px;

        background:
            linear-gradient(
                135deg,
                #ffffff,
                #F8FAFC
            );

        border:
            1px solid
            var(--line);

        box-shadow:
            0 6px 20px
            rgba(11,37,69,0.04);
    }


    .dashboard-info-icon {

        width: 45px;

        height: 45px;

        flex-shrink: 0;

        display: flex;

        align-items: center;

        justify-content: center;

        border-radius: 14px;

        background:
            var(--cyan-light);

        color:
            var(--cyan);

        font-size: 21px;
    }


    .dashboard-info strong {

        display: block;

        margin-bottom: 3px;

        color:
            var(--navy);

        font-size: 13px;
    }


    .dashboard-info span {

        color:
            var(--muted);

        font-size: 12px;

        line-height: 1.5;
    }


    /* =========================================================
       TABLET
    ========================================================= */

    @media (max-width: 1050px) {

        .dashboard-grid {

            grid-template-columns:
                repeat(2, minmax(0, 1fr));
        }


        .dashboard-hero-content {

            padding:
                40px;
        }

    }


    /* =========================================================
       MOBILE
    ========================================================= */

    @media (max-width: 700px) {

        .dashboard-hero {

            min-height: auto;

            border-radius: 20px;
        }


        .dashboard-hero-content {

            min-height: auto;

            padding: 30px 24px;

            flex-direction: column;

            align-items: flex-start;

            gap: 25px;
        }


        .dashboard-logo {

            width: 100px;

            height: 100px;

            border-radius: 22px;

            order: -1;
        }


        .dashboard-welcome h1 {

            font-size: 27px;
        }


        .dashboard-welcome p {

            font-size: 13px;
        }


        .dashboard-grid {

            grid-template-columns: 1fr;

            gap: 16px;
        }


        .dashboard-card {

            min-height: 180px;
        }

    }


    @media (max-width: 480px) {

        .dashboard-hero-content {

            padding: 25px 20px;
        }


        .dashboard-welcome h1 {

            font-size: 24px;
        }


        .dashboard-info {

            align-items: flex-start;

            padding: 17px;
        }

    }

</style>



<div class="dashboard-admin">


    {{-- =====================================================
       HERO
    ====================================================== --}}

    <section class="dashboard-hero">


        {{-- DEKORASI --}}

        <div class="hero-decoration one"></div>

        <div class="hero-decoration two"></div>

        <div class="hero-decoration three"></div>



        <div class="dashboard-hero-content">


            {{-- =================================================
               TEKS SAMBUTAN
            ================================================== --}}

            <div class="dashboard-welcome">


                <div class="dashboard-badge">

                    🏫

                    ADMIN WEBSITE SEKOLAH

                </div>


                <h1>

                    <span> Welcome to the SMK Negeri 1 Cijati</span>

                </h1>


                <p>

                    website management portal. Use the control panel below to seamlessly update school information and customize the website layout
                </p>


            </div>



            {{-- =================================================
               LOGO SEKOLAH
            ================================================== --}}

            <div class="dashboard-logo">

                <img
                    src="{{ asset('images/logo-sekolah.png') }}"
                    alt="Logo SMK Negeri 1 Cijati"
                >

            </div>


        </div>

    </section>



    {{-- =====================================================
       JUDUL MENU
    ====================================================== --}}

    <div class="dashboard-heading">

        <h2>
            Menu Pengelolaan Website
        </h2>

        <div class="dashboard-heading-line"></div>

        <p>
            Kelola informasi website SMK Negeri 1 Cijati
            melalui menu berikut.
        </p>

    </div>



    {{-- =====================================================
       MENU
    ====================================================== --}}

    <div class="dashboard-grid">


        {{-- PROFIL --}}

        <a
            href="{{ route('admin.profil.index') }}"
            class="dashboard-card card-blue"
        >

            <div class="card-decoration"></div>

            <div class="dashboard-icon">
                🏫
            </div>

            <h3>
                Profil Sekolah
            </h3>

            <p>
                Kelola sejarah, visi, misi dan
                informasi sekolah.
            </p>

            <span class="dashboard-card-link">
                Kelola Profil →
            </span>

        </a>



        {{-- BERITA --}}

        <a
            href="{{ route('admin.berita.index') }}"
            class="dashboard-card card-cyan"
        >

            <div class="card-decoration"></div>

            <div class="dashboard-icon">
                📰
            </div>

            <h3>
                Berita
            </h3>

            <p>
                Kelola berita dan informasi
                terbaru sekolah.
            </p>

            <span class="dashboard-card-link">
                Kelola Berita →
            </span>

        </a>



        {{-- AGENDA --}}

        <a
            href="{{ route('admin.agenda.index') }}"
            class="dashboard-card card-yellow"
        >

            <div class="card-decoration"></div>

            <div class="dashboard-icon">
                📅
            </div>

            <h3>
                Agenda Sekolah
            </h3>

            <p>
                Kelola jadwal kegiatan dan
                acara sekolah.
            </p>

            <span class="dashboard-card-link">
                Kelola Agenda →
            </span>

        </a>



        {{-- GALERI --}}

        <a
            href="{{ route('admin.galeri.index') }}"
            class="dashboard-card card-green"
        >

            <div class="card-decoration"></div>

            <div class="dashboard-icon">
                🖼️
            </div>

            <h3>
                Galeri
            </h3>

            <p>
                Kelola foto dan dokumentasi
                kegiatan sekolah.
            </p>

            <span class="dashboard-card-link">
                Kelola Galeri →
            </span>

        </a>



        {{-- GURU --}}

        <a
            href="{{ route('admin.guru.index') }}"
            class="dashboard-card card-red"
        >

            <div class="card-decoration"></div>

            <div class="dashboard-icon">
                👨‍🏫
            </div>

            <h3>
                Guru & Pegawai
            </h3>

            <p>
                Kelola data guru dan tenaga
                kependidikan.
            </p>

            <span class="dashboard-card-link">
                Kelola Guru →
            </span>

        </a>



        {{-- JURUSAN --}}

        <a
            href="{{ route('admin.jurusan.index') }}"
            class="dashboard-card card-purple"
        >

            <div class="card-decoration"></div>

            <div class="dashboard-icon">
                🎓
            </div>

            <h3>
                Konsentrasi Keahlian
            </h3>

            <p>
                Kelola data jurusan dan
                konsentrasi keahlian.
            </p>

            <span class="dashboard-card-link">
                Kelola Jurusan →
            </span>

        </a>



        {{-- EKSTRAKURIKULER --}}

        <a
            href="{{ route('admin.ekskul.index') }}"
            class="dashboard-card card-cyan"
        >

            <div class="card-decoration"></div>

            <div class="dashboard-icon">
                ⚽
            </div>

            <h3>
                Ekstrakurikuler
            </h3>

            <p>
                Kelola kegiatan ekstrakurikuler
                siswa.
            </p>

            <span class="dashboard-card-link">
                Kelola Ekskul →
            </span>

        </a>



        {{-- FASILITAS --}}

        <a
            href="{{ route('admin.fasilitas.index') }}"
            class="dashboard-card card-orange"
        >

            <div class="card-decoration"></div>

            <div class="dashboard-icon">
                🏛️
            </div>

            <h3>
                Fasilitas
            </h3>

            <p>
                Kelola informasi sarana dan
                prasarana sekolah.
            </p>

            <span class="dashboard-card-link">
                Kelola Fasilitas →
            </span>

        </a>



        {{-- KONTAK --}}

        <a
            href="{{ route('admin.kontak.index') }}"
            class="dashboard-card card-pink"
        >

            <div class="card-decoration"></div>

            <div class="dashboard-icon">
                📬
            </div>

            <h3>
                Pesan Kontak
            </h3>

            <p>
                Lihat pesan yang dikirim
                pengunjung website.
            </p>

            <span class="dashboard-card-link">
                Lihat Pesan →
            </span>

        </a>


    </div>



    {{-- =====================================================
       INFO
    ====================================================== --}}

    <div class="dashboard-info">


        <div class="dashboard-info-icon">
            💡
        </div>


        <div>

            <strong>
                Informasi Admin
            </strong>

            <span>
                Perubahan data melalui dashboard akan
                digunakan untuk memperbarui informasi
                yang ditampilkan pada website sekolah.
            </span>

        </div>


    </div>


</div>

@endsection