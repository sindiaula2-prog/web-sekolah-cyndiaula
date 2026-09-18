@extends('layouts.admin')

@section('title', 'Edit Ekstrakurikuler')
@section('page-title', 'Edit Ekstrakurikuler')

@section('content')

<div class="page-header">
    <h3>Form Edit Ekstrakurikuler</h3>
    <a href="{{ route('admin.ekskul.index') }}" class="btn btn-secondary">
        <i class="fa-solid fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="admin-card">
    <form action="{{ route('admin.ekskul.update', $ekskul) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label">Nama Ekstrakurikuler</label>
            <input type="text" name="nama_ekskul" class="form-control" value="{{ old('nama_ekskul', $ekskul->nama_ekskul) }}" required>
        </div>

        <div class="form-group">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi', $ekskul->deskripsi) }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Nama Pembina</label>
            <input type="text" name="pembina" class="form-control" value="{{ old('pembina', $ekskul->pembina) }}">
        </div>

        <div class="form-group">
            <label class="form-label">Logo Saat Ini</label>
            <div>
                @if($ekskul->logo)
                    <img src="{{ asset('storage/' . $ekskul->logo) }}"
                         alt="{{ $ekskul->nama_ekskul }}" class="preview-img"
                         onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($ekskul->nama_ekskul) }}&background=0B2545&color=fff';">
                @else
                    <p class="text-muted">Belum ada logo.</p>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Ganti Logo (opsional)</label>
            <input type="file" name="logo" class="form-control" accept="image/*">
            <small class="form-hint">Kosongkan jika tidak ingin mengganti logo.</small>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                <i class="fa-solid fa-floppy-disk"></i> Update Data
            </button>
            <a href="{{ route('admin.ekskul.index') }}" class="btn btn-outline">Batal</a>
        </div>
    </form>
</div>

@endsection