@extends('layouts.main')

@section('content')
<div class="max-w-7xl mx-auto px-6 lg:px-8 py-12">
    <div class="mb-10 text-center">
        <h1 class="text-3xl md:text-4xl font-extrabold text-[#116936] mb-4">Tentang Desa Penebal</h1>
        <div class="w-24 h-1 bg-[#24a148] mx-auto rounded-full"></div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 md:p-12">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            
            <div>
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Sejarah Desa</h2>
                <p class="text-gray-600 leading-relaxed mb-4">
                    Desa Penebal adalah salah satu desa yang terus berkembang dengan menjunjung tinggi nilai-nilai kearifan lokal dan gotong royong. (Anda bisa mengganti teks ini dengan sejarah asli Desa Penebal nantinya).
                </p>
                <p class="text-gray-600 leading-relaxed">
                    Dengan luas wilayah yang membentang luas, mayoritas penduduk kami berprofesi di sektor pertanian dan perikanan, menjadikan desa ini kaya akan potensi sumber daya alam.
                </p>
            </div>

            <div class="bg-[#EDFDF3] p-6 rounded-xl border border-[#24a148]/20">
                <h2 class="text-xl font-bold text-[#116936] mb-4">Visi</h2>
                <p class="text-gray-700 italic mb-6">
                    "Mewujudkan Masyarakat Desa Penebal Yang Maju, Mandiri, dan Sejahtera Berlandaskan Iman dan Taqwa."
                </p>

                <h2 class="text-xl font-bold text-[#116936] mb-4">Misi</h2>
                <ul class="list-decimal list-inside text-gray-700 space-y-2">
                    <li>Meningkatkan tata kelola pemerintahan desa yang transparan.</li>
                    <li>Mengoptimalkan pelayanan publik berbasis digital.</li>
                    <li>Mendorong pertumbuhan ekonomi kerakyatan (UMKM).</li>
                    <li>Meningkatkan pembangunan infrastruktur desa.</li>
                </ul>
            </div>

        </div>
    </div>
</div>
@endsection