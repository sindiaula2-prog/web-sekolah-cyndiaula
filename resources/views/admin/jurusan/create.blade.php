@extends('layouts.admin')

@section('title', 'Tambah Konsentrasi Keahlian')
@section('page-title', 'Tambah Konsentrasi Keahlian')

@section('content')

<div class="page-header">
    <h3>Form Tambah Jurusan</h3>
    <a href="{{ route('admin.jurusan.index') }}" class="btn btn-secondary">
        <i class="fa-solid fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="admin-card">
    <form action="{{ route('admin.jurusan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label class="form-label">Kode Jurusan</label>
            <input type="text" name="kode" class="form-control" value="{{ old('kode') }}" placeholder="contoh: rpl, tkro, bd, aphp" required>
            <small class="form-hint">Huruf kecil, tanpa spasi. Dipakai untuk URL detail jurusan.</small>
        </div>

        <div class="form-group">
            <label class="form-label">Nama Jurusan</label>
            <input type="text" name="nama_jurusan" class="form-control" value="{{ old('nama_jurusan') }}" placeholder="contoh: Rekayasa Perangkat Lunak" required>
        </div>

        <div class="form-group">
            <label class="form-label">Logo Jurusan</label>
            <input type="file" name="logo" class="form-control" accept="image/*">
            <small class="form-hint">Format JPG/PNG, maksimal 2MB.</small>
        </div>

        <div class="form-group">
            <label class="form-label">Deskripsi / Profil Jurusan</label>
            <textarea name="deskripsi" class="form-control" rows="5" placeholder="Jelaskan profil konsentrasi keahlian ini...">{{ old('deskripsi') }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Kompetensi yang Dipelajari</label>
            <textarea name="kompetensi" class="form-control" rows="5" placeholder="Satu baris = satu poin. Contoh:&#10;Pemrograman Web&#10;Basis Data&#10;Jaringan Komputer">{{ old('kompetensi') }}</textarea>
            <small class="form-hint">Tulis satu poin per baris (tekan Enter untuk poin baru).</small>
        </div>

        <div class="form-group">
            <label class="form-label">Prospek Karir & Pekerjaan</label>
            <textarea name="prospek_karir" class="form-control" rows="5" placeholder="Satu baris = satu poin. Contoh:&#10;Web Developer&#10;Database Administrator">{{ old('prospek_karir') }}</textarea>
            <small class="form-hint">Tulis satu poin per baris (tekan Enter untuk poin baru).</small>
        </div>

        <hr class="form-divider">

        <h4 class="form-subtitle">Kepala Konsentrasi Keahlian</h4>

        <div class="form-group">
            <label class="form-label">Nama Kaprodi</label>
            <input type="text" name="kaprodi_nama" class="form-control" value="{{ old('kaprodi_nama') }}" placeholder="Nama lengkap kaprodi">
        </div>

        <div class="form-group">
            <label class="form-label">Gelar Kaprodi</label>
            <input type="text" name="kaprodi_gelar" class="form-control" value="{{ old('kaprodi_gelar') }}" placeholder="contoh: S.Pd., M.Kom.">
        </div>

        <div class="form-group">
            <label class="form-label">Foto Kaprodi</label>
            <input type="file" name="kaprodi_foto" class="form-control" accept="image/*">
            <small class="form-hint">Format JPG/PNG, maksimal 2MB.</small>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                <i class="fa-solid fa-floppy-disk"></i> Simpan Data
            </button>
            <a href="{{ route('admin.jurusan.index') }}" class="btn btn-outline">Batal</a>
        </div>
    </form>
</div>

@endsection