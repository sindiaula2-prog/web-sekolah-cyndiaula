@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">Tambah Data Guru</h3>
        <a href="{{ route('admin.guru.index') }}" class="btn btn-secondary">
            ← Kembali
        </a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.guru.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="nip" class="form-label fw-bold">NIP</label>
                    <input type="text" class="form-control" id="nip" name="nip"
                           value="{{ old('nip') }}" required>
                </div>

                <div class="mb-3">
                    <label for="nama_guru" class="form-label fw-bold">Nama Guru</label>
                    <input type="text" class="form-control" id="nama_guru" name="nama_guru"
                           value="{{ old('nama_guru') }}" required>
                </div>

                <div class="mb-3">
                    <label for="mapel" class="form-label fw-bold">Mata Pelajaran</label>
                    <input type="text" class="form-control" id="mapel" name="mapel"
                           value="{{ old('mapel') }}" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label fw-bold">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi') }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="foto" class="form-label fw-bold">Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                    <small class="text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB.</small>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Data</button>
                <a href="{{ route('admin.guru.index') }}" class="btn btn-outline-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection