<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanDomisili;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class LayananSuratController extends Controller
{
    // Method untuk menampilkan halaman surat online beserta fitur lacaknya
    public function indexSurat(Request $request)
    {
        $kodeLacak = $request->input('kode_lacak');
        $surat = null;

        if ($kodeLacak) {
            $surat = PengajuanDomisili::where('kode_lacak', $kodeLacak)->first();
        }

        return view('layanan.surat', compact('surat'));
    }

    // Method untuk memproses pengajuan domisili
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

        // 2. Generate Kode Lacak (Contoh: DOM-A1B2C3)
        $kodeLacak = 'DOM-' . strtoupper(Str::random(6));

        // 3. Inisialisasi Image Manager
        $manager = new ImageManager(new Driver());
        $pathKtp = null;
        $pathKk = null;

        // 4. Proses Auto-Compression Foto KTP
        if ($request->hasFile('foto_ktp')) {
            $ktp = $request->file('foto_ktp');
            $namaFileKtp = 'KTP_' . $validated['nik'] . '_' . Str::random(5) . '.jpg';
            
            $imageKtp = $manager->read($ktp);
            $imageKtp->scaleDown(width: 800);
            
            $pathKtpLokasi = storage_path('app/private/dokumen/');
            if (!file_exists($pathKtpLokasi)) {
                mkdir($pathKtpLokasi, 0755, true);
            }
            $imageKtp->save($pathKtpLokasi . $namaFileKtp, quality: 75);
            $pathKtp = $namaFileKtp; 
        }

        // 5. Proses Auto-Compression Foto KK
        if ($request->hasFile('foto_kk')) {
            $kk = $request->file('foto_kk');
            $namaFileKk = 'KK_' . $validated['nik'] . '_' . Str::random(5) . '.jpg';
            
            $imageKk = $manager->read($kk);
            $imageKk->scaleDown(width: 1000); 
            
            $pathKkLokasi = storage_path('app/private/dokumen/');
            if (!file_exists($pathKkLokasi)) {
                mkdir($pathKkLokasi, 0755, true);
            }
            $imageKk->save($pathKkLokasi . $namaFileKk, quality: 75);
            $pathKk = $namaFileKk; 
        }

        // 6. Simpan Data ke Database beserta Kode Lacak
        PengajuanDomisili::create([
            'kode_lacak' => $kodeLacak, // <--- TAMBAHKAN INI
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

        // 7. Redirect dengan info Kode Lacak
        return redirect()->back()->with('success', 'Pengajuan berhasil dikirim! Kode Lacak Anda adalah: <strong>' . $kodeLacak . '</strong>. Simpan kode ini untuk mengecek status surat Anda.');
    }
}