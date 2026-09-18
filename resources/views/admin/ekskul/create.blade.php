@extends('layouts.admin')

@section('title', 'Tambah Ekstrakurikuler')
@section('page-title', 'Tambah Ekstrakurikuler')

@section('content')

<div class="page-header">
    <h3>Form Tambah Ekstrakurikuler</h3>
    <a href="{{ route('admin.ekskul.index') }}" class="btn btn-secondary">
        <i class="fa-solid fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="admin-card">
    <form action="{{ route('admin.ekskul.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label class="form-label">Nama Ekstrakurikuler</label>
            <input type="text" name="nama_ekskul" class="form-control" value="{{ old('nama_ekskul') }}" placeholder="contoh: Futsal" required>
        </div>

        <div class="form-group">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4" placeholder="Jelaskan kegiatan ekstrakurikuler ini...">{{ old('deskripsi') }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Nama Pembina</label>
            <input type="text" name="pembina" class="form-control" value="{{ old('pembina') }}" placeholder="contoh: Budi Santoso, S.Pd">
        </div>

        <div class="form-group">
            <label class="form-label">Logo</label>
            <input type="file" name="logo" class="form-control" accept="image/*">
            <small class="form-hint">Format JPG/PNG, maksimal 2MB.</small>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                <i class="fa-solid fa-floppy-disk"></i> Simpan Data
            </button>
            <a href="{{ route('admin.ekskul.index') }}" class="btn btn-outline">Batal</a>
        </div>
    </form>
</div>

@endsection