<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanDomisili;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class LayananSuratController extends Controller
{
    // Method untuk memproses form pengajuan dari warga
    public function storeDomisili(Request $request)
    {
        // 1. Validasi Input
        $validated = $request->validate([
            'nik' => 'required|numeric|digits:16',
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string',
            'status_perkawinan' => 'required|string',
            'pekerjaan' => 'required|string',
            'alamat' => 'required|string',
            'kecamatan' => 'required|string',
            'kabupaten' => 'required|string',
            'provinsi' => 'required|string',
            'foto_ktp' => 'required|image|mimes:jpeg,png,jpg|max:10240',
            'foto_kk' => 'required|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $manager = new ImageManager(new Driver());
        $pathKtp = null;
        $pathKk = null;

        // 2. Proses Kompresi KTP
        if ($request->hasFile('foto_ktp')) {
            $ktp = $request->file('foto_ktp');
            $namaFileKtp = 'KTP_' . $validated['nik'] . '_' . Str::random(5) . '.jpg';
            $imageKtp = $manager->read($ktp);
            $imageKtp->scaleDown(width: 800);
            
            $pathKtpLokasi = storage_path('app/private/dokumen/');
            if (!file_exists($pathKtpLokasi)) mkdir($pathKtpLokasi, 0755, true);
            
            $imageKtp->save($pathKtpLokasi . $namaFileKtp, quality: 75);
            $pathKtp = $namaFileKtp;
        }

        // 3. Proses Kompresi KK
        if ($request->hasFile('foto_kk')) {
            $kk = $request->file('foto_kk');
            $namaFileKk = 'KK_' . $validated['nik'] . '_' . Str::random(5) . '.jpg';
            $imageKk = $manager->read($kk);
            $imageKk->scaleDown(width: 1000);
            
            $pathKkLokasi = storage_path('app/private/dokumen/');
            if (!file_exists($pathKkLokasi)) mkdir($pathKkLokasi, 0755, true);
            
            $imageKk->save($pathKkLokasi . $namaFileKk, quality: 75);
            $pathKk = $namaFileKk;
        }

        // 4. GENERATE KODE RESI UNIK 
        $kodeResi = 'DOM-' . strtoupper(Str::random(8));

        // 5. Simpan Data ke Database
        PengajuanDomisili::create([
            'kode_resi' => $kodeResi,
            'nik' => $validated['nik'],
            'nama' => $validated['nama'],
            'tempat_lahir' => $validated['tempat_lahir'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'agama' => $validated['agama'],
            'status_perkawinan' => $validated['status_perkawinan'],
            'pekerjaan' => $validated['pekerjaan'],
            'alamat' => $validated['alamat'],
            'kecamatan' => $validated['kecamatan'],
            'kabupaten' => $validated['kabupaten'],
            'provinsi' => $validated['provinsi'],
            'foto_ktp' => $pathKtp,
            'foto_kk' => $pathKk,
            'status' => 'menunggu'
        ]);

        // 6. Redirect dan berikan Kode Resi ke Warga
        return redirect()->back()->with([
            'success' => 'Pengajuan berhasil dikirim!',
            'kode_resi' => $kodeResi
        ]);
    }

    // Method untuk warga mengecek status surat dari kode resi
    public function cekStatus(Request $request)
    {
        $request->validate([
            'kode_resi' => 'required|string'
        ]);

        $pengajuan = PengajuanDomisili::where('kode_resi', $request->kode_resi)->first();

        if (!$pengajuan) {
            return redirect()->back()->with('error_resi', 'Kode Resi tidak ditemukan. Pastikan kode yang dimasukkan sudah benar.');
        }

        return redirect()->back()->with('status_pengajuan', $pengajuan);
    }
}