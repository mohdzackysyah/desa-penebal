@extends('layouts.main')

@section('content')
    <div class="relative w-full h-[80vh] min-h-[600px] flex items-center justify-center overflow-hidden">
        
         <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/background.jpg') }}" alt="Background Desa Penebal" class="w-full h-full object-cover">
            
            <div class="absolute inset-0 bg-black/70 backdrop-blur-sm"></div>
        </div>

        <div class="relative z-10 max-w-4xl mx-auto px-6 text-center mt-10">
            
            <h1 class="text-4xl md:text-6xl lg:text-[70px] font-bold text-white leading-tight drop-shadow-lg mb-4 tracking-tight">
                Selamat Datang di<br>Desa Penebal
            </h1>
            
            <p class="text-lg md:text-xl text-gray-100 mb-10 drop-shadow-md font-medium">
                Portal resmi pelayanan dan informasi masyarakat Desa Penebal
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('layanan.surat') }}" class="flex items-center justify-center w-full sm:w-auto px-8 py-3.5 bg-[#14532d] text-white font-semibold rounded-md hover:bg-[#166534] transition-colors shadow-lg">
                    Layanan Surat Online
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
                
                <a href="{{ route('profil.tentang') }}" class="flex items-center justify-center w-full sm:w-auto px-10 py-3.5 bg-[#f8fafc] text-[#14532d] font-semibold rounded-md hover:bg-gray-200 transition-colors shadow-lg">
                    Tentang Desa
                </a>
            </div>

        </div>
    </div>
@endsection