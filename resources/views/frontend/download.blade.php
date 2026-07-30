@extends('layouts.public')

@section('title', 'Pusat Unduhan — APJII Sumatera Barat')

@section('content')
<!-- Hero Section -->
<section class="relative overflow-hidden pt-12 pb-20 md:pt-20 md:pb-28 bg-gradient-to-b from-slate-50 via-apjii-subtle/30 to-slate-50">
    <div class="absolute -top-40 -right-40 w-96 h-96 bg-apjii-accent/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute top-1/2 -left-40 w-80 h-80 bg-apjii-blue/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl mx-auto text-center space-y-6">
            <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-apjii-subtle border border-apjii-blue/20 text-apjii-blue text-xs font-semibold tracking-wide shadow-sm">
                <span>Dokumen & Berkas Resmi</span>
            </div>

            <h1 class="text-4xl sm:text-5xl font-extrabold text-slate-900 tracking-tight leading-tight">
                Pusat <span class="text-transparent bg-clip-text bg-gradient-to-r from-apjii-blue via-apjii-accent to-indigo-600">Unduhan Dokumen</span> APJII
            </h1>

            <p class="text-lg text-slate-600 font-normal leading-relaxed">
                Akses dan unduh berkas resmi, formulir keanggotaan, regulasi telekomunikasi, serta panduan teknis interkoneksi jaringan Wilayah Sumatera Barat.
            </p>
        </div>
    </div>
</section>

<!-- List Download Section -->
<section class="py-16 md:py-20 bg-white border-y border-slate-100">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        
        <!-- Header List Filter / Status -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-2 border-b border-slate-200">
            <div>
                <h2 class="text-xl font-extrabold text-slate-900">Daftar Dokumen Publik</h2>
                <p class="text-xs text-slate-500 mt-0.5">Pilih dokumen di bawah ini untuk mengunduh langsung berkas resmi.</p>
            </div>
            <span class="text-xs font-bold text-apjii-blue bg-apjii-subtle px-3 py-1.5 rounded-lg border border-apjii-blue/20 self-start sm:self-auto">
                Total Dokumen: {{ $downloads->count() }} File
            </span>
        </div>

        <!-- Main Document List Container -->
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-card divide-y divide-slate-100 overflow-hidden">
            
            @forelse ($downloads as $download)
                @php
                    // Menentukan warna icon berdasarkan ekstensi file
                    $ext = strtoupper($download->extension);
                    if ($ext === 'PDF') {
                        $colorClass = 'bg-red-50 text-red-600 border-red-100';
                    } elseif (in_array($ext, ['DOC', 'DOCX'])) {
                        $colorClass = 'bg-blue-50 text-blue-600 border-blue-100';
                    } elseif (in_array($ext, ['ZIP', 'RAR'])) {
                        $colorClass = 'bg-amber-50 text-amber-600 border-amber-100';
                    } else {
                        $colorClass = 'bg-slate-50 text-slate-600 border-slate-100';
                    }
                @endphp

                <div class="p-5 sm:p-6 hover:bg-slate-50/80 transition duration-200 flex flex-col sm:flex-row sm:items-center justify-between gap-4 group">
                    <div class="flex items-start space-x-4">
                        <!-- Icon File Dinamis -->
                        <div class="w-12 h-12 rounded-2xl {{ $colorClass }} border flex items-center justify-center shrink-0 font-extrabold text-xs tracking-wider">
                            {{ $ext }}
                        </div>
                        
                        <!-- Detail File -->
                        <div class="space-y-1">
                            <h3 class="text-base font-bold text-slate-900 group-hover:text-apjii-blue transition">
                                {{ $download->title }}
                            </h3>
                            <div class="flex flex-wrap items-center gap-2 sm:gap-3 text-xs text-slate-500 font-medium">
                                <span class="text-apjii-accent font-semibold">{{ $download->category }}</span>
                                <span>•</span>
                                <span>{{ $ext }} ({{ $download->size }})</span>
                                <span>•</span>
                                <!-- Asumsi menggunakan fitur Carbon di Laravel untuk format tanggal -->
                                <span>Diperbarui: {{ $download->updated_at->translatedFormat('d M Y') }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Action Link -->
                    <div class="shrink-0 pt-2 sm:pt-0">
                        <!-- Sesuaikan href dengan cara Anda menyimpan/melayani file -->
                        <a href="{{ asset('storage/' . $download->file_path) }}" download class="inline-flex items-center space-x-2 px-4 py-2.5 rounded-xl bg-apjii-subtle hover:bg-apjii-blue text-apjii-blue hover:text-white text-xs font-bold transition duration-300 shadow-sm border border-apjii-blue/20">
                            <span>Unduh File</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        </a>
                    </div>
                </div>
            @empty
                <!-- Tampilan jika belum ada dokumen di database -->
                <div class="p-8 text-center text-slate-500">
                    Belum ada dokumen yang tersedia untuk diunduh saat ini.
                </div>
            @endforelse

        </div>

    </div>
</section>
@endsection