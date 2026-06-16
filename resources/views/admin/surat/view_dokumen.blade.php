<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Pratinjau Dokumen') }}
            </h2>
            <button onclick="window.history.back()" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg inline-flex items-center transition-colors shadow-sm text-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Form Verifikasi
            </button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg p-6 flex justify-center border border-gray-300">
                <img src="{{ route('admin.dokumen.show', $filename) }}" alt="Pratinjau Dokumen" class="max-w-full h-auto rounded-lg shadow-xl border border-gray-400">
            </div>
        </div>
    </div>
</x-app-layout>