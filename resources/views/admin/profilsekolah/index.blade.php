@extends('layouts.admin')

@section('title', 'Profil Sekolah')
@section('page-title', 'Profil Sekolah')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">📋 Kelola Profil Sekolah</h4>
</div>

<div class="admin-card">
    <div class="table-responsive-fix">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Kategori</th>
                    <th>Konten</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($daftarProfil as $profil)
                    <tr>
                        <td>
                            <span class="badge bg-secondary text-capitalize">{{ str_replace('-', ' ', $profil->kategori) }}</span>
                        </td>
                        <td>{{ \Illuminate\Support\Str::limit(strip_tags($profil->konten), 80) }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.profil.edit', $profil->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted py-4">Belum ada data profil sekolah.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection