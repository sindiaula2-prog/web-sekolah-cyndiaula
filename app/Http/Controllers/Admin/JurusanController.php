<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JurusanController extends Controller
{
    // =========================================================
    // HALAMAN PUBLIK
    // =========================================================

    /**
     * Menampilkan semua jurusan
     */
    public function index()
    {
        $jurusans = Jurusan::latest()->get();

        return view('jurusan.index', compact('jurusans'));
    }


    /**
     * Menampilkan detail jurusan
     */
    public function show($kode)
    {
        $kode = strtolower(trim($kode));

        // =====================================================
        // ALIAS KODE JURUSAN
        // =====================================================
        //
        // PENTING: hasil alias di bawah ini HARUS sama dengan
        // nilai kolom "kode" yang benar-benar tersimpan di
        // database (lihat Daftar Konsentrasi Keahlian di admin).
        //
        // Kalau ternyata suatu saat kode di database diubah,
        // sesuaikan juga nilai di sisi kanan tanda "=" berikut.
        // =====================================================

        if (in_array($kode, ['rpl', 'pplg'])) {
            $kode = 'rpl'; // FIX: sebelumnya salah diarahkan ke 'pplg'
        }

        elseif (in_array($kode, ['tkr', 'tkro'])) {
            $kode = 'tkr';
        }

        elseif (in_array($kode, ['bd', 'pemasaran'])) {
            $kode = 'bd';
        }

        elseif ($kode === 'aphp') {
            $kode = 'aphp';
        }


        // Cari jurusan
        $jurusan = Jurusan::whereRaw(
            'LOWER(kode) = ?',
            [$kode]
        )->first();


        // Jika tidak ditemukan
        if (!$jurusan) {
            abort(
                404,
                'Konsentrasi keahlian tidak ditemukan.'
            );
        }


        // Daftar kode jurusan
        $semuaKode = [
            'RPL',
            'TKR',
            'APHP',
            'BD'
        ];


        return view(
            'jurusan.jurusan-detail',
            compact(
                'jurusan',
                'semuaKode'
            )
        );
    }


    // =========================================================
    // ADMIN
    // =========================================================

    /**
     * Menampilkan daftar jurusan di admin
     */
    public function adminIndex()
    {
        $jurusans = Jurusan::latest()
            ->paginate(10);

        return view(
            'admin.jurusan.index',
            compact('jurusans')
        );
    }


    /**
     * Form tambah jurusan
     */
    public function create()
    {
        return view('admin.jurusan.create');
    }


    /**
     * Menyimpan jurusan baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'kode' => [
                'required',
                'string',
                'max:20',
                'unique:jurusans,kode',
            ],

            'nama_jurusan' => [
                'required',
                'string',
                'max:255',
            ],

            'logo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'deskripsi' => [
                'nullable',
                'string',
            ],

            'kompetensi' => [
                'nullable',
                'string',
            ],

            'prospek_karir' => [
                'nullable',
                'string',
            ],

            'kaprodi_nama' => [
                'nullable',
                'string',
                'max:255',
            ],

            'kaprodi_gelar' => [
                'nullable',
                'string',
                'max:100',
            ],

            'kaprodi_foto' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

        ]);


        // =====================================================
        // UBAH TEXTAREA MENJADI ARRAY
        // =====================================================

        $validated['kompetensi'] =
            $this->textareaToArray(
                $request->kompetensi
            );

        $validated['prospek_karir'] =
            $this->textareaToArray(
                $request->prospek_karir
            );


        // =====================================================
        // UPLOAD LOGO
        // =====================================================

        if ($request->hasFile('logo')) {

            $validated['logo'] =
                $request->file('logo')->store(
                    'jurusan/logo',
                    'public'
                );
        }


        // =====================================================
        // UPLOAD FOTO KAPRODI
        // =====================================================

        if ($request->hasFile('kaprodi_foto')) {

            $validated['kaprodi_foto'] =
                $request->file('kaprodi_foto')->store(
                    'jurusan/kaprodi',
                    'public'
                );
        }


        // =====================================================
        // SIMPAN DATABASE
        // =====================================================

        Jurusan::create($validated);


        return redirect()
            ->route('admin.jurusan.index')
            ->with(
                'success',
                'Jurusan berhasil ditambahkan.'
            );
    }


    /**
     * Form edit jurusan
     */
    public function edit(Jurusan $jurusan)
    {
        return view(
            'admin.jurusan.edit',
            compact('jurusan')
        );
    }


    /**
     * Update jurusan
     */
    public function update(
        Request $request,
        Jurusan $jurusan
    ) {

        $validated = $request->validate([

            'kode' => [
                'required',
                'string',
                'max:20',
                'unique:jurusans,kode,' . $jurusan->id,
            ],

            'nama_jurusan' => [
                'required',
                'string',
                'max:255',
            ],

            'logo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'deskripsi' => [
                'nullable',
                'string',
            ],

            'kompetensi' => [
                'nullable',
                'string',
            ],

            'prospek_karir' => [
                'nullable',
                'string',
            ],

            'kaprodi_nama' => [
                'nullable',
                'string',
                'max:255',
            ],

            'kaprodi_gelar' => [
                'nullable',
                'string',
                'max:100',
            ],

            'kaprodi_foto' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

        ]);


        // =====================================================
        // TEXTAREA
        // =====================================================

        $validated['kompetensi'] =
            $this->textareaToArray(
                $request->kompetensi
            );

        $validated['prospek_karir'] =
            $this->textareaToArray(
                $request->prospek_karir
            );


        // =====================================================
        // LOGO BARU
        // =====================================================

        if ($request->hasFile('logo')) {

            if ($jurusan->logo) {

                Storage::disk('public')->delete(
                    $jurusan->logo
                );
            }

            $validated['logo'] =
                $request->file('logo')->store(
                    'jurusan/logo',
                    'public'
                );
        }


        // =====================================================
        // FOTO KAPRODI BARU
        // =====================================================

        if ($request->hasFile('kaprodi_foto')) {

            if ($jurusan->kaprodi_foto) {

                Storage::disk('public')->delete(
                    $jurusan->kaprodi_foto
                );
            }

            $validated['kaprodi_foto'] =
                $request->file('kaprodi_foto')->store(
                    'jurusan/kaprodi',
                    'public'
                );
        }


        // =====================================================
        // UPDATE
        // =====================================================

        $jurusan->update($validated);


        return redirect()
            ->route('admin.jurusan.index')
            ->with(
                'success',
                'Jurusan berhasil diperbarui.'
            );
    }


    /**
     * Hapus jurusan
     */
    public function destroy(Jurusan $jurusan)
    {
        // Hapus logo
        if ($jurusan->logo) {

            Storage::disk('public')->delete(
                $jurusan->logo
            );
        }


        // Hapus foto kaprodi
        if ($jurusan->kaprodi_foto) {

            Storage::disk('public')->delete(
                $jurusan->kaprodi_foto
            );
        }


        // Hapus data
        $jurusan->delete();


        return redirect()
            ->route('admin.jurusan.index')
            ->with(
                'success',
                'Jurusan berhasil dihapus.'
            );
    }


    // =========================================================
    // HELPER
    // =========================================================

    /**
     * Mengubah textarea menjadi array
     */
    private function textareaToArray(?string $text): array
    {
        if (!$text) {
            return [];
        }


        $lines = explode(
            "\n",
            $text
        );


        $lines = array_map(
            'trim',
            $lines
        );


        $lines = array_filter(
            $lines,
            function ($line) {
                return $line !== '';
            }
        );


        return array_values($lines);
    }
}