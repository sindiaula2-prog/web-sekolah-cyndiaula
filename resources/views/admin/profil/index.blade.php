@extends('layouts.admin')

@section('title', 'Profil Sekolah')
@section('page-title', 'Profil Sekolah')

@section('content')

<h5 class="fw-bold mb-3" style="color:#0B2545;">Data Profil Sekolah</h5>

@if(session('success'))
    <div class="alert alert-success py-2 px-3 mb-3" style="border-radius:8px;">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white rounded-3 shadow-sm p-4">

    <div class="d-flex justify-content-between align-items-start mb-4">
        <h4 class="fw-bold mb-0" style="color:#0B2545;">{{ $profil->judul }}</h4>
        <a href="{{ route('admin.profil.edit', $profil->id) }}" class="btn btn-warning btn-sm">
            ✏️ Edit Profil
        </a>
    </div>

    <div class="mb-4">
        <h6 class="fw-bold text-uppercase small text-muted mb-2">📖 Tentang Sekolah</h6>
        <p class="mb-0" style="white-space: pre-line;">
            {{ $profil->tentang ?: '(Belum diisi)' }}
        </p>
    </div>

    <hr>

    <div class="mb-4">
        <h6 class="fw-bold text-uppercase small text-muted mb-2">🏛️ Sejarah</h6>
        <p class="mb-0" style="white-space: pre-line;">
            {{ $profil->sejarah ?: '(Belum diisi)' }}
        </p>
    </div>

    <hr>

    <div>
        <h6 class="fw-bold text-uppercase small text-muted mb-2">🎯 Visi & Misi</h6>
        <p class="mb-0" style="white-space: pre-line;">
            {{ $profil->visi_misi ?: '(Belum diisi)' }}
        </p>
    </div>

</div>

@endsection