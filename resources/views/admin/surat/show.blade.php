<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Verifikasi Pengajuan Domisili') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('admin.surat.index') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 mb-4">
                &larr; Kembali ke Daftar Antrean
            </a>

            @if ($errors->any())
                <div class="mb-4 bg-red-50 border-l-4 border-red-500 text-red-700 p-4 shadow-sm">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.surat.update', $pengajuan->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    
                    <div class="lg:col-span-2 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-100">
                        <h3 class="text-lg font-bold border-b border-gray-200 pb-2 mb-4 text-gray-800">Data Pemohon (Bisa Diedit)</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700">NIK</label>
                                <input type="text" name="nik" value="{{ old('nik', $pengajuan->nik) }}" class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 bg-gray-50 focus:bg-white">
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                <input type="text" name="nama" value="{{ old('nama', $pengajuan->nama) }}" class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 bg-gray-50 focus:bg-white">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $pengajuan->tempat_lahir) }}" class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 bg-gray-50 focus:bg-white">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $pengajuan->tanggal_lahir) }}" class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 bg-gray-50 focus:bg-white">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 bg-gray-50 focus:bg-white">
                                    <option value="Laki-laki" {{ $pengajuan->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ $pengajuan->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Agama</label>
                                <input type="text" name="agama" value="{{ old('agama', $pengajuan->agama) }}" class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 bg-gray-50 focus:bg-white">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Status Perkawinan</label>
                                <input type="text" name="status_perkawinan" value="{{ old('status_perkawinan', $pengajuan->status_perkawinan) }}" class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 bg-gray-50 focus:bg-white">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Pekerjaan</label>
                                <input type="text" name="pekerjaan" value="{{ old('pekerjaan', $pengajuan->pekerjaan) }}" class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 bg-gray-50 focus:bg-white">
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                                <textarea name="alamat" rows="2" class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 bg-gray-50 focus:bg-white">{{ old('alamat', $pengajuan->alamat) }}</textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Kecamatan</label>
                                <input type="text" name="kecamatan" value="{{ old('kecamatan', $pengajuan->kecamatan) }}" class="mt-1 w-full rounded-md border-gray-300 shadow-sm bg-gray-50 focus:bg-white">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Kabupaten</label>
                                <input type="text" name="kabupaten" value="{{ old('kabupaten', $pengajuan->kabupaten) }}" class="mt-1 w-full rounded-md border-gray-300 shadow-sm bg-gray-50 focus:bg-white">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Provinsi</label>
                                <input type="text" name="provinsi" value="{{ old('provinsi', $pengajuan->provinsi) }}" class="mt-1 w-full rounded-md border-gray-300 shadow-sm bg-gray-50 focus:bg-white">
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-100">
                            <h3 class="text-lg font-bold border-b border-gray-200 pb-2 mb-4 text-gray-800 flex items-center">
                                <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                Lampiran (Jalur Aman)
                            </h3>
                            
                            <div class="mb-5">
                                <span class="block text-sm font-bold text-gray-700 mb-2">Foto KTP (Terkompresi)</span>
                                <a href="{{ route('admin.dokumen.page', $pengajuan->foto_ktp) }}">
                                    <img src="{{ route('admin.dokumen.show', $pengajuan->foto_ktp) }}" alt="KTP" class="w-full rounded-lg border border-gray-300 hover:opacity-75 transition-opacity shadow-sm">
                                </a>
                                <p class="text-xs text-gray-500 mt-1 italic">* Klik gambar untuk memperbesar</p>
                            </div>

                            <div>
                                <span class="block text-sm font-bold text-gray-700 mb-2">Foto Kartu Keluarga</span>
                                <a href="{{ route('admin.dokumen.page', $pengajuan->foto_kk) }}">
                                    <img src="{{ route('admin.dokumen.show', $pengajuan->foto_kk) }}" alt="KK" class="w-full rounded-lg border border-gray-300 hover:opacity-75 transition-opacity shadow-sm">
                                </a>
                            </div>
                        </div>

                        <div class="bg-gray-50 border border-gray-200 overflow-hidden shadow-sm sm:rounded-lg p-6">
                            <h3 class="text-lg font-bold border-b border-gray-300 pb-2 mb-4 text-indigo-800">Status Berkas</h3>
                            
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Ubah Status</label>
                                <select name="status" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 bg-white font-semibold">
                                    <option value="menunggu" {{ $pengajuan->status == 'menunggu' ? 'selected' : '' }}>⏳ Menunggu Pengecekan</option>
                                    <option value="diverifikasi" {{ $pengajuan->status == 'diverifikasi' ? 'selected' : '' }}>✅ Diverifikasi (Siap Cetak)</option>
                                    <option value="ditolak" {{ $pengajuan->status == 'ditolak' ? 'selected' : '' }}>❌ Ditolak / Data Salah</option>
                                </select>
                            </div>

                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Catatan Admin (Opsional)</label>
                                <textarea name="catatan_admin" rows="3" placeholder="Alasan ditolak atau catatan revisi..." class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm bg-white">{{ old('catatan_admin', $pengajuan->catatan_admin) }}</textarea>
                            </div>

                            <div class="flex flex-col gap-3">
                                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-4 rounded-lg transition-colors shadow-md text-sm">
                                    Simpan Perubahan & Verifikasi
                                </button>
                                
                                @if($pengajuan->status === 'diverifikasi')
                                    <a href="{{ route('admin.surat.cetak', $pengajuan->id) }}" target="_blank" class="w-full flex justify-center items-center bg-[#24a148] hover:bg-[#116936] text-white font-bold py-3 px-4 rounded-lg transition-colors shadow-md text-sm">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                                        Cetak Surat (PDF)
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </form>
            
        </div>
    </div>
</x-app-layout>