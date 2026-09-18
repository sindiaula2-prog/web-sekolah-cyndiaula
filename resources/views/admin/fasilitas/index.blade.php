@extends('layouts.admin')

@section('title', 'Kelola Fasilitas')
@section('page-title', 'Kelola Fasilitas')

@section('content')

<h5 class="fw-bold mb-3" style="color:#0B2545;">Daftar Fasilitas Sekolah</h5>

<a href="{{ route('admin.fasilitas.create') }}" class="btn btn-primary btn-sm mb-3">
    + Tambah Fasilitas
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
                    <th>Nama Fasilitas</th>
                    <th>Deskripsi</th>
                    <th style="width:110px;" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($fasilitas as $index => $item)
                <tr>
                    <td class="text-muted">{{ $index + 1 }}</td>
                    <td>
                        <img src="{{ $item->foto ? asset($item->foto) : asset('images/default.jpg') }}"
                             alt="{{ $item->nama_fasilitas }}"
                             style="width:70px; height:50px; object-fit:cover; border-radius:8px; display:block;">
                    </td>
                    <td class="fw-semibold" style="color:#0B2545;">
                        {{ $item->nama_fasilitas }}
                    </td>
                    <td class="text-muted small">
                        {{ \Illuminate\Support\Str::limit($item->deskripsi, 70) }}
                    </td>
                    <td>
                        <div class="d-flex justify-content-center gap-1">
                            <a href="{{ route('admin.fasilitas.edit', $item->id) }}"
                               class="btn btn-warning btn-sm" title="Edit">
                                ✏️
                            </a>
                            <form action="{{ route('admin.fasilitas.destroy', $item->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus fasilitas ini?');">
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
                        Belum ada data fasilitas. Klik "Tambah Fasilitas" untuk menambahkan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection