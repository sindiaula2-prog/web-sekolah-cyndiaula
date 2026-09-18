@extends('layouts.admin')

@section('title', 'Edit Agenda')
@section('page-title', 'Edit Agenda')

@section('content')

<div class="admin-card">

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('admin.agenda.update', $agenda->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label fw-bold">Nama Agenda</label>
            <input type="text" name="nama_agenda" class="form-control" value="{{ old('nama_agenda', $agenda->nama_agenda) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', \Carbon\Carbon::parse($agenda->tanggal)->format('Y-m-d')) }}" required>
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold">Deskripsi</label>
            <textarea name="deskripsi" rows="5" class="form-control">{{ old('deskripsi', $agenda->deskripsi) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary fw-semibold">Update Agenda</button>
        <a href="{{ route('admin.agenda.index') }}" class="btn btn-secondary fw-semibold">Batal</a>
    </form>

</div>

@endsection