@extends('layouts.admin')

@section('title', 'Edit Profil Sekolah')
@section('page-title', 'Edit Profil Sekolah')

@section('content')

<h5 class="fw-bold mb-3" style="color:#0B2545;">Form Edit Profil Sekolah</h5>

<a href="{{ route('admin.profil.index') }}" class="btn btn-secondary btn-sm mb-3">
    ← Kembali
</a>

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0 ps-3">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="bg-white rounded-3 shadow-sm p-4">
    <form action="{{ route('admin.profil.update', $profil->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="form-label fw-semibold" style="color:#0B2545;">
                📛 Judul Profil
            </label>
            <input type="text" name="judul" id="judul"
                   value="{{ old('judul', $profil->judul) }}"
                   class="form-control" required>
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold" style="color:#0B2545;">
                📖 Tentang Sekolah
            </label>
            <div class="form-text mb-2">Deskripsi umum tentang sekolah, ditampilkan di halaman Profil publik.</div>
            <textarea name="tentang" id="tentang" rows="5" class="form-control">{{ old('tentang', $profil->tentang) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold" style="color:#0B2545;">
                🏛️ Sejarah Sekolah
            </label>
            <div class="form-text mb-2">Konten ini akan tampil di halaman <code>/profil/sejarah</code>.</div>
            <textarea name="sejarah" id="sejarah" rows="7" class="form-control">{{ old('sejarah', $profil->sejarah) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold" style="color:#0B2545;">
                🎯 Visi & Misi
            </label>
            <div class="form-text mb-2">Konten ini akan tampil di halaman <code>/profil/visi-misi</code>.</div>
            <textarea name="visi_misi" id="visi_misi" rows="7" class="form-control">{{ old('visi_misi', $profil->visi_misi) }}</textarea>
        </div>

        <div class="d-flex gap-2 justify-content-end">
            <a href="{{ route('admin.profil.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">💾 Simpan Perubahan</button>
        </div>

    </form>
</div>

@endsection