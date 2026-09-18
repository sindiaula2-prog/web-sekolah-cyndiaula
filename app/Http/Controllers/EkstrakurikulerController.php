<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Models\Guru; // Tambahkan jika ingin mengambil data guru untuk pilihan dropdown
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EkstrakurikulerController extends Controller
{
    public function index()
    {
        $ekstrakurikulers = Ekstrakurikuler::latest()->get();
        return view('ekstrakurikuler', compact('ekstrakurikulers'));
    }

    public function adminIndex()
    {
        $ekstrakurikulers = Ekstrakurikuler::latest()->paginate(10);
        return view('admin.ekskul.index', compact('ekstrakurikulers'));
    }

    public function create()
    {
        $gurus = Guru::all(); // Mengambil data guru untuk pilihan di form (jika ada)
        return view('admin.ekskul.create', compact('gurus'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_ekskul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'pembina' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'guru_id' => 'nullable|exists:gurus,id', // <--- Validasi guru_id
        ]);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('ekstrakurikuler', 'public');
        }

        Ekstrakurikuler::create($data);

        return redirect()
            ->route('admin.ekskul.index')
            ->with('success', 'Ekstrakurikuler berhasil ditambahkan.');
    }

    public function edit(Ekstrakurikuler $ekskul)
    {
        $gurus = Guru::all(); // Mengambil data guru untuk pilihan di form edit
        return view('admin.ekskul.edit', compact('ekskul', 'gurus'));
    }

    public function update(Request $request, Ekstrakurikuler $ekskul)
    {
        $data = $request->validate([
            'nama_ekskul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'pembina' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'guru_id' => 'nullable|exists:gurus,id', // <--- Validasi guru_id
        ]);

        if ($request->hasFile('logo')) {
            if ($ekskul->logo && Storage::disk('public')->exists($ekskul->logo)) {
                Storage::disk('public')->delete($ekskul->logo);
            }
            $data['logo'] = $request->file('logo')->store('ekstrakurikuler', 'public');
        }

        $ekskul->update($data);

        return redirect()
            ->route('admin.ekskul.index')
            ->with('success', 'Ekstrakurikuler berhasil diperbarui.');
    }

    public function destroy(Ekstrakurikuler $ekskul)
    {
        if ($ekskul->logo && Storage::disk('public')->exists($ekskul->logo)) {
            Storage::disk('public')->delete($ekskul->logo);
        }

        $ekskul->delete();

        return redirect()
            ->route('admin.ekskul.index')
            ->with('success', 'Ekstrakurikuler berhasil dihapus.');
    }

    public function show($id)
    {
        $ekskul = Ekstrakurikuler::findOrFail($id);
        return view('ekstrakurikuler-detail', compact('ekskul'));
    }

    public function daftar(Request $request)
    {
        $request->validate([
            'ekstrakurikuler' => 'required|string',
            'nama_lengkap'    => 'required|string|max:255',
            'nisn'            => 'required|string|max:20',
            'kelas'           => 'required|string|max:50',
            'no_hp'           => 'required|string|max:20',
        ], [
            'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
            'nisn.required'         => 'NISN / NIK wajib diisi.',
            'kelas.required'        => 'Kelas & Jurusan wajib diisi.',
            'no_hp.required'        => 'Nomor WhatsApp wajib diisi.',
        ]);

        return redirect()->back()->with('success', 'Berhasil mendaftar ke ekstrakurikuler ' . $request->ekstrakurikuler . '!');
    }
}