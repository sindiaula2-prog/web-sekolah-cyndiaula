<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Fasilitas;
use App\Models\Galeri;
use App\Models\Guru;
use App\Models\Berita;
use App\Models\Agenda;

class BerandaController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | JURUSAN
        |--------------------------------------------------------------------------
        */
        $jurusan = Jurusan::all();

        /*
        |--------------------------------------------------------------------------
        | FASILITAS
        |--------------------------------------------------------------------------
        */
        $fasilitas = Fasilitas::all();

        /*
        |--------------------------------------------------------------------------
        | GALERI
        |--------------------------------------------------------------------------
        */
        $galeri = Galeri::latest()
            ->take(6)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | GURU
        |--------------------------------------------------------------------------
        */
        $guru = Guru::latest()
            ->take(4)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | BERITA
        |--------------------------------------------------------------------------
        | Mengambil berita terbaru dari database.
        | Kolom gambar diambil dari tabel berita.
        */
        $semuaBerita = Berita::latest('created_at')
            ->take(6)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | AGENDA
        |--------------------------------------------------------------------------
        */
        $agendaBeranda = Agenda::latest('created_at')
            ->take(5)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | RETURN KE BERANDA
        |--------------------------------------------------------------------------
        */
        return view('beranda', compact(
            'jurusan',
            'fasilitas',
            'galeri',
            'guru',
            'semuaBerita',
            'agendaBeranda'
        ));
    }
}