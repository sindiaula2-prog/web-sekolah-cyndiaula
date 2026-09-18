<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    private string $uploadPath = 'images/galeri';

    // Tampilan Frontend Galeri dengan Filter Kategori
    public function index(Request $request)
    {
        $galeris = Galeri::when($request->filled('kategori'), function ($query) use ($request) {
                // Menggunakan LIKE agar aman dari perbedaan spasi/huruf kapital
                $query->where('kategori', 'LIKE', '%' . trim($request->kategori) . '%');
            })
            ->latest()
            ->get();

        return view('galeri', compact('galeris'));
    }

    // Tampilan Dashboard Admin
    public function adminIndex()
    {
        $galeris = Galeri::latest()->get();
        return view('admin.galeri.index', compact('galeris'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . preg_replace('/\s+/', '-', $file->getClientOriginalName());
            $file->move(public_path($this->uploadPath), $filename);
            $validated['foto'] = $filename;
        }

        Galeri::create($validated);

        return redirect()->route('admin.galeri.index')->with('success', 'Foto galeri berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        if ($request->hasFile('foto')) {
            $oldPath = public_path($this->uploadPath . '/' . $galeri->foto);
            if ($galeri->foto && file_exists($oldPath)) {
                @unlink($oldPath);
            }

            $file = $request->file('foto');
            $filename = time() . '_' . preg_replace('/\s+/', '-', $file->getClientOriginalName());
            $file->move(public_path($this->uploadPath), $filename);
            $validated['foto'] = $filename;
        }

        $galeri->update($validated);

        return redirect()->route('admin.galeri.index')->with('success', 'Foto galeri berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        $path = public_path($this->uploadPath . '/' . $galeri->foto);
        if ($galeri->foto && file_exists($path)) {
            @unlink($path);
        }

        $galeri->delete();

        return redirect()->route('admin.galeri.index')->with('success', 'Foto galeri berhasil dihapus.');
    }
}