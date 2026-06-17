<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login Admin - Desa Penebal</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-900 bg-white">
    <div class="flex min-h-screen">
        
        <div class="hidden lg:flex lg:w-1/2 relative bg-[#116936] overflow-hidden">
            <div class="absolute inset-0">
                <img src="{{ asset('images/background.jpg') }}" alt="Background Desa Penebal" class="object-cover w-full h-full opacity-30" />
                <div class="absolute inset-0 bg-gradient-to-t from-[#0c532a] via-[#116936]/80 to-transparent"></div>
            </div>

            <div class="relative z-10 flex flex-col justify-center px-16 lg:px-24 text-white w-full">
                <div class="mb-8 p-3 bg-white/10 backdrop-blur-md rounded-2xl w-max border border-white/20 shadow-lg">
                    <img src="{{ asset('images/logo-bengkalis.png') }}" alt="Logo Bengkalis" class="w-16 h-auto drop-shadow-md" />
                </div>
                <h1 class="text-4xl xl:text-5xl font-black mb-6 leading-tight">Sistem Informasi<br>Pelayanan Desa Penebal</h1>
                <p class="text-green-100 text-lg max-w-lg leading-relaxed">
                    Panel kendali administratif terpadu untuk mengelola permohonan surat warga, publikasi informasi desa, dan monitoring administrasi secara aman.
                </p>
                
                <div class="mt-12 flex items-center space-x-4">
                    <div class="h-1 w-12 bg-[#24a148] rounded-full"></div>
                    <span class="text-sm font-bold tracking-widest text-green-200 uppercase">Akses Perangkat Desa</span>
                </div>
            </div>
        </div>

        <div class="flex flex-col justify-center w-full lg:w-1/2 px-6 sm:px-12 md:px-24 lg:px-32 bg-gray-50 relative">
            
            <div class="lg:hidden flex flex-col items-center mb-10 mt-8">
                <div class="p-3 bg-white rounded-2xl shadow-sm border border-gray-100 mb-4">
                    <img src="{{ asset('images/logo-bengkalis.png') }}" alt="Logo Bengkalis" class="w-16 h-auto" />
                </div>
                <h1 class="text-2xl font-black text-[#116936] text-center tracking-tight">Desa Penebal</h1>
                <p class="text-sm text-gray-500 font-bold uppercase tracking-widest mt-1">Panel Admin</p>
            </div>

            <div class="w-full max-w-md mx-auto">
                <div class="mb-10 lg:text-left text-center">
                    <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Selamat Datang 👋</h2>
                    <p class="text-gray-500 mt-2 text-sm font-medium">Silakan masuk menggunakan kredensial admin Anda.</p>
                </div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Alamat Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                            </div>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="admin@desapenebal.com" class="block w-full pl-11 pr-4 py-3.5 bg-white border border-gray-200 rounded-xl text-gray-900 focus:ring-4 focus:ring-[#24a148]/20 focus:border-[#24a148] transition-all shadow-sm">
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600 font-bold" />
                    </div>

                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <label for="password" class="block text-sm font-bold text-gray-700">Kata Sandi</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-xs font-bold text-[#24a148] hover:text-[#116936] transition-colors focus:outline-none focus:underline">Lupa sandi?</a>
                            @endif
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                            <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" class="block w-full pl-11 pr-4 py-3.5 bg-white border border-gray-200 rounded-xl text-gray-900 focus:ring-4 focus:ring-[#24a148]/20 focus:border-[#24a148] transition-all shadow-sm">
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600 font-bold" />
                    </div>

                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-[#24a148] shadow-sm focus:ring-[#24a148] w-4 h-4 cursor-pointer" name="remember">
                            <span class="ms-2 text-sm font-medium text-gray-600 group-hover:text-gray-900 transition-colors">Ingat kredensial saya</span>
                        </label>
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="w-full flex justify-center items-center py-3.5 px-4 border border-transparent rounded-xl shadow-md text-sm font-extrabold text-white bg-[#24a148] hover:bg-[#116936] focus:outline-none focus:ring-4 focus:ring-[#24a148]/30 transition-all transform hover:-translate-y-0.5">
                            Masuk ke Panel Kendali
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>
                    </div>
                </form>

                <div class="mt-12 lg:mt-16 text-center lg:text-left">
                    <p class="text-xs text-gray-400 font-medium leading-relaxed">
                        &copy; {{ date('Y') }} Pemerintah Desa Penebal.<br>
                        Sistem Informasi Pengelolaan Pelayanan Publik.
                    </p>
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>