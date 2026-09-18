<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilSekolah;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    /**
     * Tampilkan daftar semua kategori profil sekolah untuk dikelola admin
     * (tentang, sejarah, visi-misi, pegawai, fasilitas)
     */
    public function index()
    {
        $daftarProfil = ProfilSekolah::orderBy('kategori')->get();

        return view('admin.profil.index', compact('daftarProfil'));
    }

    /**
     * Form edit satu kategori profil
     */
    public function edit(ProfilSekolah $profil)
    {
        return view('admin.profil.edit', compact('profil'));
    }

    /**
     * Simpan perubahan konten profil
     */
    public function update(Request $request, ProfilSekolah $profil)
    {
        $validated = $request->validate([
            'konten' => 'required|string',
        ]);

        $profil->update($validated);

        return redirect()
            ->route('admin.profil.index')
            ->with('success', 'Profil "' . $profil->kategori . '" berhasil diperbarui.');
    }
}