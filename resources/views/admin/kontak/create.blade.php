@extends('layouts.admin')

@section('title', 'Tambah Pesan Kontak')
@section('page-title', 'Tambah Pesan Kontak')

@section('content')

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
    <h2 style="font-weight: 800; color: #2d3748; font-size: 1.4rem; margin: 0;">➕ Tambah Pesan Kontak</h2>

    <a href="{{ route('admin.kontak.index') }}" style="background: #e2e8f0; color: #334155; padding: 8px 16px; border-radius: 10px; text-decoration: none; font-weight: 700; font-size: 0.85rem;">
        &larr; Kembali ke Daftar
    </a>
</div>

@if($errors->any())
    <div style="background: #fee2e2; color: #dc2626; padding: 12px 18px; border-radius: 12px; margin-bottom: 20px; font-weight: 600;">
        <ul style="margin: 0; padding-left: 18px;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div style="background: #ffffff; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); overflow: hidden; border: 1px solid #e2e8f0; padding: 30px;">

    <form action="{{ route('admin.kontak.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 18px;">
            <label style="display: block; margin-bottom: 6px; font-weight: 600; color: #475569; font-size: 0.9rem;">Nama Pengirim</label>
            <input
                type="text"
                name="nama"
                value="{{ old('nama') }}"
                required
                style="width: 100%; padding: 10px 14px; border: 1px solid #e2e8f0; border-radius: 10px; font-size: 0.9rem; color: #1e293b;"
                placeholder="Masukkan nama pengirim"
            >
        </div>

        <div style="margin-bottom: 18px;">
            <label style="display: block; margin-bottom: 6px; font-weight: 600; color: #475569; font-size: 0.9rem;">Email</label>
            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                style="width: 100%; padding: 10px 14px; border: 1px solid #e2e8f0; border-radius: 10px; font-size: 0.9rem; color: #1e293b;"
                placeholder="contoh@email.com"
            >
        </div>

        <div style="margin-bottom: 18px;">
            <label style="display: block; margin-bottom: 6px; font-weight: 600; color: #475569; font-size: 0.9rem;">No. HP</label>
            <input
                type="text"
                name="no_hp"
                value="{{ old('no_hp') }}"
                style="width: 100%; padding: 10px 14px; border: 1px solid #e2e8f0; border-radius: 10px; font-size: 0.9rem; color: #1e293b;"
                placeholder="08xxxxxxxxxx"
            >
        </div>

        <div style="margin-bottom: 24px;">
            <label style="display: block; margin-bottom: 6px; font-weight: 600; color: #475569; font-size: 0.9rem;">Isi Pesan</label>
            <textarea
                name="pesan"
                rows="5"
                required
                style="width: 100%; padding: 10px 14px; border: 1px solid #e2e8f0; border-radius: 10px; font-size: 0.9rem; color: #1e293b; resize: vertical;"
                placeholder="Tulis pesan..."
            >{{ old('pesan') }}</textarea>
        </div>

        <button type="submit" style="background: #0284c7; color: #fff; border: none; padding: 12px 24px; border-radius: 10px; font-weight: 700; font-size: 0.9rem; cursor: pointer;">
            💾 Simpan Pesan
        </button>

    </form>

</div>

@endsection