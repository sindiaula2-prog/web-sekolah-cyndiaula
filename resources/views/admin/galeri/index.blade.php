@extends('layouts.admin')

@section('title', 'Kelola Galeri')
@section('page-title', 'Kelola Galeri')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-bold m-0" style="color:#0B2545;">Daftar Foto Galeri</h5>
    <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary fw-semibold">+ Tambah Foto</a>
</div>

<div class="admin-card p-0">
    <table class="table table-hover align-middle mb-0">
        <thead class="table-light">
            <tr>
                <th class="px-3">Foto</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($galeris as $item)
                <tr>
                    <td class="px-3">
                        <img src="{{ asset('images/galeri/' . $item->foto) }}" alt="{{ $item->judul }}"
                             style="width: 90px; height: 60px; object-fit: cover; border-radius: 6px;">
                    </td>
                    <td class="fw-semibold" style="color:#0B2545;">{{ $item->judul }}</td>
                    <td>
                        <span class="badge" style="background:#e0f2fe; color:#0284c7;">
                            {{ ucwords(str_replace('_', ' ', $item->kategori)) }}
                        </span>
                    </td>
                    <td class="text-muted small" style="max-width: 280px;">
                        {{ Str::limit($item->deskripsi, 80) }}
                    </td>
                    <td class="text-center" style="white-space:nowrap;">
                        <a href="{{ route('admin.galeri.edit', $item->id) }}" class="btn btn-warning btn-sm text-white fw-semibold">
                            Edit
                        </a>
                        <form action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Yakin ingin menghapus foto ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm fw-semibold">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted py-4">Belum ada data galeri.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection