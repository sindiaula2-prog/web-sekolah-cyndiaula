@extends('layouts.app')

@section('title', 'Konsentrasi Keahlian - SMK Negeri 1 Cijati')

@section('styles')

<style>
    :root {
        --primary: #0B2545;
        --primary-light: #123B72;
        --accent: #00A8B5;
        --accent-light: #e6f8fa;
        --bg-color: #f0f4f8;
        --card-bg: #ffffff;
        --text-main: #0B2545;
        --text-muted: #64748b;
    }

    * {
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: var(--bg-color);
        color: var(--text-main);
    }

    /* =========================================================
       HERO
    ========================================================= */

    .hero-banner-jurusan {
        position: relative;
        width: 100%;
        min-height: 340px;

        background:
            url('{{ asset("images/sekolah/poto.sekolah.jpeg") }}')
            center / cover no-repeat;

        display: flex;
        align-items: center;
        justify-content: center;

        overflow: hidden;
        padding: 60px 20px;
    }

    .hero-banner-jurusan::before {
        content: "";
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

    /* WATERMARK */

    .hero-watermark-jurusan {
        position: absolute;
        inset: 0;

        display: flex;
        align-items: center;
        justify-content: center;

        z-index: 2;
        pointer-events: none;

        overflow: hidden;
    }

    .hero-watermark-jurusan span {
        font-size: clamp(60px, 12vw, 160px);
        font-weight: 900;

        color: rgba(255, 255, 255, 0.06);

        letter-spacing: 18px;
        white-space: nowrap;
    }

    /* HERO CARD */

    .hero-card-jurusan {
        position: relative;
        z-index: 3;

        width: 100%;
        max-width: 700px;

        padding: 36px 46px;

        text-align: center;
        color: #ffffff;

        background: rgba(11, 37, 69, 0.55);

        backdrop-filter: blur(10px);

        border:
            1px solid rgba(255, 255, 255, 0.12);

        border-radius: 24px;

        box-shadow:
            0 20px 50px rgba(0, 0, 0, 0.25);
    }

    .hero-breadcrumb-jurusan {
        font-size: 12.5px;
        font-weight: 700;

        letter-spacing: 0.5px;

        color: #CBD5E1;

        margin-bottom: 18px;
    }

    .hero-breadcrumb-jurusan a {
        color: #E0F2FE;
        text-decoration: none;
    }

    .hero-breadcrumb-jurusan a:hover {
        text-decoration: underline;
    }

    .hero-icon-jurusan {
        width: 78px;
        height: 78px;

        object-fit: contain;

        padding: 8px;

        background: #ffffff;

        border-radius: 50%;

        margin-bottom: 14px;

        box-shadow:
            0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .hero-card-jurusan h1 {
        font-size: 30px;
        font-weight: 800;

        margin-bottom: 8px;

        letter-spacing: -0.3px;

        text-shadow:
            0 2px 6px rgba(0, 0, 0, 0.3);
    }

    .hero-card-jurusan p {
        font-size: 14px;

        color: #E2F1F8;

        font-weight: 500;

        margin: 0;
    }

    /* =========================================================
       CONTENT
    ========================================================= */

    .jurusan-section {
        max-width: 1080px;

        margin: -50px auto 0;

        padding:
            0 20px 60px;

        position: relative;

        z-index: 5;
    }

    /* =========================================================
       HEADER
    ========================================================= */

    .section-header {
        text-align: center;

        background: var(--card-bg);

        border-radius: 24px;

        padding: 35px 30px;

        margin-bottom: 32px;

        box-shadow:
            0 15px 35px rgba(11, 37, 69, 0.08);

        border:
            1px solid rgba(0, 168, 181, 0.10);
    }

    .section-header h2 {
        position: relative;

        display: inline-block;

        font-size: 2rem;

        font-weight: 800;

        color: var(--primary);

        margin: 0;

        padding-bottom: 14px;

        letter-spacing: -0.4px;
    }

    .section-header h2::after {
        content: "";

        position: absolute;

        left: 50%;
        bottom: 0;

        transform: translateX(-50%);

        width: 56px;
        height: 4px;

        border-radius: 4px;

        background:
            linear-gradient(
                90deg,
                var(--primary),
                var(--accent)
            );
    }

    .section-header p {
        color: var(--text-muted);

        font-size: 0.98rem;

        margin:
            18px auto 0;

        max-width: 680px;

        line-height: 1.7;
    }

    /* =========================================================
       GRID
    ========================================================= */

    .jurusan-grid {
        display: grid;

        grid-template-columns:
            repeat(2, minmax(0, 1fr));

        gap: 30px;
    }

    /* =========================================================
       CARD
    ========================================================= */

    .jurusan-card {
        position: relative;

        display: flex;
        flex-direction: column;

        height: 100%;

        overflow: hidden;

        background: var(--card-bg);

        border-radius: 24px;

        border:
            1px solid rgba(0, 168, 181, 0.08);

        box-shadow:
            0 15px 35px rgba(11, 37, 69, 0.08);

        transition:
            transform 0.3s ease,
            box-shadow 0.3s ease;
    }

    .jurusan-card::before {
        content: "";

        position: absolute;

        top: 0;
        left: 0;
        right: 0;

        height: 5px;

        background:
            linear-gradient(
                90deg,
                var(--primary),
                var(--accent)
            );

        z-index: 3;
    }

    .jurusan-card:hover {
        transform: translateY(-7px);

        box-shadow:
            0 22px 45px rgba(11, 37, 69, 0.14);
    }

    /* =========================================================
       LOGO
    ========================================================= */

    .jurusan-image-box {
        position: relative;

        width: 100%;
        height: 300px;

        display: flex;

        align-items: center;
        justify-content: center;

        padding: 24px;

        background:
            radial-gradient(
                circle at center,
                var(--accent-light) 0%,
                #f4f8fb 75%
            );

        border-bottom:
            1px solid #eef2f6;

        overflow: hidden;
    }

    .jurusan-image-box img {
        max-width: 82%;
        max-height: 82%;

        width: auto;
        height: auto;

        object-fit: contain;

        padding: 12px;

        background: #ffffff;

        border-radius: 22px;

        filter:
            drop-shadow(
                0 10px 18px
                rgba(11, 37, 69, 0.12)
            );

        transition:
            transform 0.4s ease;
    }

    .jurusan-card:hover
    .jurusan-image-box img {
        transform: scale(1.05);
    }

    /* =========================================================
       BADGE
    ========================================================= */

    .jurusan-badge {
        position: absolute;

        top: 18px;
        left: 18px;

        padding:
            7px 15px;

        border-radius: 30px;

        background:
            rgba(11, 37, 69, 0.92);

        color: #ffffff;

        font-size: 0.75rem;

        font-weight: 700;

        letter-spacing: 0.5px;

        box-shadow:
            0 5px 12px
            rgba(11, 37, 69, 0.20);

        backdrop-filter: blur(8px);

        z-index: 2;
    }

    /* =========================================================
       CONTENT CARD
    ========================================================= */

    .jurusan-card-content {
        padding: 28px 26px 30px;

        display: flex;

        flex-direction: column;

        flex: 1;
    }

    .jurusan-title {
        display: block;

        color: var(--primary);

        text-decoration: none;

        font-size: 1.25rem;

        font-weight: 750;

        line-height: 1.45;

        margin-bottom: 12px;

        transition:
            color 0.2s ease;
    }

    .jurusan-title:hover {
        color: var(--accent);
    }

    .jurusan-excerpt {
        color: var(--text-muted);

        font-size: 0.93rem;

        line-height: 1.7;

        margin-bottom: 22px;

        display: -webkit-box;

        -webkit-line-clamp: 3;

        -webkit-box-orient: vertical;

        overflow: hidden;

        flex: 1;
    }

    /* =========================================================
       BUTTON
    ========================================================= */

    .detail-btn {
        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 9px;

        width: fit-content;

        padding:
            11px 20px;

        border-radius: 14px;

        background: var(--primary);

        color: #ffffff;

        text-decoration: none;

        font-size: 0.88rem;

        font-weight: 700;

        transition:
            all 0.25s ease;

        box-shadow:
            0 5px 14px
            rgba(11, 37, 69, 0.12);
    }

    .detail-btn span {
        font-size: 1rem;

        transition:
            transform 0.25s ease;
    }

    .detail-btn:hover {
        background: var(--accent);

        color: #ffffff;

        transform: translateY(-2px);

        box-shadow:
            0 8px 18px
            rgba(0, 168, 181, 0.22);
    }

    .detail-btn:hover span {
        transform: translateX(4px);
    }

    /* =========================================================
       EMPTY
    ========================================================= */

    .empty-jurusan {
        grid-column: 1 / -1;

        background: #ffffff;

        border-radius: 24px;

        padding: 60px 30px;

        text-align: center;

        color: var(--text-muted);

        box-shadow:
            0 15px 35px
            rgba(11, 37, 69, 0.08);
    }

    .empty-jurusan-icon {
        font-size: 45px;

        color: var(--accent);

        margin-bottom: 15px;
    }

    .empty-jurusan p {
        margin: 0;

        font-size: 0.95rem;
    }

    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 768px) {

        .hero-banner-jurusan {
            min-height: 300px;

            padding:
                45px 15px;
        }

        .hero-card-jurusan {
            padding:
                28px 24px;
        }

        .hero-card-jurusan h1 {
            font-size: 23px;
        }

        .hero-watermark-jurusan span {
            font-size: 65px;

            letter-spacing: 10px;
        }

        .jurusan-section {
            margin-top: -35px;

            padding:
                0 15px 45px;
        }

        .section-header {
            padding:
                28px 20px;
        }

        .section-header h2 {
            font-size: 1.7rem;
        }

        .jurusan-grid {
            grid-template-columns: 1fr;

            gap: 24px;
        }

        .jurusan-image-box {
            height: 270px;
        }
    }

    @media (max-width: 480px) {

        .hero-card-jurusan {
            padding:
                25px 18px;
        }

        .hero-icon-jurusan {
            width: 68px;
            height: 68px;
        }

        .hero-card-jurusan h1 {
            font-size: 20px;
        }

        .hero-card-jurusan p {
            font-size: 13px;
        }

        .jurusan-image-box {
            height: 245px;
        }

        .jurusan-card-content {
            padding:
                24px 20px 25px;
        }

        .detail-btn {
            width: 100%;
        }
    }
</style>

@endsection

@section('content')

<!-- =========================================================
     HERO
========================================================= -->

<section class="hero-banner-jurusan">

```
<div class="hero-watermark-jurusan">
    <span>SMK N 1 CIJATI</span>
</div>

<div class="hero-card-jurusan">

    <div class="hero-breadcrumb-jurusan">

        <a href="{{ route('beranda') }}">
            Beranda
        </a>

        &raquo;

        Konsentrasi Keahlian

    </div>

    <img
        src="{{ asset('images/logo-sekolah.png') }}"
        alt="Logo SMK Negeri 1 Cijati"
        class="hero-icon-jurusan"
    >

    <h1>
        Konsentrasi Keahlian
    </h1>

    <p>
        Pilihan Konsentrasi Keahlian
        SMK Negeri 1 Cijati
    </p>

</div>
```

</section>

<!-- =========================================================
     CONTENT
========================================================= -->

<section class="jurusan-section">

```
<!-- HEADER -->

<div class="section-header">

    <h2>
        Konsentrasi Keahlian
    </h2>

    <p>
        Pilihan program keahlian unggulan
        di SMK Negeri 1 Cijati untuk
        mencetak lulusan terampil,
        berkarakter, dan siap menghadapi
        dunia kerja.
    </p>

</div>


<!-- GRID -->

<div class="jurusan-grid">

    @forelse($jurusans as $item)

        <article class="jurusan-card">

            <!-- =================================================
                 LOGO
            ================================================== -->

            <div class="jurusan-image-box">

                @php

                    /*
                    |--------------------------------------------------------------------------
                    | LOGO JURUSAN
                    |--------------------------------------------------------------------------
                    */

                    $logoPath =
                        $item->logo
                        ?? $item->gambar
                        ?? null;

                    $imgSrc =
                        asset('images/default.jpg');


                    /*
                    |--------------------------------------------------------------------------
                    | JIKA LOGO ADA
                    |--------------------------------------------------------------------------
                    */

                    if (!empty($logoPath)) {

                        /*
                        | URL
                        */

                        if (
                            \Illuminate\Support\Str::startsWith(
                                $logoPath,
                                'http'
                            )
                        ) {

                            $imgSrc =
                                $logoPath;

                        }

                        /*
                        | FILE PUBLIC/IMAGES
                        */

                        elseif (
                            \Illuminate\Support\Str::startsWith(
                                $logoPath,
                                'images/'
                            )
                        ) {

                            if (
                                file_exists(
                                    public_path($logoPath)
                                )
                            ) {

                                $imgSrc =
                                    asset($logoPath);
                            }

                        }

                        /*
                        | FILE STORAGE
                        */

                        else {

                            $imgSrc =
                                asset(
                                    'storage/' .
                                    $logoPath
                                );
                        }
                    }

                @endphp


                <img
                    src="{{ $imgSrc }}"
                    alt="{{ $item->nama_jurusan ?? $item->nama ?? 'Jurusan' }}"
                    loading="lazy"
                    onerror="this.src='{{ asset('images/default.jpg') }}'"
                >


                <!-- BADGE -->

                <span class="jurusan-badge">

                    {{
                        strtoupper(
                            $item->kode_jurusan
                            ?? $item->kode
                            ?? 'JURUSAN'
                        )
                    }}

                </span>

            </div>


            <!-- =================================================
                 CARD CONTENT
            ================================================== -->

            <div class="jurusan-card-content">

                <!-- NAMA -->

                <a
                    href="{{ route(
                        'jurusan.detail',
                        $item->kode_jurusan
                        ?? $item->kode
                        ?? $item->id
                    ) }}"
                    class="jurusan-title"
                >

                    {{
                        $item->nama_jurusan
                        ?? $item->nama
                        ?? 'Konsentrasi Keahlian'
                    }}

                </a>


                <!-- DESKRIPSI -->

                <p class="jurusan-excerpt">

                    {{
                        \Illuminate\Support\Str::limit(
                            strip_tags(
                                $item->deskripsi ?? ''
                            ),
                            150
                        )
                    }}

                </p>


                <!-- BUTTON -->

                <a
                    href="{{ route(
                        'jurusan.detail',
                        $item->kode_jurusan
                        ?? $item->kode
                        ?? $item->id
                    ) }}"
                    class="detail-btn"
                >

                    Lihat Detail

                    <span>
                        &rarr;
                    </span>

                </a>

            </div>

        </article>

    @empty

        <div class="empty-jurusan">

            <div class="empty-jurusan-icon">
                📚
            </div>

            <p>
                Belum ada data konsentrasi keahlian
                yang tersedia saat ini.
            </p>

        </div>

    @endforelse

</div>
```

</section>

@endsection
