@extends('layouts.admin')

@section('title', 'Edit Berita')
@section('page-title', 'Edit Berita')

@section('content')

<h5 class="fw-bold mb-3" style="color:#0B2545;">Form Edit Berita</h5>

<a href="{{ route('admin.berita.index') }}" class="btn btn-secondary btn-sm mb-3">
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
    <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label fw-semibold">Judul Berita</label>
            <input type="text" name="judul" value="{{ old('judul', $berita->judul) }}"
                   class="form-control" placeholder="Masukkan judul berita..." required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Konten Berita</label>
            <textarea name="konten" rows="8" class="form-control"
                      placeholder="Tulis isi berita di sini..." required>{{ old('konten', $berita->konten) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Gambar Sampul</label>

            @php
                if ($berita->gambar) {
                    if (\Illuminate\Support\Str::startsWith($berita->gambar, 'http')) {
                        $currentImg = $berita->gambar;
                    } elseif (\Illuminate\Support\Str::contains($berita->gambar, 'images/')) {
                        $currentImg = asset($berita->gambar);
                    } else {
                        $currentImg = asset('images/berita/' . $berita->gambar);
                    }
                } else {
                    $currentImg = null;
                }
            @endphp

            @if($currentImg)
                <div class="mb-2">
                    <img id="previewImage" src="{{ $currentImg }}" alt="Gambar saat ini"
                         class="rounded" style="max-width:100%; max-height:260px; object-fit:cover;">
                </div>
            @else
                <img id="previewImage" class="d-none mt-2 rounded" style="max-width:100%; max-height:260px; object-fit:cover;" alt="Preview">
            @endif

            <input type="file" name="gambar" id="gambarInput" accept="image/*" class="form-control">
            <div class="form-text">Kosongkan jika tidak ingin mengganti gambar. Maks 5MB.</div>
        </div>

        <div class="d-flex gap-2 justify-content-end">
            <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>

    </form>
</div>

@endsection

@push('scripts')
<script>
    const gambarInput = document.getElementById('gambarInput');
    const previewImage = document.getElementById('previewImage');

    gambarInput.addEventListener('change', function (e) {
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