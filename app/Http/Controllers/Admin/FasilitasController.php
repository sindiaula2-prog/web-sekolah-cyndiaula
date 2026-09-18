<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    // Path relatif terhadap public/, sesuai konvensi data yang sudah ada
    private string $uploadPath = 'images/jurusan/fasilitas';

    public function index()
    {
        $fasilitas = Fasilitas::latest()->get();

        return view('admin.fasilitas.index', compact('fasilitas'));
    }

    public function create()
    {
        return view('admin.fasilitas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'deskripsi'      => 'required|string',
            'foto'           => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . preg_replace('/\s+/', '-', $file->getClientOriginalName());
            $file->move(public_path($this->uploadPath), $filename);
            $validated['foto'] = $this->uploadPath . '/' . $filename;
        }

        Fasilitas::create($validated);

        return redirect()
            ->route('admin.fasilitas.index')
            ->with('success', 'Fasilitas berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);

        return view('admin.fasilitas.edit', compact('fasilitas'));
    }

    public function update(Request $request, $id)
    {
        $fasilitas = Fasilitas::findOrFail($id);

        $validated = $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'deskripsi'      => 'required|string',
            'foto'           => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($fasilitas->foto) {
                $oldPath = public_path($fasilitas->foto);
                if (file_exists($oldPath)) {
                    @unlink($oldPath);
                }
            }

            $file = $request->file('foto');
            $filename = time() . '_' . preg_replace('/\s+/', '-', $file->getClientOriginalName());
            $file->move(public_path($this->uploadPath), $filename);
            $validated['foto'] = $this->uploadPath . '/' . $filename;
        }

        $fasilitas->update($validated);

        return redirect()
            ->route('admin.fasilitas.index')
            ->with('success', 'Fasilitas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);

        if ($fasilitas->foto) {
            $path = public_path($fasilitas->foto);
            if (file_exists($path)) {
                @unlink($path);
            }
        }

        $fasilitas->delete();

        return redirect()
            ->route('admin.fasilitas.index')
            ->with('success', 'Fasilitas berhasil dihapus.');
    }
}