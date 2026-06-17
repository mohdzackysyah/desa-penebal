<?php

namespace App\Http\Controllers;

use App\Models\PengajuanDomisili;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

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

        return redirect()->back()->with('success', 'Data pengajuan atas nama ' . $pengajuan->nama . ' berhasil diperbarui!');
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