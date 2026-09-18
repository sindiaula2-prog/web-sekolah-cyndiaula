@extends('layouts.app')

@section('title', $berita->judul . ' - SMK Negeri 1 Cijati')

@section('styles')
<style>
    .detail-container {
        max-width: 1200px;
        margin: 40px auto;
        padding: 0 5%;
        display: grid;
        grid-template-columns: 2.5fr 1fr;
        gap: 30px;
    }

    .main-detail {
        background: #ffffff;
        padding: 30px;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
    }

    .detail-title {
        font-size: 1.8rem;
        font-weight: 800;
        color: #0f172a;
        line-height: 1.3;
        margin-bottom: 10px;
    }

    .detail-meta {
        font-size: 0.85rem;
        color: #0284c7;
        font-weight: 600;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 1px solid #e2e8f0;
    }

    .detail-image-box {
        width: 100%;
        max-height: 420px;
        overflow: hidden;
        border-radius: 10px;
        margin-bottom: 25px;
        background: #f1f5f9;
    }

    .detail-image-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .detail-content {
        font-size: 0.98rem;
        line-height: 1.8;
        color: #334155;
    }

    .sidebar-widget {
        background: #ffffff;
        padding: 25px;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
        height: fit-content;
    }

    .widget-title {
        font-size: 1.15rem;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 20px;
        border-bottom: 2px solid #0284c7;
        padding-bottom: 8px;
    }

    .sidebar-news-list {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .sidebar-news-item a {
        text-decoration: none;
        color: #0f172a;
        font-weight: 600;
        font-size: 0.9rem;
        line-height: 1.4;
        transition: color 0.2s ease;
    }

    .sidebar-news-item a:hover {
        color: #0284c7;
    }

    .sidebar-news-date {
        font-size: 0.75rem;
        color: #64748b;
        margin-top: 4px;
        display: block;
    }

    @media (max-width: 900px) {
        .detail-container {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('content')
<div class="detail-container">
    
    <!-- Konten Utama Detail Berita -->
    <main class="main-detail">
        <h1 class="detail-title">{{ $berita->judul }}</h1>
        
        <div class="detail-meta">
            📅 {{ $berita->created_at ? $berita->created_at->format('d F Y') : '-' }} | 👤 Admin
        </div>

        @if($berita->gambar)
            @php
                if (\Illuminate\Support\Str::startsWith($berita->gambar, 'http')) {
                    $imgSrc = $berita->gambar;
                } elseif (\Illuminate\Support\Str::contains($berita->gambar, 'images/')) {
                    $imgSrc = asset($berita->gambar);
                } else {
                    $imgSrc = asset('images/berita/' . $berita->gambar);
                }
            @endphp
            <div class="detail-image-box">
                <img src="{{ $imgSrc }}" alt="{{ $berita->judul }}">
            </div>
        @endif

        <div class="detail-content">
            {!! nl2br(e($berita->konten)) !!}
        </div>
    </main>

    <!-- Sidebar Berita Lainnya -->
    <aside class="sidebar-widget">
        <h3 class="widget-title">Berita Terbaru</h3>
        <ul class="sidebar-news-list">
            @forelse($beritaTerbaru as $item)
                <li class="sidebar-news-item">
                    <a href="{{ route('berita.show', $item->id) }}">{{ $item->judul }}</a>
                    <span class="sidebar-news-date">📅 {{ $item->created_at ? $item->created_at->format('d M Y') : '-' }}</span>
                </li>
            @empty
                <li style="color: #64748b; font-size: 0.85rem;">Belum ada berita lainnya.</li>
            @endforelse
        </ul>
    </aside>

</div>
@endsection