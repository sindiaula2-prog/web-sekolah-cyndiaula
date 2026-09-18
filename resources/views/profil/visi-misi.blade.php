@extends('layouts.app')

@section('title', 'Visi & Misi - SMK Negeri 1 Cijati')

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
        border: 1px solid rgba(255, 255, 255, 0.2); 
        border-radius: 20px; 
        padding: 40px 30px; 
        box-shadow: 0 15px 35px rgba(0,0,0,0.2); 
    }
    .profil-breadcrumb { font-size: 0.95rem; color: #DCE6F2; margin-bottom: 12px; font-weight: 500; }
    .profil-title { font-size: 3rem; font-weight: 800; margin-bottom: 14px; letter-spacing: 0.5px; }
    .profil-subtitle { font-size: 1.12rem; color: #D6E1F0; line-height: 1.6; max-width: 680px; margin: 0 auto; }
    
    /* Layout */
    .profil-layout-full { 
        max-width: 900px; 
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
        padding: 50px; 
    }
    
    .content-section-title { font-size: 2rem; font-weight: 800; color: var(--navy); margin-bottom: 10px; text-align: center; }
    .content-divider { width: 60px; height: 3.5px; background: var(--cyan); margin: 0 auto 35px auto; border-radius: 2px; }
    
    .sub-heading { 
        font-size: 1.4rem; 
        font-weight: 700; 
        color: var(--navy); 
        margin-top: 35px; 
        margin-bottom: 15px; 
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .sub-heading::before {
        content: '';
        display: inline-block;
        width: 8px;
        height: 22px;
        background: var(--cyan);
        border-radius: 4px;
    }

    /* Styling Kotak Visi Estetik */
    .vision-box { 
        background: linear-gradient(135deg, #f0f7ff 0%, #e6f4f8 100%); 
        border-left: 6px solid var(--cyan); 
        padding: 28px 32px; 
        border-radius: 0 16px 16px 0; 
        font-size: 1.2rem; 
        font-weight: 600; 
        color: var(--navy); 
        line-height: 1.85; 
        box-shadow: 0 6px 20px rgba(0, 168, 181, 0.08);
        font-style: italic; 
        text-align: center;
    }

    /* Styling List Misi Estetik */
    .mission-list { 
        list-style-type: none; 
        padding-left: 0; 
        counter-reset: item; 
    }
    .mission-list li { 
        position: relative; 
        padding: 16px 20px 16px 55px; 
        margin-bottom: 16px; 
        background: var(--paper);
        border: 1px solid var(--line);
        border-radius: 12px;
        color: var(--ink-soft); 
        font-size: 1.05rem; 
        line-height: 1.7; 
        text-align: justify; 
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .mission-list li:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0,0,0,0.04);
        border-color: #cbd5e1;
    }
    .mission-list li::before { 
        content: counter(item); 
        counter-increment: item; 
        position: absolute; 
        left: 18px; 
        top: 50%; 
        transform: translateY(-50%);
        width: 28px; 
        height: 28px; 
        background: var(--navy); 
        color: white; 
        border-radius: 50%; 
        display: flex; 
        align-items: center; 
        justify-content: center; 
        font-size: 0.9rem; 
        font-weight: 700; 
    }

    @media (max-width: 992px) { 
        .profil-title { font-size: 2.3rem; } 
        .profil-content-card { padding: 30px 20px; }
        .vision-box { font-size: 1.1rem; padding: 20px; }
    }
</style>
@endsection

@section('content')

<div class="profil-hero">
    <div class="profil-hero-box">
        <div class="profil-breadcrumb">Beranda &nbsp;/&nbsp; Profil Sekolah &nbsp;/& colspan;&nbsp; Visi &amp; Misi</div>
        <h1 class="profil-title">Visi &amp; Misi</h1>
        <p class="profil-subtitle">Landasan arah dan tujuan pengembangan mutu pendidikan di SMK Negeri 1 Cijati.</p>
    </div>
</div>

<div class="profil-layout-full">
    <div class="profil-content-card">
        <div id="visi-misi">
            <h2 class="content-section-title">Visi &amp; Misi Sekolah</h2>
            <div class="content-divider"></div>
            
            @if(isset($profil) && !empty($profil->konten))
                <div class="prose-text">
                    {!! $profil->konten !!}
                </div>
            @else
                <!-- Visi Estetik -->
                <h3 class="sub-heading">Visi</h3>
                <div class="vision-box">
                    “Terwujudnya lulusan KEREN dan BERSINERGI melalui pembelajaran mendalam, penguatan karakter Pancawaluya, serta kolaborasi aktif dengan dunia kerja dan industri.”
                </div>

                <!-- Misi Lengkap & Estetik -->
                <h3 class="sub-heading">Misi</h3>
                <ol class="mission-list">
                    <li>Menyelenggarakan pembelajaran mendalam yang berpusat pada peserta didik untuk mengembangkan kompetensi secara optimal.</li>
                    <li>Menumbuhkan karakter religius, energik, dan nasionalis dalam kehidupan sehari-hari melalui penguatan nilai-nilai Pancawaluya.</li>
                    <li>Mengembangkan lulusan yang kompeten dan berdaya saing sesuai dengan kebutuhan dunia kerja dan perkembangan zaman.</li>
                    <li>Menanamkan jiwa kewirausahaan (entrepreneurship) melalui kegiatan pembelajaran dan praktik nyata.</li>
                    <li>Menumbuhkan integritas, etos kerja, dan tanggung jawab melalui pembiasaan, keteladanan, dan budaya sekolah yang positif.</li>
                </ol>
            @endif
        </div>
    </div>
</div

@endsection