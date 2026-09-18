@extends('layouts.admin')

@section('title', 'Daftar Pesan Masuk')
@section('page-title', 'Daftar Pesan Masuk')

@section('content')

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
    <h2 style="font-weight: 800; color: #2d3748; font-size: 1.4rem; margin: 0;">📥 Daftar Pesan Masuk</h2>
    <span style="background: #e0f2fe; color: #0284c7; padding: 6px 14px; border-radius: 20px; font-weight: 600; font-size: 0.9rem;">
        Total: {{ $kontaks->total() ?? count($kontaks) }} Pesan
    </span>
</div>

@if(session('success'))
    <div style="background: #d1fae5; color: #065f46; padding: 12px 18px; border-radius: 12px; margin-bottom: 20px; font-weight: 600;">
        ✅ {{ session('success') }}
    </div>
@endif

<div style="background: #ffffff; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); overflow: hidden; border: 1px solid #e2e8f0;">
    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead>
                <tr style="background: #f8fafc; border-bottom: 2px solid #e2e8f0; color: #475569; font-size: 0.85rem; text-transform: uppercase;">
                    <th style="padding: 15px 20px;">No</th>
                    <th style="padding: 15px 20px;">Nama Pengirim</th>
                    <th style="padding: 15px 20px;">Email & No HP</th>
                    <th style="padding: 15px 20px;">Pesan Singkat</th>
                    <th style="padding: 15px 20px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody style="color: #334155; font-size: 0.9rem;">
                @forelse($kontaks as $index => $item)
                    <tr style="border-bottom: 1px solid #f1f5f9; transition: background 0.2s;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='#fff'">
                        <td style="padding: 15px 20px; font-weight: 600;">{{ $kontaks->firstItem() ? $kontaks->firstItem() + $index : $index + 1 }}</td>
                        <td style="padding: 15px 20px; font-weight: 700; color: #1e293b;">{{ $item->nama }}</td>
                        <td style="padding: 15px 20px;">
                            <div style="color: #0284c7; font-weight: 600;">{{ $item->email }}</div>
                            <div style="font-size: 0.8rem; color: #64748b;">{{ $item->no_hp ?? '-' }}</div>
                        </td>
                        <td style="padding: 15px 20px; color: #475569;">
                            {{ \Illuminate\Support\Str::limit($item->pesan, 40) }}
                        </td>
                        <td style="padding: 15px 20px; text-align: center;">
                            <div style="display: flex; gap: 8px; justify-content: center;">
                                <!-- Tombol Lihat -->
                                <a href="{{ route('admin.kontak.show', $item->id) }}" style="background: #e0f2fe; color: #0284c7; padding: 6px 12px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 0.85rem;">Lihat</a>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('admin.kontak.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background: #fee2e2; color: #dc2626; border: none; padding: 6px 12px; border-radius: 8px; font-weight: 600; font-size: 0.85rem; cursor: pointer;">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="padding: 40px; text-align: center; color: #94a3b8;">
                            Belum ada pesan masuk.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if(method_exists($kontaks, 'links'))
        <div style="padding: 15px 20px; background: #f8fafc; border-top: 1px solid #e2e8f0;">
            {{ $kontaks->links() }}
        </div>
    @endif
</div>

@endsection