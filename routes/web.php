<?php

use Illuminate\Support\Facades\Route;

// ==========================================================
// CONTROLLER PUBLIK
// ==========================================================

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AgendaController;


// ==========================================================
// CONTROLLER ADMIN
// ==========================================================

use App\Http\Controllers\Admin\JurusanController as AdminJurusanController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\AgendaController as AdminAgendaController;
use App\Http\Controllers\Admin\GuruController as AdminGuruController;
use App\Http\Controllers\Admin\ProfilController as AdminProfilController;
use App\Http\Controllers\Admin\KontakController as AdminKontakController;
use App\Http\Controllers\Admin\FasilitasController as AdminFasilitasController;


// ==========================================================
// MIDDLEWARE
// ==========================================================

use App\Http\Middleware\EnsureUserIsAdmin;


// ==========================================================
// HALAMAN PUBLIK
// ==========================================================

// BERANDA
Route::get('/', [BerandaController::class, 'index'])->name('beranda');

// PROFIL SEKOLAH
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
Route::get('/profil/sejarah', [ProfilController::class, 'sejarah'])->name('profil.sejarah');
Route::get('/profil/visi-misi', [ProfilController::class, 'visiMisi'])->name('profil.visi-misi');
Route::get('/profil/pegawai', [ProfilController::class, 'pegawai'])->name('profil.pegawai');
Route::get('/profil/fasilitas', [ProfilController::class, 'fasilitas'])->name('profil.fasilitas');

// KONSENTRASI KEAHLIAN / JURUSAN
Route::get('/jurusan', [AdminJurusanController::class, 'index'])->name('jurusan');
Route::get('/jurusan/{kode}', [AdminJurusanController::class, 'show'])->name('jurusan.detail');

// EKSTRAKURIKULER
Route::get('/ekskul', [EkstrakurikulerController::class, 'index'])->name('ekskul.index');
Route::get('/ekskul/{id}', [EkstrakurikulerController::class, 'show'])->name('ekskul.show');
Route::post('/ekskul/daftar', [EkstrakurikulerController::class, 'daftar'])->name('ekskul.daftar');

// INFORMASI (BERITA, AGENDA, GALERI)
Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');

Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda');
Route::get('/agenda/{id}', [AgendaController::class, 'show'])->name('agenda.show');

Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');

// KONTAK
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
Route::post('/kontak', [KontakController::class, 'kirim'])->name('kontak.kirim');


// ==========================================================
// LOGIN ADMIN
// ==========================================================

Route::middleware('guest')->group(function () {
    Route::get('/masuk', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/masuk', [AuthController::class, 'login'])->name('login.post');
});


// ==========================================================
// LOGOUT
// ==========================================================

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


// ==========================================================
// AREA ADMIN
// ==========================================================

Route::prefix('admin')
    ->name('admin.')
    ->middleware([
        'auth',
        EnsureUserIsAdmin::class
    ])
    ->group(function () {

        // DASHBOARD
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // PROFIL SEKOLAH ADMIN
        Route::prefix('profil')->name('profil.')->group(function () {
            Route::get('/', [AdminProfilController::class, 'index'])->name('index');
            Route::get('/{profil}/edit', [AdminProfilController::class, 'edit'])->name('edit');
            Route::put('/{profil}', [AdminProfilController::class, 'update'])->name('update');
        });

        // KONTAK ADMIN
        Route::prefix('kontak')->name('kontak.')->group(function () {
            Route::get('/', [AdminKontakController::class, 'index'])->name('index');
            Route::get('/{kontak}', [AdminKontakController::class, 'show'])->name('show');
            Route::get('/{kontak}/edit', [AdminKontakController::class, 'edit'])->name('edit');
            Route::put('/{kontak}', [AdminKontakController::class, 'update'])->name('update');
            Route::delete('/{kontak}', [AdminKontakController::class, 'destroy'])->name('destroy');
        });

        // EKSTRAKURIKULER ADMIN
        Route::prefix('ekskul')->name('ekskul.')->group(function () {
            Route::get('/', [EkstrakurikulerController::class, 'adminIndex'])->name('index');
            Route::get('/create', [EkstrakurikulerController::class, 'create'])->name('create');
            Route::post('/', [EkstrakurikulerController::class, 'store'])->name('store');
            Route::get('/{ekskul}/edit', [EkstrakurikulerController::class, 'edit'])->name('edit');
            Route::put('/{ekskul}', [EkstrakurikulerController::class, 'update'])->name('update');
            Route::delete('/{ekskul}', [EkstrakurikulerController::class, 'destroy'])->name('destroy');
        });

        // JURUSAN ADMIN
        Route::prefix('jurusan')->name('jurusan.')->group(function () {
            Route::get('/', [AdminJurusanController::class, 'adminIndex'])->name('index');
            Route::get('/create', [AdminJurusanController::class, 'create'])->name('create');
            Route::post('/', [AdminJurusanController::class, 'store'])->name('store');
            Route::get('/{jurusan}/edit', [AdminJurusanController::class, 'edit'])->name('edit');
            Route::put('/{jurusan}', [AdminJurusanController::class, 'update'])->name('update');
            Route::delete('/{jurusan}', [AdminJurusanController::class, 'destroy'])->name('destroy');
        });

        // GALERI ADMIN
        Route::prefix('galeri')->name('galeri.')->group(function () {
            Route::get('/', [GaleriController::class, 'adminIndex'])->name('index');
            Route::get('/create', [GaleriController::class, 'create'])->name('create');
            Route::post('/', [GaleriController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [GaleriController::class, 'edit'])->name('edit');
            Route::put('/{id}', [GaleriController::class, 'update'])->name('update');
            Route::delete('/{id}', [GaleriController::class, 'destroy'])->name('destroy');
        });

        // BERITA ADMIN
        Route::resource('berita', AdminBeritaController::class)->except(['show']);

        // AGENDA ADMIN
        Route::resource('agenda', AdminAgendaController::class)->except(['show']);

        // GURU ADMIN
        Route::resource('guru', AdminGuruController::class);

        // FASILITAS ADMIN
        Route::resource('fasilitas', AdminFasilitasController::class)->except(['show']);
    });