@extends('layouts.admin')

@section('title', 'Detail Guru')
@section('page-title', 'Detail Data Guru')

@section('content')
<div class="admin-card">
    <div class="row align-items-center">
        <div class="col-md-4 text-center mb-4 mb-md-0">
            @php
                $fotoFinal = ($guru->foto && file_exists(public_path('storage/' . $guru->foto))) 
                    ? asset('storage/' . $guru->foto) 
                    : asset('images/default-user.png');
            @endphp
            <img src="{{ $fotoFinal }}" alt="{{ $guru->nama_guru }}" class="img-fluid rounded shadow-sm" style="max-height: 250px; width: 100%; object-fit: cover;">
        </div>
        <div class="col-md-8">
            <table class="table table-borderless">
                <tr>
                    <th style="width: 160px;" class="text-secondary">NIP</th>
                    <td>: <span class="fw-semibold">{{ $guru->nip }}</span></td>
                </tr>
                <tr>
                    <th class="text-secondary">Nama Lengkap</th>
                    <td>: <span class="fw-semibold text-dark">{{ $guru->nama_guru }}</span></td>
                </tr>
                <tr>
                    <th class="text-secondary">Mata Pelajaran</th>
                    <td>: <span class="badge bg-primary-subtle text-primary px-3 py-2">{{ $guru->mapel }}</span></td>
                </tr>
                <tr>
                    <th class="text-secondary">Deskripsi</th>
                    <td>: {{ $guru->deskripsi ?? 'Tidak ada deskripsi.' }}</td>
                </tr>
            </table>
            
            <div class="mt-4">
                <a href="{{ route('admin.guru.index') }}" class="btn btn-secondary px-4 fw-semibold">← Kembali</a>
                <a href="{{ route('admin.guru.edit', $guru->id) }}" class="btn btn-warning px-4 fw-semibold text-white">Edit Data</a>
            </div>
        </div>
    </div>
</div>
@endsection