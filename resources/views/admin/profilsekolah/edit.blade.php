@extends('layouts.admin')

@section('title', 'Edit Profil Sekolah')
@section('page-title', 'Edit Profil Sekolah')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">📋 Edit Profil: {{ str_replace('-', ' ', ucfirst($profil->kategori)) }}</h4>
    <a href="{{ route('admin.profil.index') }}" class="btn btn-sm btn-outline-secondary">&larr; Kembali</a>
</div>

<div class="admin-card">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.profil.update', $profil->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label fw-semibold">Kategori</label>
            <input type="text" class="form-control" value="{{ $profil->kategori }}" disabled>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Konten</label>
            <textarea name="konten" class="form-control" rows="10">{{ old('konten', $profil->konten) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection