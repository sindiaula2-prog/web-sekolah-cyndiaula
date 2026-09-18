@extends('layouts.admin')

@section('title', 'Konsentrasi Keahlian')
@section('page-title', 'Konsentrasi Keahlian')

@section('content')

<div class="page-header">
    <h3>Daftar Konsentrasi Keahlian</h3>
    <a href="{{ route('admin.jurusan.create') }}" class="btn btn-primary">
        <i class="fa-solid fa-plus"></i> Tambah Jurusan
    </a>
</div>

<div class="admin-card">
    <div class="table-wrapper">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Logo</th>
                    <th>Kode</th>
                    <th>Nama Jurusan</th>
                    <th>Kaprodi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jurusans as $index => $jurusan)
                    <tr>
                        <td>{{ $jurusans->firstItem() + $index }}</td>
                        <td>
                            @if($jurusan->logo)
                                <img src="{{ asset($jurusan->logo) }}"
                                     alt="{{ $jurusan->nama_jurusan }}"
                                     class="avatar-thumb">
                            @else
                                <div class="avatar-placeholder">
                                    <i class="fa-solid fa-graduation-cap"></i>
                                </div>
                            @endif
                        </td>
                        <td><span class="badge-soft">{{ strtoupper($jurusan->kode) }}</span></td>
                        <td><strong>{{ $jurusan->nama_jurusan }}</strong></td>
                        <td>{{ $jurusan->kaprodi_nama ?? '-' }}</td>
                        <td>
                            <div class="action-group">
                                <a href="{{ route('jurusan.detail', $jurusan->kode) }}" target="_blank" class="btn btn-sm btn-info" title="Lihat di Website">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.jurusan.edit', $jurusan) }}" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <form action="{{ route('admin.jurusan.destroy', $jurusan) }}" method="POST"
                                      onsubmit="return confirm('Yakin hapus konsentrasi keahlian ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="table-empty">
                            <i class="fa-solid fa-inbox" style="font-size: 1.8rem; display:block; margin-bottom:8px;"></i>
                            Belum ada data konsentrasi keahlian.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-wrapper">
        {{ $jurusans->links('vendor.pagination.custom') }}
    </div>
</div>

@endsection