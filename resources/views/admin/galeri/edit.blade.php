@extends('layouts.admin')

@section('title', 'Edit Foto Galeri')
@section('page-title', 'Edit Foto Galeri')

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

    <form action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label fw-semibold">Judul</label>
            <input type="text" name="judul" value="{{ old('judul', $galeri->judul) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Kategori</label>
            @php
                $kategoriList = [
                    'kegiatan_sekolah' => 'Kegiatan Sekolah',
                    'acara_sekolah' => 'Acara Sekolah',
                    'kesehatan' => 'Kesehatan',
                    'keagamaan' => 'Keagamaan',
                    'prestasi' => 'Prestasi',
                    'fasilitas' => 'Fasilitas',
                ];
            @endphp
            <select name="kategori" class="form-select" required>
                @foreach($kategoriList as $value => $label)
                    <option value="{{ $value }}" {{ old('kategori', $galeri->kategori) == $value ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Deskripsi</label>
            <textarea name="deskripsi" rows="4" class="form-control">{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold d-block">Foto Saat Ini</label>
            <img src="{{ asset('images/galeri/' . $galeri->foto) }}" alt="{{ $galeri->judul }}"
                 style="width: 200px; height: 130px; object-fit: cover; border-radius: 8px;" class="mb-2 d-block">

            <label class="form-label fw-semibold">Ganti Foto (opsional)</label>
            <input type="file" name="foto" accept="image/*" class="form-control">
            <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary fw-semibold">Update</button>
            <a href="{{ route('admin.galeri.index') }}" class="btn btn-light fw-semibold">Batal</a>
        </div>
    </form>
</div>

@endsection