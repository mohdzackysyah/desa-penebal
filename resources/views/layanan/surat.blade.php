@extends('layouts.main')

@section('content')
<div class="bg-gray-50 min-h-screen py-16">
    <div class="max-w-[1920px] mx-auto px-6 lg:px-20">
        
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-extrabold text-[#116936] tracking-tight mb-4">
                Layanan Surat Online
            </h1>
            <p class="text-lg text-gray-500 max-w-2xl mx-auto">
                Pilih jenis layanan administrasi persuratan yang Anda butuhkan. Klik pada salah satu ikon di bawah ini untuk mulai mengisi formulir.
            </p>
            <div class="w-20 h-1.5 bg-[#24a148] mx-auto mt-6 rounded-full"></div>
        </div>

        <div class="max-w-3xl mx-auto mb-16 p-6 bg-white rounded-2xl shadow-sm border border-gray-100 relative overflow-hidden">
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-[#EDFDF3] rounded-full z-0 opacity-50"></div>
            
            <div class="relative z-10">
                <h3 class="text-xl font-bold text-gray-800 mb-2 flex items-center gap-2">
                    <svg class="w-6 h-6 text-[#116936]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    Lacak Status Surat Anda
                </h3>
                <p class="text-gray-500 text-sm mb-5">Masukkan kode resi (kode lacak) yang Anda dapatkan setelah mengajukan formulir persuratan untuk mengetahui status pembuatannya.</p>
                
                <form action="{{ route('layanan.surat') }}" method="GET" class="flex flex-col sm:flex-row gap-3">
                    <input type="text" name="kode_lacak" value="{{ request('kode_lacak') }}" placeholder="Contoh: DOM-ABC123" class="flex-1 border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-[#116936] focus:border-[#116936] outline-none transition" required>
                    <button type="submit" class="bg-[#116936] text-white px-8 py-3 rounded-lg font-semibold hover:bg-[#0c4d27] transition-colors shadow-md flex items-center justify-center gap-2">
                        Cari Surat
                    </button>
                </form>

                @if(isset($surat))
                    <div class="mt-6 p-5 rounded-xl border 
                        @if(strtolower($surat->status) == 'selesai') bg-green-50 border-green-200 
                        @elseif(strtolower($surat->status) == 'ditolak') bg-red-50 border-red-200 
                        @elseif(strtolower($surat->status) == 'diverifikasi') bg-blue-50 border-blue-200 
                        @else bg-yellow-50 border-yellow-200 @endif">
                        
                        <h4 class="font-bold text-gray-800 border-b border-gray-200 pb-2 mb-3">Hasil Pencarian:</h4>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-3 text-sm text-gray-700">
                            <div><span class="text-gray-500 block text-xs mb-1">Kode Lacak</span><span class="font-semibold px-2 py-1 bg-white border rounded text-gray-800">{{ $surat->kode_lacak }}</span></div>
                            <div><span class="text-gray-500 block text-xs mb-1">Jenis Surat</span><span class="font-semibold">Surat Keterangan Domisili</span></div>
                            <div><span class="text-gray-500 block text-xs mb-1">Nama Pemohon</span><span class="font-semibold">{{ $surat->nama }}</span></div>
                            <div><span class="text-gray-500 block text-xs mb-1">Tanggal Pengajuan</span><span class="font-semibold">{{ $surat->created_at->format('d M Y') }}</span></div>
                            <div class="sm:col-span-2 mt-1">
                                <span class="text-gray-500 block text-xs mb-1">Status Saat Ini</span>
                                <span class="inline-block px-3 py-1.5 rounded-md text-xs font-bold uppercase tracking-wider
                                    @if(strtolower($surat->status) == 'selesai') bg-green-600 text-white 
                                    @elseif(strtolower($surat->status) == 'ditolak') bg-red-600 text-white 
                                    @elseif(strtolower($surat->status) == 'diverifikasi') bg-blue-600 text-white 
                                    @else bg-yellow-500 text-white @endif">
                                    {{ $surat->status }}
                                </span>
                            </div>
                            @if($surat->catatan_admin)
                                <div class="sm:col-span-2 mt-2 bg-white p-3 rounded-lg border border-red-100 text-gray-700">
                                    <span class="text-xs font-bold text-red-500 block mb-1">Catatan Admin / Keterangan:</span>
                                    <p class="italic">{{ $surat->catatan_admin }}</p>
                                </div>
                            @endif
                        </div>

                        @if(strtolower($surat->status) == 'selesai' && $surat->file_surat_hasil)
                            <div class="mt-6 pt-5 border-t border-gray-200">
                                <div class="flex flex-col sm:flex-row justify-between items-center gap-4 bg-[#EDFDF3] p-5 rounded-xl border border-[#24a148]/30 shadow-sm">
                                    <div class="flex items-center">
                                        <div class="w-12 h-12 bg-[#24a148] text-white rounded-full flex items-center justify-center shrink-0 mr-4 shadow-sm">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        </div>
                                        <div>
                                            <h5 class="font-bold text-[#116936] text-base">Surat Anda Telah Selesai!</h5>
                                            <p class="text-xs text-green-800 mt-1">Dokumen resmi yang telah ditandatangani sudah tersedia dan siap dicetak.</p>
                                        </div>
                                    </div>
                                    <div class="flex flex-col sm:flex-row gap-2 w-full sm:w-auto mt-2 sm:mt-0">
                                        
                                        <button onclick="document.getElementById('preview-surat').classList.toggle('hidden')" type="button" class="flex-1 sm:flex-none justify-center bg-white border border-[#24a148] text-[#116936] hover:bg-green-50 px-4 py-2.5 rounded-lg text-sm font-bold shadow-sm flex items-center transition-colors">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                            Lihat Surat
                                        </button>
                                        
                                        <a href="{{ route('layanan.lihat-hasil', $surat->kode_lacak) }}" target="_blank" class="flex-1 sm:flex-none justify-center bg-[#116936] hover:bg-[#0c4d27] text-white px-4 py-2.5 rounded-lg text-sm font-bold shadow-sm flex items-center transition-colors">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                                            Cetak Surat
                                        </a>
                                    </div>
                                </div>
                                
                                <div id="preview-surat" class="hidden mt-4 p-2 bg-gray-200 border border-gray-300 rounded-lg shadow-inner">
                                    <div class="bg-white p-3 rounded flex justify-between items-center mb-2">
                                        <span class="text-xs font-bold text-gray-600 uppercase tracking-wider">Pratinjau Dokumen Resmi</span>
                                        <a href="{{ route('layanan.unduh-hasil', $surat->kode_lacak) }}" class="text-xs font-bold text-blue-600 hover:text-blue-800 flex items-center bg-blue-50 px-3 py-1.5 rounded border border-blue-200">
                                            <svg class="w-3 h-3 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                            Download File
                                        </a>
                                    </div>
                                    <iframe src="{{ route('layanan.lihat-hasil', $surat->kode_lacak) }}" class="w-full h-[600px] border-0 rounded bg-white"></iframe>
                                </div>
                            </div>
                        @endif

                    </div>
                @elseif(request()->has('kode_lacak'))
                    <div class="mt-6 p-4 bg-red-50 border border-red-200 rounded-lg flex items-start gap-3 text-red-700 text-sm">
                        <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <p>Maaf, data pengajuan surat dengan kode lacak <strong class="font-mono bg-red-100 px-1 rounded">{{ request('kode_lacak') }}</strong> tidak ditemukan. Coba periksa kembali penulisannya.</p>
                    </div>
                @endif
            </div>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 max-w-7xl mx-auto">
            
            <a href="{{ route('layanan.form.domisili') }}" class="group bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-xl hover:border-green-200 transition-all duration-300 flex flex-col items-center text-center relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1 bg-transparent group-hover:bg-[#116936] transition-colors duration-300"></div>
                <div class="w-20 h-20 rounded-full bg-[#EDFDF3] text-[#116936] flex items-center justify-center mb-5 group-hover:scale-110 group-hover:bg-[#116936] group-hover:text-white transition-all duration-300 shadow-inner">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2 group-hover:text-[#116936] transition-colors">Domisili</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Khusus warga ber-KTP asli Desa Penebal.</p>
            </a>

            <a href="#" class="group bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-xl hover:border-green-200 transition-all duration-300 flex flex-col items-center text-center relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1 bg-transparent group-hover:bg-[#116936] transition-colors duration-300"></div>
                <div class="w-20 h-20 rounded-full bg-[#EDFDF3] text-[#116936] flex items-center justify-center mb-5 group-hover:scale-110 group-hover:bg-[#116936] group-hover:text-white transition-all duration-300 shadow-inner">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2 group-hover:text-[#116936] transition-colors">Domisili Kantor</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Surat keterangan lokasi instansi/perusahaan.</p>
            </a>

            <a href="#" class="group bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-xl hover:border-green-200 transition-all duration-300 flex flex-col items-center text-center relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1 bg-transparent group-hover:bg-[#116936] transition-colors duration-300"></div>
                <div class="w-20 h-20 rounded-full bg-[#EDFDF3] text-[#116936] flex items-center justify-center mb-5 group-hover:scale-110 group-hover:bg-[#116936] group-hover:text-white transition-all duration-300 shadow-inner">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2 group-hover:text-[#116936] transition-colors">Domisili Non-KTP</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Untuk warga pendatang/KTP luar Desa Penebal.</p>
            </a>

            <a href="#" class="group bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-xl hover:border-green-200 transition-all duration-300 flex flex-col items-center text-center relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1 bg-transparent group-hover:bg-[#116936] transition-colors duration-300"></div>
                <div class="w-20 h-20 rounded-full bg-[#EDFDF3] text-[#116936] flex items-center justify-center mb-5 group-hover:scale-110 group-hover:bg-[#116936] group-hover:text-white transition-all duration-300 shadow-inner">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2 group-hover:text-[#116936] transition-colors">SKTM Umum</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Surat Keterangan Tidak Mampu untuk keperluan umum.</p>
            </a>

            <a href="#" class="group bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-xl hover:border-green-200 transition-all duration-300 flex flex-col items-center text-center relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1 bg-transparent group-hover:bg-[#116936] transition-colors duration-300"></div>
                <div class="w-20 h-20 rounded-full bg-[#EDFDF3] text-[#116936] flex items-center justify-center mb-5 group-hover:scale-110 group-hover:bg-[#116936] group-hover:text-white transition-all duration-300 shadow-inner">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14v7"></path></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2 group-hover:text-[#116936] transition-colors">SKTM Beasiswa</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Persyaratan pengajuan bantuan pendidikan.</p>
            </a>

            <a href="#" class="group bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-xl hover:border-green-200 transition-all duration-300 flex flex-col items-center text-center relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1 bg-transparent group-hover:bg-[#116936] transition-colors duration-300"></div>
                <div class="w-20 h-20 rounded-full bg-[#EDFDF3] text-[#116936] flex items-center justify-center mb-5 group-hover:scale-110 group-hover:bg-[#116936] group-hover:text-white transition-all duration-300 shadow-inner">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2 group-hover:text-[#116936] transition-colors">SKTM BPJS</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Persyaratan layanan kesehatan dari pemerintah.</p>
            </a>

            <a href="#" class="group bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-xl hover:border-green-200 transition-all duration-300 flex flex-col items-center text-center relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1 bg-transparent group-hover:bg-[#116936] transition-colors duration-300"></div>
                <div class="w-20 h-20 rounded-full bg-[#EDFDF3] text-[#116936] flex items-center justify-center mb-5 group-hover:scale-110 group-hover:bg-[#116936] group-hover:text-white transition-all duration-300 shadow-inner">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2 group-hover:text-[#116936] transition-colors">Keterangan Usaha</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Pengantar pembuatan izin atau bantuan UMKM.</p>
            </a>

        </div>
    </div>
</div>
@endsection