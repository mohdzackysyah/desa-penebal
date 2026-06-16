@extends('layouts.main')

@section('content')
<div class="bg-gray-50 min-h-screen py-12">
    <div class="max-w-4xl mx-auto px-6 lg:px-8">
        
        <div class="mb-8">
            <a href="{{ route('layanan.surat') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-[#116936] transition-colors mb-4">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Daftar Surat
            </a>
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Formulir Surat Keterangan Domisili</h1>
            <p class="mt-2 text-gray-500">Lengkapi data diri dan unggah berkas persyaratan di bawah ini untuk mengajukan permohonan surat.</p>
        </div>

        @if(session('success'))
        <div class="mb-8 bg-green-50 border-l-4 border-[#24a148] p-4 rounded-r-lg shadow-sm">
            <div class="flex items-center">
                <svg class="h-6 w-6 text-[#24a148] mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <div>
                    <h3 class="text-green-800 font-bold text-lg">Berhasil!</h3>
                    <p class="text-green-700 text-sm mt-1">{{ session('success') }}</p>
                </div>
            </div>
        </div>
        @endif

        @if ($errors->any())
        <div class="mb-8 bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg shadow-sm">
            <div class="flex items-start">
                <svg class="h-6 w-6 text-red-500 mr-3 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <div>
                    <h3 class="text-red-800 font-bold">Terjadi Kesalahan</h3>
                    <ul class="list-disc list-inside text-red-700 text-sm mt-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif

        <form action="{{ route('layanan.submit.domisili') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            @csrf
            
            <div class="p-8 space-y-8">
                <div>
                    <h3 class="text-lg font-bold text-gray-900 border-b border-gray-100 pb-2 mb-4 text-[#116936]">1. Data Diri Pemohon</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <div class="md:col-span-2">
                            <label for="nik" class="block text-sm font-medium text-gray-700 mb-1">Nomor Induk Kependudukan (NIK) <span class="text-red-500">*</span></label>
                            <input type="number" id="nik" name="nik" value="{{ old('nik') }}" required placeholder="Masukkan 16 digit NIK" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-[#24a148] focus:border-[#24a148] transition-all">
                        </div>

                        <div class="md:col-span-2">
                            <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                            <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required placeholder="Sesuai KTP" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-[#24a148] focus:border-[#24a148] transition-all">
                        </div>

                        <div>
                            <label for="tempat_lahir" class="block text-sm font-medium text-gray-700 mb-1">Tempat Lahir <span class="text-red-500">*</span></label>
                            <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-[#24a148] focus:border-[#24a148] transition-all">
                        </div>

                        <div>
                            <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir <span class="text-red-500">*</span></label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-[#24a148] focus:border-[#24a148] transition-all">
                        </div>

                        <div>
                            <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin <span class="text-red-500">*</span></label>
                            <select id="jenis_kelamin" name="jenis_kelamin" required class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-[#24a148] focus:border-[#24a148] transition-all">
                                <option value="" disabled {{ old('jenis_kelamin') ? '' : 'selected' }}>Pilih Jenis Kelamin</option>
                                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>

                        <div>
                            <label for="agama" class="block text-sm font-medium text-gray-700 mb-1">Agama <span class="text-red-500">*</span></label>
                            <select id="agama" name="agama" required class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-[#24a148] focus:border-[#24a148] transition-all">
                                <option value="" disabled {{ old('agama') ? '' : 'selected' }}>Pilih Agama</option>
                                <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                            </select>
                        </div>

                        <div>
                            <label for="status_perkawinan" class="block text-sm font-medium text-gray-700 mb-1">Status Perkawinan <span class="text-red-500">*</span></label>
                            <select id="status_perkawinan" name="status_perkawinan" required class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-[#24a148] focus:border-[#24a148] transition-all">
                                <option value="" disabled {{ old('status_perkawinan') ? '' : 'selected' }}>Pilih Status</option>
                                <option value="Belum Kawin" {{ old('status_perkawinan') == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                                <option value="Kawin" {{ old('status_perkawinan') == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                                <option value="Cerai Hidup" {{ old('status_perkawinan') == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                                <option value="Cerai Mati" {{ old('status_perkawinan') == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                            </select>
                        </div>

                        <div>
                            <label for="pekerjaan" class="block text-sm font-medium text-gray-700 mb-1">Pekerjaan <span class="text-red-500">*</span></label>
                            <input type="text" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') }}" required placeholder="Contoh: Wiraswasta" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-[#24a148] focus:border-[#24a148] transition-all">
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-bold text-gray-900 border-b border-gray-100 pb-2 mb-4 text-[#116936]">2. Alamat Domisili</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <div class="md:col-span-2">
                            <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat Lengkap (Jalan, RT/RW) <span class="text-red-500">*</span></label>
                            <textarea id="alamat" name="alamat" rows="3" required placeholder="Contoh: Jl. Utama Desa Penebal RT 01 / RW 02" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-[#24a148] focus:border-[#24a148] transition-all">{{ old('alamat') }}</textarea>
                        </div>

                        <div>
                            <label for="kecamatan" class="block text-sm font-medium text-gray-700 mb-1">Kecamatan <span class="text-red-500">*</span></label>
                            <input type="text" id="kecamatan" name="kecamatan" required value="{{ old('kecamatan', 'Bengkalis') }}" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-[#24a148] focus:border-[#24a148] transition-all">
                        </div>

                        <div>
                            <label for="kabupaten" class="block text-sm font-medium text-gray-700 mb-1">Kabupaten <span class="text-red-500">*</span></label>
                            <input type="text" id="kabupaten" name="kabupaten" required value="{{ old('kabupaten', 'Bengkalis') }}" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-[#24a148] focus:border-[#24a148] transition-all">
                        </div>

                        <div class="md:col-span-2">
                            <label for="provinsi" class="block text-sm font-medium text-gray-700 mb-1">Provinsi <span class="text-red-500">*</span></label>
                            <input type="text" id="provinsi" name="provinsi" required value="{{ old('provinsi', 'Riau') }}" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-[#24a148] focus:border-[#24a148] transition-all">
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-bold text-gray-900 border-b border-gray-100 pb-2 mb-4 text-[#116936]">3. Unggah Dokumen Persyaratan</h3>
                    
                    <div class="bg-[#EDFDF3] border-l-4 border-[#24a148] p-4 mb-6 rounded-r-lg">
                        <div class="flex items-start">
                            <svg class="h-5 w-5 text-[#116936] mt-0.5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <div>
                                <h4 class="text-sm font-bold text-[#116936]">Sistem Kompresi Otomatis Aktif</h4>
                                <p class="text-sm text-green-800 mt-1">Anda dapat mengunggah foto resolusi tinggi secara langsung (Maksimal 10MB). Sistem kami akan menyesuaikan ukuran secara otomatis di server.</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Foto KTP <span class="text-red-500">*</span></label>
                            <div class="flex items-center justify-center w-full">
                                <label for="foto_ktp" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6 text-center px-4">
                                        <svg class="w-8 h-8 mb-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                                        <p id="teks_ktp" class="text-xs text-gray-500"><span class="font-semibold text-[#116936]">Klik untuk unggah</span> foto KTP</p>
                                    </div>
                                    <input id="foto_ktp" name="foto_ktp" type="file" accept="image/jpeg, image/png, image/jpg" required class="hidden" />
                                </label>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Foto Kartu Keluarga (KK) <span class="text-red-500">*</span></label>
                            <div class="flex items-center justify-center w-full">
                                <label for="foto_kk" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6 text-center px-4">
                                        <svg class="w-8 h-8 mb-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                                        <p id="teks_kk" class="text-xs text-gray-500"><span class="font-semibold text-[#116936]">Klik untuk unggah</span> foto KK</p>
                                    </div>
                                    <input id="foto_kk" name="foto_kk" type="file" accept="image/jpeg, image/png, image/jpg" required class="hidden" />
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 px-8 py-5 border-t border-gray-100 flex items-center justify-end">
                <button type="submit" class="bg-[#24a148] hover:bg-[#116936] text-white font-bold py-3 px-8 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#24a148]">
                    Kirim Permohonan
                </button>
            </div>
        </form>
        
    </div>
</div>

<script>
    function updateFileName(inputId, textId) {
        const input = document.getElementById(inputId);
        const textDisplay = document.getElementById(textId);
        
        input.addEventListener('change', function() {
            if(this.files && this.files.length > 0) {
                const fileName = this.files[0].name;
                textDisplay.innerHTML = `<span class="text-green-600 font-bold text-sm">✅ Berhasil dipilih:</span> <br> <span class="text-gray-700 font-medium">${fileName}</span>`;
            } else {
                textDisplay.innerHTML = `<span class="font-semibold text-[#116936]">Klik untuk unggah</span> file`;
            }
        });
    }

    updateFileName('foto_ktp', 'teks_ktp');
    updateFileName('foto_kk', 'teks_kk');
</script>
@endsection