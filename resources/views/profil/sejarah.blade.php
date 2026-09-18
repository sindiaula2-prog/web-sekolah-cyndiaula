@extends('layouts.app')

@section('title', isset($profil) ? $profil->judul . ' - SMK Negeri 1 Cijati' : 'Sejarah Singkat - SMK Negeri 1 Cijati')

@section('styles')
<style>
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

    .profil-hero {
        position: relative;
        background: linear-gradient(rgba(11, 37, 69, 0.85), rgba(11, 37, 69, 0.92)),
                    url("{{ file_exists(public_path('images/sekolah/sekolah.jpg.png')) ? asset('images/sekolah/sekolah.jpg.png') : asset('images/image_c6c626.png') }}") center/cover no-repeat;
        padding: 95px 20px 75px 20px;
        text-align: center;
        color: #ffffff;
    }

    .profil-hero-box {
        max-width: 800px;
        margin: 0 auto;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 20px;
        padding: 40px 30px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.2);
    }

    .profil-breadcrumb {
        font-size: 0.95rem;
        color: #DCE6F2;
        margin-bottom: 12px;
        font-weight: 500;
    }

    .profil-title {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 14px;
        letter-spacing: 0.5px;
    }

    .profil-subtitle {
        font-size: 1.12rem;
        color: #D6E1F0;
        line-height: 1.6;
        max-width: 680px;
        margin: 0 auto;
    }

    .profil-layout-full {
        max-width: 960px;
        margin: -40px auto 60px auto;
        padding: 0 24px;
        position: relative;
        z-index: 10;
    }

    .profil-content-card {
        background: #ffffff;
        border-radius: 20px;
        border: 1px solid var(--line);
        box-shadow: 0 12px 35px rgba(0,0,0,0.06);
        padding: 50px 60px;
        margin-bottom: 40px;
    }

    .content-section-title {
        font-size: 2.2rem;
        font-weight: 800;
        color: var(--navy);
        margin-bottom: 12px;
    }

    .content-divider {
        width: 70px;
        height: 4px;
        background: var(--cyan);
        margin-bottom: 32px;
        border-radius: 2px;
    }

    .prose-text {
        color: var(--ink-soft);
        font-size: 1.1rem;
        line-height: 1.9;
        margin-bottom: 24px;
        text-align: justify;
    }

    .prose-text strong {
        color: var(--navy);
    }

    .leader-list {
        list-style: none;
        padding: 0;
        margin: 20px 0 24px 0;
    }

    .leader-list li {
        position: relative;
        padding: 12px 16px 12px 24px;
        margin-bottom: 10px;
        background: var(--paper);
        border-left: 4px solid var(--cyan);
        border-radius: 0 8px 8px 0;
        color: var(--ink-soft);
        font-size: 1.05rem;
        font-weight: 500;
    }

    @media (max-width: 992px) {
        .profil-title { font-size: 2.3rem; }
        .profil-content-card { padding: 30px 24px; }
        .profil-layout-full { margin-top: -20px; }
    }
</style>
@endsection

@section('content')

<!-- HERO HEADER PROFIL -->
<div class="profil-hero">
    <div class="profil-hero-box">
        <div class="profil-breadcrumb">Beranda &nbsp;/&nbsp; Profil Sekolah &nbsp;/&nbsp; Sejarah</div>
        <h1 class="profil-title">{{ isset($profil) ? $profil->judul : 'Sejarah Singkat' }}</h1>
        <p class="profil-subtitle">
            Mengenal awal berdirinya SMK Negeri 1 Cijati hingga perkembangannya saat ini.
        </p>
    </div>
</div>

<!-- KONTEN UTAMA FULL WIDTH -->
<div class="profil-layout-full">
    <div class="profil-content-card">
        <div id="sejarah">
            <h2 class="content-section-title">{{ isset($profil) ? $profil->judul : 'Sejarah SMK Negeri 1 Cijati' }}</h2>
            <div class="content-divider"></div>
            
            @if(isset($profil) && $profil->konten)
                {{-- Jika data dari database ada, tampilkan isinya (mendukung tag HTML) --}}
                <div class="prose-text">
                    {!! $profil->konten !!}
                </div>
            @else
                {{-- Fallback jika database kosong --}}
                <p class="prose-text">
                    Berawal dari keinginan kuat dari seorang pendidik bernama <strong>H. Dede Kartiman</strong> yang menginginkan adanya pemerataan pendidikan menengah kejuruan untuk daerah-daerah yang terpencil, terutama Kecamatan Cijati yang terletak di Kabupaten Cianjur.
                </p>
                <p class="text-muted fst-italic">Konten dinamis belum diatur sepenuhnya di database.</p>
            @endif
        </div>
    </div>
</div>

@endsection