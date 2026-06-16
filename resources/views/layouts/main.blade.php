<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Situs Resmi Desa Penebal - Maju, Mandiri, dan Sejahtera</title>
    <link rel="icon" href="{{ asset('images/logo-bengkalis.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-900">

    <header class="bg-white shadow-sm sticky top-0 z-50" x-data="{ mobileMenuOpen: false }">
        <nav class="max-w-[1920px] mx-auto px-6 lg:px-20 py-3 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center space-x-3">
                <img src="{{ asset('images/logo-bengkalis.png') }}" alt="Logo Desa Penebal" class="h-14 w-auto">
                <div class="flex flex-col">
                    <span class="text-xs text-gray-500">Desa</span>
                    <span class="text-2xl font-extrabold text-[#116936] tracking-tight">Penebal</span>
                </div>
            </a>

            <div class="hidden xl:flex items-center space-x-1">
                <a href="{{ route('home') }}" class="px-4 py-2 text-sm font-semibold rounded-full transition-colors {{ request()->routeIs('home') ? 'text-[#116936] bg-[#EDFDF3]' : 'text-gray-700 hover:text-[#116936] hover:bg-gray-50' }}">Beranda</a>
                
                <div class="relative group">
                    <button class="px-4 py-2 text-sm font-semibold rounded-full inline-flex items-center space-x-1 focus:outline-none transition-colors {{ request()->routeIs('profil.*') ? 'text-[#116936] bg-[#EDFDF3]' : 'text-gray-700 hover:text-[#116936] hover:bg-gray-50' }}">
                        <span>Profil Desa</span>
                        <svg class="h-4 w-4 transform transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="absolute left-0 top-full pt-2 w-48 z-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                        <div class="bg-white rounded-xl shadow-lg py-2 border border-gray-100 overflow-hidden">
                            <a href="{{ route('profil.tentang') }}" class="block px-5 py-2.5 text-sm {{ request()->routeIs('profil.tentang') ? 'text-[#116936] bg-gray-50 font-bold' : 'text-gray-700 hover:bg-gray-50 hover:text-[#116936]' }}">Tentang Desa</a>
                            <a href="{{ route('profil.aparatur') }}" class="block px-5 py-2.5 text-sm {{ request()->routeIs('profil.aparatur') ? 'text-[#116936] bg-gray-50 font-bold' : 'text-gray-700 hover:bg-gray-50 hover:text-[#116936]' }}">Aparatur</a>
                            <a href="{{ route('profil.statistik') }}" class="block px-5 py-2.5 text-sm {{ request()->routeIs('profil.statistik') ? 'text-[#116936] bg-gray-50 font-bold' : 'text-gray-700 hover:bg-gray-50 hover:text-[#116936]' }}">Statistik</a>
                        </div>
                    </div>
                </div>

                <div class="relative group">
                    <button class="px-4 py-2 text-sm font-semibold rounded-full inline-flex items-center space-x-1 focus:outline-none transition-colors {{ request()->routeIs('publikasi.*') ? 'text-[#116936] bg-[#EDFDF3]' : 'text-gray-700 hover:text-[#116936] hover:bg-gray-50' }}">
                        <span>Publikasi</span>
                        <svg class="h-4 w-4 transform transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="absolute left-0 top-full pt-2 w-48 z-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                        <div class="bg-white rounded-xl shadow-lg py-2 border border-gray-100 overflow-hidden">
                            <a href="{{ route('publikasi.berita') }}" class="block px-5 py-2.5 text-sm {{ request()->routeIs('publikasi.berita') ? 'text-[#116936] bg-gray-50 font-bold' : 'text-gray-700 hover:bg-gray-50 hover:text-[#116936]' }}">Berita</a>
                            <a href="{{ route('publikasi.pengumuman') }}" class="block px-5 py-2.5 text-sm {{ request()->routeIs('publikasi.pengumuman') ? 'text-[#116936] bg-gray-50 font-bold' : 'text-gray-700 hover:bg-gray-50 hover:text-[#116936]' }}">Pengumuman</a>
                            <a href="{{ route('publikasi.galeri') }}" class="block px-5 py-2.5 text-sm {{ request()->routeIs('publikasi.galeri') ? 'text-[#116936] bg-gray-50 font-bold' : 'text-gray-700 hover:bg-gray-50 hover:text-[#116936]' }}">Galeri</a>
                        </div>
                    </div>
                </div>

                <div class="relative group">
                    <button class="px-4 py-2 text-sm font-semibold rounded-full inline-flex items-center space-x-1 focus:outline-none transition-colors {{ request()->routeIs('layanan.*') ? 'text-[#116936] bg-[#EDFDF3]' : 'text-gray-700 hover:text-[#116936] hover:bg-gray-50' }}">
                        <span>Layanan</span>
                        <svg class="h-4 w-4 transform transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="absolute left-0 top-full pt-2 w-52 z-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                        <div class="bg-white rounded-xl shadow-lg py-2 border border-gray-100 overflow-hidden">
                            <a href="{{ route('layanan.surat') }}" class="block px-5 py-2.5 text-sm {{ request()->routeIs('layanan.surat') ? 'text-[#116936] bg-gray-50 font-bold' : 'text-gray-700 hover:bg-gray-50 hover:text-[#116936]' }}">Surat Online</a>
                            <a href="{{ route('layanan.pengaduan') }}" class="block px-5 py-2.5 text-sm {{ request()->routeIs('layanan.pengaduan') ? 'text-[#116936] bg-gray-50 font-bold' : 'text-gray-700 hover:bg-gray-50 hover:text-[#116936]' }}">Pengaduan</a>
                            <a href="{{ route('layanan.berkas') }}" class="block px-5 py-2.5 text-sm {{ request()->routeIs('layanan.berkas') ? 'text-[#116936] bg-gray-50 font-bold' : 'text-gray-700 hover:bg-gray-50 hover:text-[#116936]' }}">Pengajuan Berkas</a>
                        </div>
                    </div>
                </div>
                <a href="{{ route('kontak') }}" class="px-4 py-2 text-sm font-semibold rounded-full transition-colors {{ request()->routeIs('kontak') ? 'text-[#116936] bg-[#EDFDF3]' : 'text-gray-700 hover:text-[#116936] hover:bg-gray-50' }}">Kontak</a>
            </div>

            <div class="xl:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="p-2 text-gray-600 hover:text-[#116936] focus:outline-none rounded-md">
                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" style="display: none;"></path>
                    </svg>
                </button>
            </div>
        </nav>

        <div x-show="mobileMenuOpen" x-transition.opacity class="xl:hidden bg-white border-t border-gray-100 shadow-md">
            <div class="px-4 pt-2 pb-6 space-y-1">
                <a href="{{ route('home') }}" class="block px-3 py-2.5 rounded-md text-base font-semibold {{ request()->routeIs('home') ? 'text-[#116936] bg-[#EDFDF3]' : 'text-gray-700 hover:bg-gray-50' }}">Beranda</a>
                
                <div x-data="{ openProfil: {{ request()->routeIs('profil.*') ? 'true' : 'false' }} }">
                    <button @click="openProfil = !openProfil" class="w-full flex items-center justify-between px-3 py-2.5 rounded-md text-base font-semibold focus:outline-none {{ request()->routeIs('profil.*') ? 'text-[#116936] bg-[#EDFDF3]' : 'text-gray-700 hover:bg-gray-50' }}">
                        Profil Desa
                        <svg class="h-5 w-5 transform transition-transform" :class="{'rotate-180': openProfil}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="openProfil" class="pl-6 space-y-1 pb-1 mt-1">
                        <a href="{{ route('profil.tentang') }}" class="block px-3 py-2 text-sm font-medium {{ request()->routeIs('profil.tentang') ? 'text-[#116936]' : 'text-gray-600 hover:text-[#116936]' }}">Tentang Desa</a>
                        <a href="{{ route('profil.aparatur') }}" class="block px-3 py-2 text-sm font-medium {{ request()->routeIs('profil.aparatur') ? 'text-[#116936]' : 'text-gray-600 hover:text-[#116936]' }}">Aparatur</a>
                        <a href="{{ route('profil.statistik') }}" class="block px-3 py-2 text-sm font-medium {{ request()->routeIs('profil.statistik') ? 'text-[#116936]' : 'text-gray-600 hover:text-[#116936]' }}">Statistik</a>
                    </div>
                </div>

                <div x-data="{ openPublikasi: {{ request()->routeIs('publikasi.*') ? 'true' : 'false' }} }">
                    <button @click="openPublikasi = !openPublikasi" class="w-full flex items-center justify-between px-3 py-2.5 rounded-md text-base font-semibold focus:outline-none {{ request()->routeIs('publikasi.*') ? 'text-[#116936] bg-[#EDFDF3]' : 'text-gray-700 hover:bg-gray-50' }}">
                        Publikasi
                        <svg class="h-5 w-5 transform transition-transform" :class="{'rotate-180': openPublikasi}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="openPublikasi" class="pl-6 space-y-1 pb-1 mt-1">
                        <a href="{{ route('publikasi.berita') }}" class="block px-3 py-2 text-sm font-medium {{ request()->routeIs('publikasi.berita') ? 'text-[#116936]' : 'text-gray-600 hover:text-[#116936]' }}">Berita</a>
                        <a href="{{ route('publikasi.pengumuman') }}" class="block px-3 py-2 text-sm font-medium {{ request()->routeIs('publikasi.pengumuman') ? 'text-[#116936]' : 'text-gray-600 hover:text-[#116936]' }}">Pengumuman</a>
                        <a href="{{ route('publikasi.galeri') }}" class="block px-3 py-2 text-sm font-medium {{ request()->routeIs('publikasi.galeri') ? 'text-[#116936]' : 'text-gray-600 hover:text-[#116936]' }}">Galeri</a>
                    </div>
                </div>

                <div x-data="{ openLayanan: {{ request()->routeIs('layanan.*') ? 'true' : 'false' }} }">
                    <button @click="openLayanan = !openLayanan" class="w-full flex items-center justify-between px-3 py-2.5 rounded-md text-base font-semibold focus:outline-none {{ request()->routeIs('layanan.*') ? 'text-[#116936] bg-[#EDFDF3]' : 'text-gray-700 hover:bg-gray-50' }}">
                        Layanan
                        <svg class="h-5 w-5 transform transition-transform" :class="{'rotate-180': openLayanan}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="openLayanan" class="pl-6 space-y-1 pb-1 mt-1">
                        <a href="{{ route('layanan.surat') }}" class="block px-3 py-2 text-sm font-medium {{ request()->routeIs('layanan.surat') ? 'text-[#116936]' : 'text-gray-600 hover:text-[#116936]' }}">Surat Online</a>
                        <a href="{{ route('layanan.pengaduan') }}" class="block px-3 py-2 text-sm font-medium {{ request()->routeIs('layanan.pengaduan') ? 'text-[#116936]' : 'text-gray-600 hover:text-[#116936]' }}">Pengaduan</a>
                        <a href="{{ route('layanan.berkas') }}" class="block px-3 py-2 text-sm font-medium {{ request()->routeIs('layanan.berkas') ? 'text-[#116936]' : 'text-gray-600 hover:text-[#116936]' }}">Pengajuan Berkas</a>
                    </div>
                </div>

                <a href="#" class="block px-3 py-2.5 rounded-md text-base font-semibold text-gray-700 hover:bg-gray-50">UMKM</a>
                <a href="{{ route('kontak') }}" class="block px-3 py-2.5 rounded-md text-base font-semibold {{ request()->routeIs('kontak') ? 'text-[#116936] bg-[#EDFDF3]' : 'text-gray-700 hover:bg-gray-50' }}">Kontak</a>
            </div>
        </div>
    </header>

    <main class="min-h-[50vh]">
        @yield('content')
    </main>

    <footer class="bg-[#116936] text-gray-100 mt-24 py-16 px-6 lg:px-20">
        <div class="max-w-[1920px] mx-auto grid grid-cols-1 md:grid-cols-4 gap-12">
            <div class="col-span-1 md:col-span-2 md:pr-12">
                <div class="flex items-center space-x-3 mb-6">
                    <img src="{{ asset('images/logo-bengkalis.png') }}" alt="Logo Desa Penebal" class="h-16 w-auto">
                    <div class="flex flex-col">
                        <span class="text-sm">Pemerintah Desa</span>
                        <span class="text-3xl font-extrabold tracking-tight">Penebal</span>
                    </div>
                </div>
                <p class="text-gray-200 text-sm leading-relaxed mb-6">
                    Situs resmi Pemerintah Desa Penebal untuk transparansi informasi dan kemudahan layanan administratif bagi seluruh lapisan masyarakat.
                </p>
                <div class="flex items-center space-x-4">
                    <a href="#" class="p-2.5 bg-white/10 hover:bg-white/20 rounded-full transition-colors">FB</a>
                    <a href="#" class="p-2.5 bg-white/10 hover:bg-white/20 rounded-full transition-colors">IG</a>
                    <a href="#" class="p-2.5 bg-white/10 hover:bg-white/20 rounded-full transition-colors">YT</a>
                </div>
            </div>

            <div>
                <h4 class="text-lg font-bold mb-6 text-white">Hubungi Kami</h4>
                <ul class="space-y-4 text-sm text-gray-200">
                    <li class="flex items-start space-x-3">
                        <span>📍</span>
                        <span>Jl. Utama No.1, Kantor Desa Penebal</span>
                    </li>
                    <li class="flex items-center space-x-3">
                        <span>📞</span>
                        <span>(021) 1234-5678</span>
                    </li>
                    <li class="flex items-center space-x-3">
                        <span>📧</span>
                        <span>info@penebal.desa.id</span>
                    </li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-bold mb-6 text-white">Tautan Cepat</h4>
                <ul class="space-y-3.5 text-sm">
                    <li><a href="{{ route('layanan.surat') }}" class="text-gray-200 hover:text-white transition-colors">Ajukan Surat Online</a></li>
                    <li><a href="#" class="text-gray-200 hover:text-white transition-colors">Cek Status Pengaduan</a></li>
                    <li><a href="#" class="text-gray-200 hover:text-white transition-colors">Peta Desa</a></li>
                    <li><a href="#" class="text-gray-200 hover:text-white transition-colors">PPID</a></li>
                </ul>
            </div>
        </div>
        <div class="max-w-[1920px] mx-auto mt-16 pt-8 border-t border-white/20 text-center text-sm text-gray-300">
            &copy; 2026 Pemerintah Desa Penebal. Hak Cipta Dilindungi.
        </div>
    </footer>

</body>
</html>