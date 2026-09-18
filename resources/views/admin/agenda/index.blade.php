@extends('layouts.admin')

@section('title', 'Agenda')
@section('page-title', 'Kelola Agenda')

@section('content')

<div class="admin-card">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('admin.agenda.create') }}" class="btn btn-primary fw-semibold">+ Tambah Agenda</a>
    </div>

    <div class="table-responsive-fix">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>Nama Agenda</th>
                    <th>Tanggal</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($agendas as $agenda)
                    <tr>
                        <td>{{ $agenda->nama_agenda }}</td>
                        <td>{{ \Carbon\Carbon::parse($agenda->tanggal)->format('d M Y') }}</td>
                        <td>{{ Str::limit($agenda->deskripsi, 80) }}</td>
                        <td class="d-flex gap-2">
                            <a href="{{ route('admin.agenda.edit', $agenda->id) }}" class="btn btn-sm btn-warning fw-semibold">Edit</a>
                            <form action="{{ route('admin.agenda.destroy', $agenda->id) }}" method="POST" onsubmit="return confirm('Hapus agenda ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger fw-semibold">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">Belum ada agenda.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $agendas->links() }}
    </div>

</div>

@endsection