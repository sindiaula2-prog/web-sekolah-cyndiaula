<?php
namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Fasilitas;
use App\Models\Profil; // <-- Tambahkan model Profil

class ProfilController extends Controller
{
    public function index()
    {
        // Ambil data profil pertama dari database
        $profil = Profil::first();

        return view('profil.index', compact('profil'));
    }

    public function sejarah()
    {
        return view('profil.sejarah');
    }

    public function visiMisi()
    {
        return view('profil.visi-misi');
    }

    public function pegawai()
    {
        $gurus = Guru::all();
        return view('profil.pegawai', compact('gurus'));
    }

    public function fasilitas()
    {
        $fasilitas = Fasilitas::all();
        return view('profil.fasilitas', compact('fasilitas'));
    }
}