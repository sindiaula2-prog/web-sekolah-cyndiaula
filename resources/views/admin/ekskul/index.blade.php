@extends('layouts.admin')

@section('title', 'Ekstrakurikuler')
@section('page-title', 'Ekstrakurikuler')

@section('content')

<div class="page-header">
    <h3>Daftar Ekstrakurikuler</h3>
    <a href="{{ route('admin.ekskul.create') }}" class="btn btn-primary">
        <i class="fa-solid fa-plus"></i> Tambah Ekstrakurikuler
    </a>
</div>

<div class="admin-card">
    <div class="table-wrapper">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Logo</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Pembina</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($ekstrakurikulers as $index => $ekskul)
                    <tr>
                        <td>{{ $ekstrakurikulers->firstItem() + $index }}</td>
                        <td>
                            @if($ekskul->logo)
                                <img src="{{ asset('storage/' . $ekskul->logo) }}"
                                     alt="{{ $ekskul->nama_ekskul }}"
                                     class="avatar-thumb"
                                     onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($ekskul->nama_ekskul) }}&background=0B2545&color=fff';">
                            @else
                                <div class="avatar-placeholder">
                                    <i class="fa-solid fa-futbol"></i>
                                </div>
                            @endif
                        </td>
                        <td><strong>{{ $ekskul->nama_ekskul }}</strong></td>
                        <td style="max-width: 300px;">{{ Str::limit($ekskul->deskripsi, 80) }}</td>
                        <td><span class="badge-soft">{{ $ekskul->pembina ?? '-' }}</span></td>
                        <td>
                            <div class="action-group">
                                <a href="{{ route('admin.ekskul.edit', $ekskul) }}" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <form action="{{ route('admin.ekskul.destroy', $ekskul) }}" method="POST"
                                      onsubmit="return confirm('Yakin hapus ekstrakurikuler ini?')">
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
                            Belum ada data ekstrakurikuler.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-wrapper">
        {{ $ekstrakurikulers->links('vendor.pagination.custom') }}
    </div>
</div>

@endsection