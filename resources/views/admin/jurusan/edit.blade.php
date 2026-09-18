@extends('layouts.admin')

@section('title', 'Edit Konsentrasi Keahlian')
@section('page-title', 'Edit Konsentrasi Keahlian')

@section('content')

<div class="page-header">
    <h3>Form Edit Jurusan</h3>
    <a href="{{ route('admin.jurusan.index') }}" class="btn btn-secondary">
        <i class="fa-solid fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="admin-card">
    <form action="{{ route('admin.jurusan.update', $jurusan) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label">Kode Jurusan</label>
            <input type="text" name="kode" class="form-control" value="{{ old('kode', $jurusan->kode) }}" required>
            <small class="form-hint">Huruf kecil, tanpa spasi. Dipakai untuk URL detail jurusan.</small>
        </div>

        <div class="form-group">
            <label class="form-label">Nama Jurusan</label>
            <input type="text" name="nama_jurusan" class="form-control" value="{{ old('nama_jurusan', $jurusan->nama_jurusan) }}" required>
        </div>

        <div class="form-group">
            <label class="form-label">Logo Saat Ini</label>
            <div>
                @if($jurusan->logo)
                    <img src="{{ asset($jurusan->logo) }}" alt="{{ $jurusan->nama_jurusan }}" class="preview-img">
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

        <div class="form-group">
            <label class="form-label">Deskripsi / Profil Jurusan</label>
            <textarea name="deskripsi" class="form-control" rows="5">{{ old('deskripsi', $jurusan->deskripsi) }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Kompetensi yang Dipelajari</label>
            <textarea name="kompetensi" class="form-control" rows="5">{{ old('kompetensi', is_array($jurusan->kompetensi) ? implode("\n", $jurusan->kompetensi) : '') }}</textarea>
            <small class="form-hint">Tulis satu poin per baris (tekan Enter untuk poin baru).</small>
        </div>

        <div class="form-group">
            <label class="form-label">Prospek Karir & Pekerjaan</label>
            <textarea name="prospek_karir" class="form-control" rows="5">{{ old('prospek_karir', is_array($jurusan->prospek_karir) ? implode("\n", $jurusan->prospek_karir) : '') }}</textarea>
            <small class="form-hint">Tulis satu poin per baris (tekan Enter untuk poin baru).</small>
        </div>

        <hr class="form-divider">

        <h4 class="form-subtitle">Kepala Konsentrasi Keahlian</h4>

        <div class="form-group">
            <label class="form-label">Nama Kaprodi</label>
            <input type="text" name="kaprodi_nama" class="form-control" value="{{ old('kaprodi_nama', $jurusan->kaprodi_nama) }}">
        </div>

        <div class="form-group">
            <label class="form-label">Gelar Kaprodi</label>
            <input type="text" name="kaprodi_gelar" class="form-control" value="{{ old('kaprodi_gelar', $jurusan->kaprodi_gelar) }}">
        </div>

        <div class="form-group">
            <label class="form-label">Foto Kaprodi Saat Ini</label>
            <div>
                @if($jurusan->kaprodi_foto)
                    <img src="{{ asset($jurusan->kaprodi_foto) }}" alt="{{ $jurusan->kaprodi_nama }}" class="preview-img">
                @else
                    <p class="text-muted">Belum ada foto.</p>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Ganti Foto Kaprodi (opsional)</label>
            <input type="file" name="kaprodi_foto" class="form-control" accept="image/*">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                <i class="fa-solid fa-floppy-disk"></i> Update Data
            </button>
            <a href="{{ route('admin.jurusan.index') }}" class="btn btn-outline">Batal</a>
        </div>
    </form>
</div>

@endsection