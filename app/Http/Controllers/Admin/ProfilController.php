<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        // Karena tabel profils hanya berisi 1 baris data,
        // langsung ambil baris pertama. Kalau belum ada, buat baru.
        $profil = Profil::first();

        if (!$profil) {
            $profil = Profil::create([
                'judul'     => 'Profil Sekolah',
                'tentang'   => '',
                'sejarah'   => '',
                'visi_misi' => '',
            ]);
        }

        return view('admin.profil.index', compact('profil'));
    }

    public function edit(Profil $profil)
    {
        return view('admin.profil.edit', compact('profil'));
    }

    public function update(Request $request, Profil $profil)
    {
        $validated = $request->validate([
            'judul'     => 'required|string|max:255',
            'tentang'   => 'nullable|string',
            'sejarah'   => 'nullable|string',
            'visi_misi' => 'nullable|string',
        ]);

        $profil->update($validated);

        return redirect()
            ->route('admin.profil.index')
            ->with('success', 'Profil sekolah berhasil diperbarui.');
    }
}