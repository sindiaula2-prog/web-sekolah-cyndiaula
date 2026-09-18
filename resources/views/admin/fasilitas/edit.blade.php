@extends('layouts.admin')

@section('title', 'Edit Fasilitas')
@section('page-title', 'Edit Fasilitas')

@section('content')

<h5 class="fw-bold mb-3" style="color:#0B2545;">Form Edit Fasilitas</h5>

<a href="{{ route('admin.fasilitas.index') }}" class="btn btn-secondary btn-sm mb-3">
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
    <form action="{{ route('admin.fasilitas.update', $fasilitas->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label fw-semibold">Nama Fasilitas</label>
            <input type="text" name="nama_fasilitas" value="{{ old('nama_fasilitas', $fasilitas->nama_fasilitas) }}"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Deskripsi</label>
            <textarea name="deskripsi" rows="5" class="form-control" required>{{ old('deskripsi', $fasilitas->deskripsi) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Foto Fasilitas</label>

            @if($fasilitas->foto)
                <div class="mb-2">
                    <img id="previewImage" src="{{ asset($fasilitas->foto) }}" alt="Foto saat ini"
                         class="rounded" style="max-width:100%; max-height:260px; object-fit:cover;">
                </div>
            @else
                <img id="previewImage" class="d-none mt-2 rounded" style="max-width:100%; max-height:260px; object-fit:cover;" alt="Preview">
            @endif

            <input type="file" name="foto" id="fotoInput" accept="image/*" class="form-control">
            <div class="form-text">Kosongkan jika tidak ingin mengganti foto. Maks 5MB.</div>
        </div>

        <div class="d-flex gap-2 justify-content-end">
            <a href="{{ route('admin.fasilitas.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>

    </form>
</div>

@endsection

@push('scripts')
<script>
    const fotoInput = document.getElementById('fotoInput');
    const previewImage = document.getElementById('previewImage');

    fotoInput.addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (event) {
                previewImage.src = event.target.result;
                previewImage.classList.remove('d-none');
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush