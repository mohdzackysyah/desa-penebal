<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin - Desa Penebal</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-50 text-gray-900" x-data="{ sidebarOpen: window.innerWidth >= 1024 }">
    <div class="flex h-screen overflow-hidden bg-gray-50">
        
        <div 
            x-show="sidebarOpen" 
            x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-40 bg-gray-900/60 backdrop-blur-sm lg:hidden" 
            @click="sidebarOpen = false"
            style="display: none;"
        ></div>

        <aside 
            class="fixed inset-y-0 left-0 z-50 flex flex-col h-full bg-[#116936] shadow-2xl lg:shadow-none border-r border-green-800 transition-all duration-300 ease-in-out lg:static lg:z-30 overflow-hidden flex-shrink-0"
            :class="sidebarOpen ? 'w-64 translate-x-0' : 'w-64 -translate-x-full lg:w-0 lg:translate-x-0'"
        >
            <div class="w-64 flex flex-col h-full flex-shrink-0">
                
                <div class="flex items-center justify-between h-20 px-6 bg-[#0c532a] border-b border-green-900 flex-shrink-0">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-3">
                        <div class="p-1.5 bg-white rounded-lg shadow-sm">
                            <img src="{{ asset('images/logo-bengkalis.png') }}" class="w-8 h-auto" alt="Logo">
                        </div>
                        <div class="flex flex-col">
                            <span class="text-sm font-black text-white tracking-wider uppercase">Desa Penebal</span>
                            <span class="text-[10px] text-green-200 font-medium tracking-tight">Panel Administrasi</span>
                        </div>
                    </a>
                    <button @click="sidebarOpen = false" class="text-green-100 hover:text-white lg:hidden p-1 rounded-md focus:outline-none focus:ring-2 focus:ring-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l18 18"></path></svg>
                    </button>
                </div>

                <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                    
                    <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 text-sm font-bold rounded-xl transition-all duration-200 group {{ request()->routeIs('dashboard') ? 'bg-[#24a148] text-white shadow-md' : 'text-green-100 hover:bg-white/10 hover:text-white' }}">
                        <svg class="w-5 h-5 mr-3 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"></path></svg>
                        <span>Dashboard Utama</span>
                    </a>

                    <a href="{{ route('admin.surat.index') }}" class="flex items-center px-4 py-3 text-sm font-bold rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.surat.*') ? 'bg-[#24a148] text-white shadow-md' : 'text-green-100 hover:bg-white/10 hover:text-white' }}">
                        <svg class="w-5 h-5 mr-3 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span class="flex-1">Antrean Surat</span>
                        <span class="px-2 py-0.5 text-[10px] bg-yellow-500 text-gray-900 rounded-full font-black group-hover:bg-yellow-400">Cek</span>
                    </a>

                    <div class="pt-4 pb-2 px-4">
                        <span class="text-[10px] font-bold text-green-300 uppercase tracking-widest">Modul Lain</span>
                    </div>

                    <div class="flex items-center px-4 py-3 text-sm font-bold text-green-300/50 cursor-not-allowed rounded-xl">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6m-6 4h10"></path></svg>
                        <span>Kelola Berita</span>
                    </div>
                </nav>

                <div class="p-4 border-t border-green-800 bg-[#0c532a] flex-shrink-0">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3 overflow-hidden">
                            <div class="w-9 h-9 rounded-full bg-green-700 border border-green-500 flex items-center justify-center text-white font-black text-sm uppercase flex-shrink-0 shadow-inner">
                                {{ substr(Auth::user()->name, 0, 2) }}
                            </div>
                            <div class="flex flex-col overflow-hidden">
                                <span class="text-xs font-bold text-white truncate">{{ Auth::user()->name }}</span>
                                <span class="text-[10px] text-green-300">Administrator</span>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('logout') }}" class="flex-shrink-0 ml-2">
                            @csrf
                            <button type="submit" class="p-2 text-green-200 hover:text-white hover:bg-white/10 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-white" title="Keluar Sistem">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </aside>

        <div class="flex flex-col flex-1 min-w-0 overflow-hidden bg-gray-50">
            
            <header class="flex items-center justify-between h-20 px-4 sm:px-6 lg:px-8 bg-white border-b border-gray-200 flex-shrink-0 relative z-20 transition-all duration-300">
                <div class="flex items-center">
                    
                    <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 hover:text-[#24a148] focus:outline-none p-2 -ml-2 mr-3 rounded-lg hover:bg-gray-100 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    
                    @if (isset($header))
                        <div class="flex items-center truncate">
                            {{ $header }}
                        </div>
                    @endif
                </div>

                <div class="hidden md:flex items-center space-x-2 text-xs font-bold text-gray-500 bg-gray-100 px-4 py-2 rounded-xl flex-shrink-0">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span>{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</span>
                </div>
            </header>

            <main class="flex-1 relative overflow-y-auto overflow-x-hidden w-full focus:outline-none p-4 sm:p-0">
                {{ $slot }}
            </main>

        </div>
    </div>
</body>
</html>