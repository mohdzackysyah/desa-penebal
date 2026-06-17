<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight flex items-center">
            <svg class="w-7 h-7 mr-3 text-[#24a148]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"></path>
            </svg>
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">
            
            <div class="bg-gradient-to-r from-[#116936] to-[#24a148] overflow-hidden shadow-lg sm:rounded-2xl text-white relative">
                <div class="absolute top-0 right-0 w-40 h-40 bg-white/10 rounded-full translate-x-10 -translate-y-10 pointer-events-none"></div>
                <div class="absolute bottom-0 right-1/4 w-24 h-24 bg-white/5 rounded-full translate-y-6 pointer-events-none"></div>

                <div class="p-8 md:p-10 relative z-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                    <div>
                        <h3 class="text-2xl md:text-3xl font-extrabold tracking-tight">Selamat Datang di Sistem Desa Penebal</h3>
                        <p class="text-green-100 mt-2 max-w-2xl text-sm md:text-base">
                            Panel kendali admin untuk mengelola pelayanan surat mandiri masyarakat, data kependudukan, dan monitoring administrasi desa secara efisien.
                        </p>
                    </div>
                    <div class="bg-white/20 backdrop-blur-sm px-4 py-2 rounded-xl border border-white/20 text-xs md:text-sm font-bold flex items-center">
                        <span class="w-2.5 h-2.5 bg-emerald-400 rounded-full mr-2 animate-ping"></span>
                        Sistem Berjalan Normal
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-lg font-extrabold text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-[#24a148]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    Statistik Kependudukan <span class="ml-2 text-xs font-bold bg-yellow-100 text-yellow-700 px-2 py-0.5 rounded-md">Data Sementara</span>
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition-shadow">
                        <div class="space-y-1">
                            <p class="text-xs font-bold text-gray-500 uppercase tracking-wider">Total Penduduk</p>
                            <h4 class="text-3xl font-black text-gray-900">1.250</h4>
                            <p class="text-xs text-gray-400 font-medium">Jiwa Keseluruhan</p>
                        </div>
                        <div class="p-3.5 bg-blue-50 text-blue-600 rounded-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition-shadow relative overflow-hidden">
                        <div class="absolute -right-4 -bottom-4 opacity-5">
                            <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/></svg>
                        </div>
                        <div class="space-y-1 relative z-10">
                            <p class="text-xs font-bold text-gray-500 uppercase tracking-wider">Laki-Laki</p>
                            <h4 class="text-3xl font-black text-cyan-600">650</h4>
                            <p class="text-xs text-gray-400 font-medium">52% dari Total</p>
                        </div>
                        <div class="p-3.5 bg-cyan-50 text-cyan-600 rounded-xl relative z-10">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition-shadow relative overflow-hidden">
                        <div class="absolute -right-4 -bottom-4 opacity-5">
                            <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/></svg>
                        </div>
                        <div class="space-y-1 relative z-10">
                            <p class="text-xs font-bold text-gray-500 uppercase tracking-wider">Perempuan</p>
                            <h4 class="text-3xl font-black text-rose-500">600</h4>
                            <p class="text-xs text-gray-400 font-medium">48% dari Total</p>
                        </div>
                        <div class="p-3.5 bg-rose-50 text-rose-500 rounded-xl relative z-10">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition-shadow">
                        <div class="space-y-1">
                            <p class="text-xs font-bold text-gray-500 uppercase tracking-wider">Kepala Keluarga</p>
                            <h4 class="text-3xl font-black text-amber-500">320</h4>
                            <p class="text-xs text-gray-400 font-medium">Keluarga (KK)</p>
                        </div>
                        <div class="p-3.5 bg-amber-50 text-amber-600 rounded-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        </div>
                    </div>

                </div>
            </div>

            <div>
                <h3 class="text-lg font-extrabold text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-[#24a148]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Antrean Pelayanan Surat Domisili
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition-shadow">
                        <div class="space-y-1">
                            <p class="text-xs font-bold text-gray-500 uppercase tracking-wider">Total Masuk</p>
                            <h4 class="text-3xl font-black text-gray-900">120</h4>
                            <p class="text-xs text-gray-400 font-medium">Bulan Ini</p>
                        </div>
                        <div class="p-3.5 bg-gray-100 text-gray-600 rounded-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition-shadow border-l-4 border-l-yellow-400">
                        <div class="space-y-1">
                            <p class="text-xs font-bold text-gray-500 uppercase tracking-wider">Perlu Dicek</p>
                            <h4 class="text-3xl font-black text-yellow-600">5</h4>
                            <p class="text-xs text-yellow-600 font-bold flex items-center animate-pulse">Menunggu admin</p>
                        </div>
                        <div class="p-3.5 bg-yellow-50 text-yellow-600 rounded-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition-shadow border-l-4 border-l-[#24a148]">
                        <div class="space-y-1">
                            <p class="text-xs font-bold text-gray-500 uppercase tracking-wider">Selesai (ACC)</p>
                            <h4 class="text-3xl font-black text-[#24a148]">108</h4>
                            <p class="text-xs text-gray-400 font-medium">Siap / Sudah Dicetak</p>
                        </div>
                        <div class="p-3.5 bg-[#EDFDF3] text-[#24a148] rounded-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition-shadow border-l-4 border-l-red-500">
                        <div class="space-y-1">
                            <p class="text-xs font-bold text-gray-500 uppercase tracking-wider">Ditolak</p>
                            <h4 class="text-3xl font-black text-red-600">7</h4>
                            <p class="text-xs text-gray-400 font-medium">Berkas tidak valid</p>
                        </div>
                        <div class="p-3.5 bg-red-50 text-red-600 rounded-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                    </div>

                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 pt-4">
                
                <div class="lg:col-span-2 bg-white p-6 md:p-8 rounded-2xl shadow-sm border border-gray-100 space-y-6">
                    <div>
                        <h4 class="text-lg font-extrabold text-gray-900">Akses Cepat Perangkat Desa</h4>
                        <p class="text-sm text-gray-500 mt-0.5">Pintasan langsung menuju modul operasional inti.</p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <a href="{{ route('admin.surat.index') }}" class="group flex items-start p-4 border border-gray-200 hover:border-[#24a148] hover:bg-[#EDFDF3]/20 rounded-xl transition-all duration-200">
                            <div class="p-3 bg-[#EDFDF3] text-[#116936] rounded-xl group-hover:bg-[#24a148] group-hover:text-white transition-colors mr-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path></svg>
                            </div>
                            <div class="space-y-0.5">
                                <span class="block font-bold text-gray-900 group-hover:text-[#116936] transition-colors">Tinjau Antrean Surat</span>
                                <span class="block text-xs text-gray-500 line-clamp-2">Periksa berkas pengajuan warga dan lakukan pencetakan PDF.</span>
                            </div>
                        </a>

                        <div class="group flex items-start p-4 border border-gray-150 bg-gray-50 opacity-70 rounded-xl cursor-not-allowed">
                            <div class="p-3 bg-gray-200 text-gray-500 rounded-xl mr-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6m-6 4h10"></path></svg>
                            </div>
                            <div class="space-y-0.5">
                                <span class="block font-bold text-gray-400">Kelola Berita Desa</span>
                                <span class="block text-xs text-gray-400">Modul untuk memublikasikan informasi dan kegiatan desa.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="flex items-center space-x-2 border-b border-gray-100 pb-3">
                            <div class="p-1.5 bg-emerald-50 text-[#24a148] rounded-md">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            </div>
                            <h4 class="font-extrabold text-gray-800 text-sm uppercase tracking-wider">Sistem Keamanan Aktif</h4>
                        </div>
                        
                        <div class="space-y-3 text-xs text-gray-600 leading-relaxed">
                            <div class="flex items-start">
                                <span class="text-[#24a148] font-bold mr-2">✓</span>
                                <p><strong>Secure Document Storage:</strong> Dokumen KTP/KK warga tersimpan di *private folder*.</p>
                            </div>
                            <div class="flex items-start">
                                <span class="text-[#24a148] font-bold mr-2">✓</span>
                                <p><strong>Image Compression:</strong> Optimalisasi ukuran file saat warga mengunggah berkas.</p>
                            </div>
                            <div class="flex items-start">
                                <span class="text-[#24a148] font-bold mr-2">✓</span>
                                <p><strong>URL Protection:</strong> Akses *preview* berkas dilindungi *middleware auth*.</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 pt-4 border-t border-gray-100 text-[11px] text-gray-400 text-center font-medium">
                        Sistem Informasi Pelayanan Desa v1.0
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>