@extends('layouts.admin')

@section('title', 'Tambah Agenda')
@section('page-title', 'Tambah Agenda')

@section('content')

<div class="admin-card">

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('admin.agenda.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label fw-bold">Nama Agenda</label>
            <input type="text" name="nama_agenda" class="form-control" value="{{ old('nama_agenda') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold">Deskripsi</label>
            <textarea name="deskripsi" rows="5" class="form-control">{{ old('deskripsi') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary fw-semibold">Simpan Agenda</button>
        <a href="{{ route('admin.agenda.index') }}" class="btn btn-secondary fw-semibold">Batal</a>
    </form>

</div>

@endsection