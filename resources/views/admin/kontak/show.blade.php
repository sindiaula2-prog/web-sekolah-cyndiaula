@extends('layouts.admin')

@section('title', 'Detail Pesan Masuk')
@section('page-title', 'Detail Pesan Masuk')

@section('content')

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
    <h2 style="font-weight: 800; color: #2d3748; font-size: 1.4rem; margin: 0;">📩 Detail Pesan Masuk</h2>

    <a href="{{ route('admin.kontak.index') }}" style="background: #e2e8f0; color: #334155; padding: 8px 16px; border-radius: 10px; text-decoration: none; font-weight: 700; font-size: 0.85rem;">
        &larr; Kembali ke Daftar
    </a>
</div>

@if(session('success'))
    <div style="background: #d1fae5; color: #065f46; padding: 12px 18px; border-radius: 12px; margin-bottom: 20px; font-weight: 600;">
        ✅ {{ session('success') }}
    </div>
@endif

<div style="background: #ffffff; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); overflow: hidden; border: 1px solid #e2e8f0; padding: 30px;">

    <table style="width: 100%; border-collapse: collapse; margin-bottom: 25px;">
        <tr>
            <td style="padding: 10px 0; width: 160px; color: #64748b; font-weight: 600; vertical-align: top;">Nama Pengirim</td>
            <td style="padding: 10px 0; color: #1e293b; font-weight: 700;">: {{ $kontak->nama }}</td>
        </tr>
        <tr>
            <td style="padding: 10px 0; color: #64748b; font-weight: 600; vertical-align: top;">Email</td>
            <td style="padding: 10px 0; color: #0284c7; font-weight: 600;">: {{ $kontak->email }}</td>
        </tr>
        <tr>
            <td style="padding: 10px 0; color: #64748b; font-weight: 600; vertical-align: top;">No. HP</td>
            <td style="padding: 10px 0; color: #334155;">: {{ $kontak->no_hp ?? '-' }}</td>
        </tr>
        <tr>
            <td style="padding: 10px 0; color: #64748b; font-weight: 600; vertical-align: top;">Tanggal Masuk</td>
            <td style="padding: 10px 0; color: #334155;">: {{ optional($kontak->created_at)->translatedFormat('d F Y, H:i') }} WIB</td>
        </tr>
    </table>

    <div style="border-top: 1px solid #f1f5f9; padding-top: 20px;">
        <div style="color: #475569; font-weight: 700; font-size: 0.9rem; text-transform: uppercase; margin-bottom: 10px;">
            Isi Pesan
        </div>

        <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px; color: #334155; line-height: 1.7; white-space: pre-line;">
            {{ $kontak->pesan }}
        </div>
    </div>

    <div style="margin-top: 25px; display: flex; gap: 10px;">
        <form action="{{ route('admin.kontak.destroy', $kontak->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" style="background: #fee2e2; color: #dc2626; border: none; padding: 10px 20px; border-radius: 10px; font-weight: 700; font-size: 0.85rem; cursor: pointer;">
                🗑️ Hapus Pesan
            </button>
        </form>
    </div>

</div>

@endsection