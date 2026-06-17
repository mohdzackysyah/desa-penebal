<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LayananSuratController;
use App\Http\Controllers\AdminSuratController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| FRONTEND ROUTES (Halaman Pengunjung / Warga)
|--------------------------------------------------------------------------
*/

Route::get('/', function () { return view('welcome'); })->name('home');

Route::get('/profil/tentang', function () { return view('profil.tentang'); })->name('profil.tentang');
Route::get('/profil/aparatur', function () { return view('profil.aparatur'); })->name('profil.aparatur');
Route::get('/profil/statistik', function () { return view('profil.statistik'); })->name('profil.statistik');

Route::get('/publikasi/berita', function () { return view('publikasi.berita'); })->name('publikasi.berita');
Route::get('/publikasi/pengumuman', function () { return view('publikasi.pengumuman'); })->name('publikasi.pengumuman');
Route::get('/publikasi/galeri', function () { return view('publikasi.galeri'); })->name('publikasi.galeri');

Route::get('/layanan/berkas', function () { return view('layanan.berkas'); })->name('layanan.berkas');
Route::get('/layanan/pengaduan', function () { return view('layanan.pengaduan'); })->name('layanan.pengaduan');

Route::get('/kontak', function () { return view('kontak'); })->name('kontak');

/*
|--------------------------------------------------------------------------
| ROUTES FORMULIR PENGAJUAN SURAT (Public)
|--------------------------------------------------------------------------
*/

// Rute Halaman Utama Surat (Sudah diarahkan ke Controller untuk fitur Lacak)
Route::get('/layanan/surat', [LayananSuratController::class, 'indexSurat'])->name('layanan.surat');

// RUTE YANG HILANG: Untuk menampilkan halaman formulir domisili
Route::get('/layanan/surat/form/domisili', function () { return view('layanan.form.domisili'); })->name('layanan.form.domisili');

// Rute Submit Form Domisili
Route::post('/layanan/surat/form/domisili', [LayananSuratController::class, 'storeDomisili'])->name('layanan.submit.domisili');

// RUTE BARU: Fitur Cek Status / Pelacakan Resi Surat Warga
Route::post('/layanan/cek-status', [LayananSuratController::class, 'cekStatus'])->name('layanan.cek-status');


/*
|--------------------------------------------------------------------------
| BACKEND ROUTES (Halaman Admin / Perangkat Desa) - DIAMANKAN AUTH
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ROUTE KHUSUS ADMIN SURAT
Route::middleware(['auth', 'verified'])->prefix('admin/surat')->group(function () {
    Route::get('/', [AdminSuratController::class, 'index'])->name('admin.surat.index');
    Route::get('/{id}', [AdminSuratController::class, 'show'])->name('admin.surat.show');
    Route::put('/{id}', [AdminSuratController::class, 'update'])->name('admin.surat.update');
    
    // RUTE KEAMANAN: Jalur untuk merender gambar sensitif KTP & KK (Raw File)
    Route::get('/dokumen/lihat/{filename}', [AdminSuratController::class, 'tampilkanDokumen'])->name('admin.dokumen.show');
    
    // RUTE BARU: Halaman Pratinjau Dokumen dengan tombol kembali (HTML View)
    Route::get('/dokumen/halaman/{filename}', [AdminSuratController::class, 'halamanDokumen'])->name('admin.dokumen.page');
    // RUTE BARU: Cetak PDF Surat
    Route::get('/cetak/{id}', [AdminSuratController::class, 'cetakPdf'])->name('admin.surat.cetak');
});

require __DIR__.'/auth.php';