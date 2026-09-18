@extends('layouts.admin')

@section('title', 'Data Guru')
@section('page-title', 'Data Guru')

@section('content')

<div class="page-header">
    <h3>Daftar Guru & Pegawai</h3>
    <a href="{{ route('admin.guru.create') }}" class="btn btn-primary">
        <i class="fa-solid fa-plus"></i> Tambah Guru
    </a>
</div>

<div class="admin-card">
    <div class="table-wrapper">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Foto</th>
                    <th>NIP</th>
                    <th>Nama Guru</th>
                    <th>Mapel</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($gurus as $index => $guru)
                    <tr>
                        <td>{{ $gurus->firstItem() + $index }}</td>
                        <td>
                            @if($guru->foto)
                                <img src="{{ asset('storage/' . $guru->foto) }}"
                                     alt="{{ $guru->nama_guru }}"
                                     class="avatar-thumb">
                            @else
                                <div class="avatar-placeholder">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                            @endif
                        </td>
                        <td>{{ $guru->nip }}</td>
                        <td><strong>{{ $guru->nama_guru }}</strong></td>
                        <td><span class="badge-soft">{{ $guru->mapel }}</span></td>
                        <td>
                            <div class="action-group">
                                <a href="{{ route('admin.guru.show', $guru) }}" class="btn btn-sm btn-info" title="Detail">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.guru.edit', $guru) }}" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <form action="{{ route('admin.guru.destroy', $guru) }}" method="POST"
                                      onsubmit="return confirm('Yakin hapus data guru ini?')">
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
                            Belum ada data guru.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-wrapper">
        {{ $gurus->links('vendor.pagination.custom') }}
    </div>
</div>

@endsection