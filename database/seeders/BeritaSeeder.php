<?php

namespace App\Http\Controllers;

use App\Models\Berita;

class BeritaController extends Controller
{
    // Halaman Daftar Berita (Memanggil file berita.blade.php)
    public function index()
    {
        $beritas = Berita::latest()->paginate(9);

        return view('berita', compact('beritas'));
    }

    // Halaman Detail Berita (Memanggil file berita/show.blade.php)
    public function show($id)
    {
        $berita = Berita::findOrFail($id);

        // Ambil 5 berita terbaru selain berita yang sedang dibuka
        $beritaTerbaru = Berita::where('id', '!=', $id)
            ->latest()
            ->take(5)
            ->get();

        return view('berita.show', compact('berita', 'beritaTerbaru'));
    }
}