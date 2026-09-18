@extends('layouts.admin')

@section('title', 'Kelola Berita')
@section('page-title', 'Kelola Berita')

@section('styles')
<style>
    /* Mengatur ukuran ikon panah pagination agar normal di admin */
    .pagination svg {
        width: 16px !important;
        height: 16px !important;
    }
    .pagination {
        margin-bottom: 0;
        gap: 4px;
    }
    .page-item .page-link {
        border-radius: 6px;
        font-size: 0.85rem;
        color: #0B2545;
    }
    .page-item.active .page-link {
        background-color: #0B2545;
        border-color: #0B2545;
        color: #fff;
    }
</style>
@endsection

@section('content')

<h5 class="fw-bold mb-3" style="color:#0B2545;">Daftar Berita & Informasi</h5>

<a href="{{ route('admin.berita.create') }}" class="btn btn-primary btn-sm mb-3">
    + Tambah Berita
</a>

@if(session('success'))
    <div class="alert alert-success py-2 px-3 mb-3" style="border-radius:8px;">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white rounded-3 shadow-sm overflow-hidden">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead style="background:#F4F7FB;">
                <tr>
                    <th style="width:40px;">#</th>
                    <th style="width:100px;">Foto</th>
                    <th>Judul & Ringkasan</th>
                    <th style="width:170px;">Tanggal</th>
                    <th style="width:110px;" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($beritas as $index => $item)
                <tr>
                    <td class="text-muted">{{ $beritas->firstItem() + $index }}</td>
                    <td>
                        @php
                            if ($item->gambar) {
                                if (\Illuminate\Support\Str::startsWith($item->gambar, 'http')) {
                                    $imgSrc = $item->gambar;
                                } elseif (\Illuminate\Support\Str::contains($item->gambar, 'images/')) {
                                    $imgSrc = asset($item->gambar);
                                } else {
                                    $imgSrc = asset('images/berita/' . $item->gambar);
                                }
                            } else {
                                $imgSrc = asset('images/default.jpg');
                            }
                        @endphp
                        <img src="{{ $imgSrc }}" alt="{{ $item->judul }}"
                             style="width:70px; height:50px; object-fit:cover; border-radius:8px; display:block;">
                    </td>
                    <td>
                        <div class="fw-semibold" style="color:#0B2545;">{{ $item->judul }}</div>
                        <div class="text-muted small">
                            {{ \Illuminate\Support\Str::limit(strip_tags($item->konten), 60) }}
                        </div>
                    </td>
                    <td class="text-muted small">
                        {{ $item->created_at->translatedFormat('d M Y, H:i') }}
                    </td>
                    <td>
                        <div class="d-flex justify-content-center gap-1">
                            <a href="{{ route('admin.berita.edit', $item->id) }}"
                               class="btn btn-warning btn-sm" title="Edit">
                                ✏️
                            </a>
                            <form action="{{ route('admin.berita.destroy', $item->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus berita ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                    🗑️
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted py-4">
                        Belum ada berita. Klik "Tambah Berita" untuk menambahkan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($beritas->hasPages())
    <div class="p-3 d-flex justify-content-end">
        {{ $beritas->links() }}
    </div>
    @endif
</div>

@endsection