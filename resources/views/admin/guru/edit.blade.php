@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">Edit Data Guru</h3>
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
            <form action="{{ route('admin.guru.update', $guru) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nip" class="form-label fw-bold">NIP</label>
                    <input type="text" class="form-control" id="nip" name="nip"
                           value="{{ old('nip', $guru->nip) }}" required>
                </div>

                <div class="mb-3">
                    <label for="nama_guru" class="form-label fw-bold">Nama Guru</label>
                    <input type="text" class="form-control" id="nama_guru" name="nama_guru"
                           value="{{ old('nama_guru', $guru->nama_guru) }}" required>
                </div>

                <div class="mb-3">
                    <label for="mapel" class="form-label fw-bold">Mata Pelajaran</label>
                    <input type="text" class="form-control" id="mapel" name="mapel"
                           value="{{ old('mapel', $guru->mapel) }}" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label fw-bold">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi', $guru->deskripsi) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Foto Saat Ini</label>
                    <div>
                        @if($guru->foto)
                            <img src="{{ asset('storage/' . $guru->foto) }}"
                                 alt="{{ $guru->nama_guru }}"
                                 style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;"
                                 class="mb-2">
                        @else
                            <p class="text-muted">Belum ada foto.</p>
                        @endif
                    </div>
                </div>

                <div class="mb-4">
                    <label for="foto" class="form-label fw-bold">Ganti Foto (opsional)</label>
                    <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                    <small class="text-muted">Kosongkan jika tidak ingin mengganti foto. Format: JPG, JPEG, PNG. Maksimal 2MB.</small>
                </div>

                <button type="submit" class="btn btn-primary">Update Data</button>
                <a href="{{ route('admin.guru.index') }}" class="btn btn-outline-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection