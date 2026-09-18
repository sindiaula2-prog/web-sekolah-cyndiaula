@extends('layouts.admin')

@section('title', 'Tambah Foto Galeri')
@section('page-title', 'Tambah Foto Galeri')

@section('content')

<div class="admin-card" style="max-width: 700px;">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label fw-semibold">Judul</label>
            <input type="text" name="judul" value="{{ old('judul') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Kategori</label>
            <select name="kategori" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="kegiatan_sekolah" {{ old('kategori') == 'kegiatan_sekolah' ? 'selected' : '' }}>Kegiatan Sekolah</option>
                <option value="acara_sekolah" {{ old('kategori') == 'acara_sekolah' ? 'selected' : '' }}>Acara Sekolah</option>
                <option value="kesehatan" {{ old('kategori') == 'kesehatan' ? 'selected' : '' }}>Kesehatan</option>
                <option value="keagamaan" {{ old('kategori') == 'keagamaan' ? 'selected' : '' }}>Keagamaan</option>
                <option value="prestasi" {{ old('kategori') == 'prestasi' ? 'selected' : '' }}>Prestasi</option>
                <option value="fasilitas" {{ old('kategori') == 'fasilitas' ? 'selected' : '' }}>Fasilitas</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Deskripsi</label>
            <textarea name="deskripsi" rows="4" class="form-control">{{ old('deskripsi') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold">Foto</label>
            <input type="file" name="foto" accept="image/*" class="form-control" required>
            <small class="text-muted">Format: JPG, JPEG, PNG. Maks 5MB.</small>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary fw-semibold">Simpan</button>
            <a href="{{ route('admin.galeri.index') }}" class="btn btn-light fw-semibold">Batal</a>
        </div>
    </form>
</div>

@endsection