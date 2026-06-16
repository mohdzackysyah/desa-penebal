<?php

use Illuminate\Support\Facades\Route;

// Beranda
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Kelompok Menu: Profil Desa
Route::prefix('profil')->name('profil.')->group(function () {
    Route::get('/tentang', function () { return view('profil.tentang'); })->name('tentang');
    Route::get('/aparatur', function () { return view('profil.aparatur'); })->name('aparatur');
    Route::get('/statistik', function () { return view('profil.statistik'); })->name('statistik');
});

// Kelompok Menu: Publikasi
Route::prefix('publikasi')->name('publikasi.')->group(function () {
    Route::get('/berita', function () { return view('publikasi.berita'); })->name('berita');
    Route::get('/pengumuman', function () { return view('publikasi.pengumuman'); })->name('pengumuman');
    Route::get('/galeri', function () { return view('publikasi.galeri'); })->name('galeri');
});

// Kelompok Menu: Layanan (Sub-menu Pengajuan Berkas ditambahkan di sini)
Route::prefix('layanan')->name('layanan.')->group(function () {
    Route::get('/surat-online', function () { return view('layanan.surat'); })->name('surat');
    Route::get('/pengaduan', function () { return view('layanan.pengaduan'); })->name('pengaduan');
    Route::get('/pengajuan-berkas', function () { return view('layanan.berkas'); })->name('berkas');
});

// Menu: Kontak
Route::get('/kontak', function () { 
    return view('kontak'); 
})->name('kontak');

require __DIR__.'/auth.php';