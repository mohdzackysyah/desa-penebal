<?php

namespace App\Http\Controllers;

use App\Models\PengajuanDomisili;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminSuratController extends Controller
{
    // Menampilkan daftar semua pengajuan surat
    public function index()
    {
        $pengajuan = PengajuanDomisili::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.surat.index', compact('pengajuan'));
    }

    // Menampilkan detail form untuk diverifikasi admin
    public function show($id)
    {
        $pengajuan = PengajuanDomisili::findOrFail($id);
        return view('admin.surat.show', compact('pengajuan'));
    }

    // Menyimpan modifikasi admin dan memverifikasi surat
    public function update(Request $request, $id)
    {
        $pengajuan = PengajuanDomisili::findOrFail($id);

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
            'status' => 'required|in:menunggu,diverifikasi,ditolak',
            'catatan_admin' => 'nullable|string',
        ]);

        $pengajuan->update($validated);

        return redirect()->route('admin.surat.index')->with('success', 'Data pengajuan atas nama ' . $pengajuan->nama . ' berhasil diperbarui dan diverifikasi!');
    }

    // FUNGSI KEAMANAN (SSDLC) - Menampilkan dokumen KTP/KK HANYA untuk admin
    public function tampilkanDokumen($filename)
    {
        $amanFilename = basename($filename); 
        $path = storage_path('app/private/dokumen/' . $amanFilename);

        if (!file_exists($path)) {
            abort(404, 'Dokumen tidak ditemukan atau sudah dihapus.');
        }

        return response()->file($path);
    }

    // Mengembalikan halaman view HTML pembungkus gambar
    public function halamanDokumen($filename)
    {
        return view('admin.surat.view_dokumen', compact('filename'));
    }

    // MODIFIKASI TOTAL: FUNGSI CETAK PDF (Anti IDM)
    public function cetakPdf($id)
    {
        $pengajuan = PengajuanDomisili::findOrFail($id);

        if ($pengajuan->status !== 'diverifikasi') {
            return redirect()->back()->withErrors(['Surat belum diverifikasi dan tidak dapat dicetak.']);
        }

        // Render file blade 'cetak_domisili' menjadi PDF
        $pdf = Pdf::loadView('admin.surat.cetak_domisili', compact('pengajuan'));
        
        // Atur ukuran kertas ke A4 Portrait
        $pdf->setPaper('A4', 'portrait');

        // Mengubah output PDF menjadi string teks Base64 (IDM tidak bisa membaca ini sebagai file download)
        $pdfBase64 = base64_encode($pdf->output());

        // Mengembalikan sebuah VIEW HTML, bukan mengirim header file PDF
        return view('admin.surat.preview_pdf', compact('pdfBase64', 'pengajuan'));
    }
}