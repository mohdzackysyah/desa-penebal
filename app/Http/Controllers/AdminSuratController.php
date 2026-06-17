<?php

namespace App\Http\Controllers;

use App\Models\PengajuanDomisili;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;

class AdminSuratController extends Controller
{
    public function index()
    {
        $pengajuan = PengajuanDomisili::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.surat.index', compact('pengajuan'));
    }

    public function show($id)
    {
        $pengajuan = PengajuanDomisili::findOrFail($id);
        return view('admin.surat.show', compact('pengajuan'));
    }

    public function update(Request $request, $id)
    {
        $pengajuan = PengajuanDomisili::findOrFail($id);

        // 1. Validasi Input, tambahkan status 'selesai' dan validasi file unggahan
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
            'status' => 'required|in:menunggu,diverifikasi,ditolak,selesai', // Ditambah 'selesai'
            'catatan_admin' => 'nullable|string',
            'file_surat_hasil' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120', // Maks 5MB
        ]);

        // 2. Proses upload file surat hasil jika admin mengunggahnya
        if ($request->hasFile('file_surat_hasil')) {
            $file = $request->file('file_surat_hasil');
            
            // Buat penamaan file yang unik dan rapi
            $namaFile = 'SURAT_HASIL_' . ($pengajuan->kode_lacak ?? $pengajuan->nik) . '_' . time() . '.' . $file->getClientOriginalExtension();
            
            // Tentukan lokasi folder aman (private)
            $pathLokasi = storage_path('app/private/dokumen_hasil/');
            
            // Buat folder jika belum ada
            if (!file_exists($pathLokasi)) {
                mkdir($pathLokasi, 0755, true);
            }
            
            // Pindahkan file ke folder tujuan
            $file->move($pathLokasi, $namaFile);
            
            // Masukkan nama file ke array tervalidasi agar ikut tersimpan ke DB
            $validated['file_surat_hasil'] = $namaFile;
        }

        // 3. Update data pengajuan ke database
        $pengajuan->update($validated);

        return redirect()->back()->with('success', 'Data pengajuan atas nama ' . $pengajuan->nama . ' beserta statusnya berhasil diperbarui!');
    }

    public function tampilkanDokumen($filename)
    {
        $amanFilename = basename($filename); 
        $path = storage_path('app/private/dokumen/' . $amanFilename);

        if (!file_exists($path)) {
            abort(404, 'Dokumen tidak ditemukan atau sudah dihapus.');
        }

        return response()->file($path);
    }

    public function halamanDokumen($filename)
    {
        return view('admin.surat.view_dokumen', compact('filename'));
    }

    // FUNGSI CETAK PDF (Sekarang bisa dicetak kapanpun, tanpa peduli statusnya)
    public function cetakPdf($id)
    {
        $pengajuan = PengajuanDomisili::findOrFail($id);

        // BLOKIR KEAMANAN STATUS TELAH DIHAPUS DI SINI

        $pdf = Pdf::loadView('admin.surat.cetak_domisili', compact('pengajuan'));
        $pdf->setPaper('A4', 'portrait');

        $pdfBase64 = base64_encode($pdf->output());

        return view('admin.surat.preview_pdf', compact('pdfBase64', 'pengajuan'));
    }
}