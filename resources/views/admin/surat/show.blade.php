<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <div class="p-2 bg-[#116936] rounded-md">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            </div>
            <h2 class="font-bold text-xl text-gray-800 leading-tight">
                {{ __('Tinjau & Verifikasi Berkas') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-6">
                <a href="{{ route('admin.surat.index') }}" class="inline-flex items-center text-sm font-semibold text-gray-600 hover:text-[#116936] transition-colors">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Daftar Antrean
                </a>
            </div>

            @if (session('success'))
                <div class="mb-6 bg-[#EDFDF3] border border-[#24a148]/30 px-4 py-3 rounded-md shadow-sm flex items-center" x-data="{ show: true }" x-show="show" x-transition>
                    <div class="p-1.5 bg-[#24a148] rounded-full mr-3 text-white shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-bold text-sm text-[#116936]">Pembaruan Berhasil!</h3>
                        <p class="text-xs text-green-700">{{ session('success') }}</p>
                    </div>
                    <button @click="show = false" class="text-green-600 hover:text-green-800 focus:outline-none">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l18 18"></path></svg>
                    </button>
                </div>
            @endif

            <form action="{{ route('admin.surat.update', $pengajuan->id) }}" method="POST" class="space-y-8">
                @csrf
                @method('PUT')
                
                <div class="bg-white shadow-sm border border-gray-200 rounded-lg overflow-hidden relative">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-[#24a148] opacity-5 rounded-bl-full pointer-events-none"></div>
                    <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                        <h3 class="text-xs font-bold text-[#116936] uppercase tracking-widest">Keputusan Verifikasi & Catatan Admin</h3>
                    </div>
                    
                    <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-6 relative z-10">
                        <div class="md:col-span-1">
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5">Status Pengajuan</label>
                            <select name="status" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#116936] focus:border-[#116936] sm:text-sm font-semibold bg-gray-50 focus:bg-white transition-colors">
                                <option value="menunggu" {{ $pengajuan->status == 'menunggu' ? 'selected' : '' }}>⏳ Menunggu Pengecekan</option>
                                <option value="diverifikasi" {{ $pengajuan->status == 'diverifikasi' ? 'selected' : '' }}>✅ Diverifikasi (ACC)</option>
                                <option value="ditolak" {{ $pengajuan->status == 'ditolak' ? 'selected' : '' }}>❌ Ditolak / Salah Data</option>
                            </select>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5">Catatan Evaluasi <span class="text-gray-400 normal-case tracking-normal">(Wajib jika ditolak)</span></label>
                            <textarea name="catatan_admin" rows="2" placeholder="Contoh: NIK pada form berbeda dengan KTP..." class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#116936] focus:border-[#116936] sm:text-sm bg-gray-50 focus:bg-white transition-colors">{{ old('catatan_admin', $pengajuan->catatan_admin) }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="bg-white shadow-sm border border-gray-200 rounded-lg overflow-hidden">
                    <div class="px-6 py-4 bg-gray-50 border-b border-gray-200 flex justify-between items-center">
                        <h3 class="text-xs font-bold text-gray-700 uppercase tracking-widest">Detail Identitas Pemohon</h3>
                        <span class="text-[10px] font-semibold text-gray-500 bg-white border border-gray-200 px-2 py-1 rounded">Dapat Diedit</span>
                    </div>
                    
                    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5">Nomor Induk Kependudukan (NIK)</label>
                            <input type="text" name="nik" value="{{ old('nik', $pengajuan->nik) }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#116936] focus:border-[#116936] sm:text-sm bg-gray-50 focus:bg-white transition-colors">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5">Nama Lengkap</label>
                            <input type="text" name="nama" value="{{ old('nama', $pengajuan->nama) }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#116936] focus:border-[#116936] sm:text-sm bg-gray-50 focus:bg-white transition-colors">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $pengajuan->tempat_lahir) }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#116936] focus:border-[#116936] sm:text-sm bg-gray-50 focus:bg-white transition-colors">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $pengajuan->tanggal_lahir) }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#116936] focus:border-[#116936] sm:text-sm bg-gray-50 focus:bg-white transition-colors">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#116936] focus:border-[#116936] sm:text-sm bg-gray-50 focus:bg-white transition-colors">
                                <option value="Laki-laki" {{ $pengajuan->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ $pengajuan->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5">Agama</label>
                            <input type="text" name="agama" value="{{ old('agama', $pengajuan->agama) }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#116936] focus:border-[#116936] sm:text-sm bg-gray-50 focus:bg-white transition-colors">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5">Status Perkawinan</label>
                            <input type="text" name="status_perkawinan" value="{{ old('status_perkawinan', $pengajuan->status_perkawinan) }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#116936] focus:border-[#116936] sm:text-sm bg-gray-50 focus:bg-white transition-colors">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5">Pekerjaan</label>
                            <input type="text" name="pekerjaan" value="{{ old('pekerjaan', $pengajuan->pekerjaan) }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#116936] focus:border-[#116936] sm:text-sm bg-gray-50 focus:bg-white transition-colors">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5">Alamat Lengkap</label>
                            <textarea name="alamat" rows="2" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#116936] focus:border-[#116936] sm:text-sm bg-gray-50 focus:bg-white transition-colors">{{ old('alamat', $pengajuan->alamat) }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5">Kecamatan</label>
                            <input type="text" name="kecamatan" value="{{ old('kecamatan', $pengajuan->kecamatan) }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#116936] focus:border-[#116936] sm:text-sm bg-gray-50 focus:bg-white transition-colors">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5">Kabupaten</label>
                            <input type="text" name="kabupaten" value="{{ old('kabupaten', $pengajuan->kabupaten) }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#116936] focus:border-[#116936] sm:text-sm bg-gray-50 focus:bg-white transition-colors">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1.5">Provinsi</label>
                            <input type="text" name="provinsi" value="{{ old('provinsi', $pengajuan->provinsi) }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#116936] focus:border-[#116936] sm:text-sm bg-gray-50 focus:bg-white transition-colors">
                        </div>
                    </div>
                </div>

                <div class="bg-white shadow-sm border border-gray-200 rounded-lg overflow-hidden">
                    <div class="px-6 py-4 bg-gray-50 border-b border-gray-200 flex justify-between items-center">
                        <h3 class="text-xs font-bold text-gray-700 uppercase tracking-widest">Dokumen Persyaratan Warga</h3>
                        <span class="text-[10px] font-semibold text-green-700 bg-green-50 border border-green-200 px-2 py-1 rounded">Jalur Aman (SSDLC)</span>
                    </div>
                    
                    <div class="p-6 space-y-4">
                        <div x-data="{ bukaKtp: false }" class="border border-gray-200 rounded-md bg-white overflow-hidden shadow-sm">
                            <div class="flex items-center justify-between p-4 bg-gray-50">
                                <div class="flex items-center space-x-3">
                                    <div class="p-2 bg-[#EDFDF3] text-[#116936] rounded-md border border-[#24a148]/20">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4-4m-4 4l-4-4m4 4V10"></path></svg>
                                    </div>
                                    <div>
                                        <span class="block text-sm font-bold text-gray-800">Kartu Tanda Penduduk (KTP)</span>
                                    </div>
                                </div>
                                <button @click="bukaKtp = !bukaKtp" type="button" class="inline-flex items-center px-3 py-1.5 text-xs font-bold text-[#116936] bg-white border border-gray-300 rounded hover:bg-gray-100 transition-colors focus:outline-none">
                                    <span x-text="bukaKtp ? 'Sembunyikan' : 'Lihat Berkas'"></span>
                                    <svg :class="{'rotate-180': bukaKtp}" class="w-4 h-4 ml-1.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </button>
                            </div>
                            <div x-show="bukaKtp" style="display: none;" x-transition class="p-6 bg-gray-50 border-t border-gray-200 text-center">
                                <a href="{{ route('admin.dokumen.page', $pengajuan->foto_ktp) }}" target="_blank" title="Buka di Tab Baru" class="block group relative">
                                    <img src="{{ route('admin.dokumen.show', $pengajuan->foto_ktp) }}" alt="KTP" class="w-full max-w-xl mx-auto object-contain rounded shadow-sm border border-gray-300 bg-white p-2">
                                </a>
                            </div>
                        </div>

                        <div x-data="{ bukaKk: false }" class="border border-gray-200 rounded-md bg-white overflow-hidden shadow-sm">
                            <div class="flex items-center justify-between p-4 bg-gray-50">
                                <div class="flex items-center space-x-3">
                                    <div class="p-2 bg-[#EDFDF3] text-[#116936] rounded-md border border-[#24a148]/20">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4-4m-4 4l-4-4m4 4V10"></path></svg>
                                    </div>
                                    <div>
                                        <span class="block text-sm font-bold text-gray-800">Kartu Keluarga (KK)</span>
                                    </div>
                                </div>
                                <button @click="bukaKk = !bukaKk" type="button" class="inline-flex items-center px-3 py-1.5 text-xs font-bold text-[#116936] bg-white border border-gray-300 rounded hover:bg-gray-100 transition-colors focus:outline-none">
                                    <span x-text="bukaKk ? 'Sembunyikan' : 'Lihat Berkas'"></span>
                                    <svg :class="{'rotate-180': bukaKk}" class="w-4 h-4 ml-1.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </button>
                            </div>
                            <div x-show="bukaKk" style="display: none;" x-transition class="p-6 bg-gray-50 border-t border-gray-200 text-center">
                                <a href="{{ route('admin.dokumen.page', $pengajuan->foto_kk) }}" target="_blank" title="Buka di Tab Baru" class="block group relative">
                                    <img src="{{ route('admin.dokumen.show', $pengajuan->foto_kk) }}" alt="KK" class="w-full max-w-xl mx-auto object-contain rounded shadow-sm border border-gray-300 bg-white p-2">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 shadow-sm border border-gray-200 rounded-lg p-6 flex flex-col md:flex-row justify-between items-center gap-6">
                    
                    <div class="flex items-center w-full md:w-auto text-left">
                        @if($pengajuan->status === 'diverifikasi')
                            <div class="w-12 h-12 bg-green-100 text-[#116936] rounded-full flex items-center justify-center shrink-0 mr-4 border border-[#24a148]/30">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 leading-tight">Status: Diverifikasi</h4>
                                <p class="text-xs text-gray-500">Berkas ini telah disetujui (ACC).</p>
                            </div>
                        @elseif($pengajuan->status === 'ditolak')
                            <div class="w-12 h-12 bg-red-100 text-red-600 rounded-full flex items-center justify-center shrink-0 mr-4 border border-red-200">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l18 18"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 leading-tight">Status: Ditolak</h4>
                                <p class="text-xs text-gray-500">Menunggu revisi/dihapus.</p>
                            </div>
                        @else
                            <div class="w-12 h-12 bg-yellow-100 text-yellow-600 rounded-full flex items-center justify-center shrink-0 mr-4 border border-yellow-200">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 leading-tight">Status: Menunggu</h4>
                                <p class="text-xs text-gray-500">Belum ada tindakan admin.</p>
                            </div>
                        @endif
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                        <button type="submit" class="flex justify-center items-center bg-gray-800 hover:bg-gray-900 text-white font-bold py-3 px-6 rounded-md transition-colors text-sm shadow-sm">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                            Simpan Perubahan
                        </button>
                        
                        <a href="{{ route('admin.surat.cetak', $pengajuan->id) }}" target="_blank" class="flex justify-center items-center bg-[#116936] hover:bg-[#0c532a] text-white font-bold py-3 px-6 rounded-md transition-colors text-sm shadow-sm">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                            Cetak PDF
                        </a>
                    </div>
                </div>

            </form>
            
        </div>
    </div>
</x-app-layout>