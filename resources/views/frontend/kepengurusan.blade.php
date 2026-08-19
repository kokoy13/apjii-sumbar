@extends('layouts.public')

@section('title', 'Susunan Badan Pengurus Wilayah APJII Sumatera Barat Periode 2026-2028')
@section('meta_description', 'Daftar Susunan Badan Pengurus Wilayah Asosiasi Penyelenggara Jasa Internet Indonesia (APJII) Sumatera Barat Periode 2026-2028.')

@section('content')
<div class="py-10 sm:py-16 bg-slate-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
        
        <!-- Header Page Title -->
        <div class="bg-gradient-to-r from-apjii-navy via-slate-900 to-apjii-blue rounded-3xl p-8 sm:p-12 text-white shadow-xl relative overflow-hidden">
            <div class="absolute -right-20 -top-20 w-80 h-80 bg-apjii-accent/20 rounded-full blur-3xl pointer-events-none"></div>

            <div class="max-w-3xl space-y-3 relative z-10">
                <span class="inline-flex items-center space-x-2 px-3.5 py-1 rounded-full bg-white/10 text-white text-xs font-bold tracking-wider uppercase backdrop-blur-md">
                    <span>Struktur Kepengurusan Resmi</span>
                </span>
                
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight leading-tight">
                    Susunan Badan Pengurus Wilayah <br>
                    <span>APJII Sumatera Barat</span>
                </h1>

                <p class="text-sm sm:text-base text-slate-300 font-medium pt-1">
                    Periode Masa Bakti: 2026 – 2028
                </p>
            </div>
        </div>

        <!-- Full-Body List Container -->
        <div class="bg-white rounded-3xl shadow-card border border-slate-100 overflow-hidden">
            <div class="p-6 sm:p-10 space-y-12">
                
                <!-- SECTION 1: KETUA PENGURUS WILAYAH (Gold / Amber Theme) -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-3 pb-3 border-b border-amber-200">
                        <div class="w-3 h-8 bg-amber-500 rounded-full"></div>
                        <h2 class="text-lg sm:text-xl font-extrabold text-slate-900 tracking-tight">
                            1. Pimpinan Wilayah (Ketua)
                        </h2>
                    </div>

                    <!-- Single Item Row for Ketua -->
                    <div class="bg-amber-50/60 hover:bg-amber-50 rounded-2xl p-5 sm:p-6 border border-amber-200/80 transition duration-200 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div class="flex items-center space-x-4 sm:space-x-6">
                            <!-- Avatar Image Container -->
                            <div class="w-24 h-28 sm:w-26 sm:h-30 rounded-2xl overflow-hidden shadow-md border-2 border-amber-400/80 bg-slate-100 shrink-0 relative group">
                                <img class="w-full h-full object-cover object-top transition duration-300 group-hover:scale-105" 
                                     src="{{ $ketua['avatar'] }}" 
                                     alt="{{ $ketua['name'] }}"
                                     loading="lazy">
                            </div>
                            <div class="space-y-1 min-w-0">
                                <div class="flex flex-wrap items-center gap-2">
                                    <span class="px-3 py-0.5 rounded-full text-xs font-extrabold bg-amber-500 text-white shadow-xs tracking-wider uppercase">
                                        {{ $ketua['role'] }}
                                    </span>
                                </div>
                                <h3 class="text-xl sm:text-2xl font-extrabold text-slate-900 leading-snug">
                                    {{ $ketua['name'] }}
                                </h3>
                                <p class="text-xs sm:text-sm font-semibold text-slate-600 flex items-center space-x-1.5">
                                    <svg class="w-4 h-4 text-amber-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5m0 0h4m-4 0V11m0 0h4m-4 0H9m4 0V5" />
                                    </svg>
                                    <span>{{ $ketua['company'] }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SECTION 2: PENGURUS INTI (APJII Blue Theme) -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-3 pb-3 border-b border-apjii-blue/20">
                        <div class="w-3 h-8 bg-apjii-blue rounded-full"></div>
                        <h2 class="text-lg sm:text-xl font-extrabold text-slate-900 tracking-tight">
                            2. Pengurus Inti Wilayah
                        </h2>
                    </div>

                    <div class="divide-y divide-slate-100 rounded-2xl border border-slate-200/80 overflow-hidden bg-slate-50/40">
                        @foreach($pengurusInti as $inti)
                            <div class="p-5 sm:p-6 bg-white hover:bg-slate-50 transition duration-200 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                                <div class="flex items-center space-x-4 sm:space-x-5">
                                    <!-- Avatar Image Container -->
                                    <div class="w-24 h-28 sm:w-26 sm:h-30 rounded-xl overflow-hidden border border-slate-200/80 bg-slate-100 shrink-0 shadow-xs group">
                                        <img class="w-full h-full object-cover object-top transition duration-300 group-hover:scale-105" 
                                             src="{{ $inti['avatar'] }}" 
                                             alt="{{ $inti['name'] }}"
                                             loading="lazy">
                                    </div>
                                    <div class="space-y-1 min-w-0">
                                        <div class="flex flex-wrap items-center gap-2">
                                            <span class="px-2.5 py-0.5 rounded-md text-xs font-bold bg-apjii-subtle text-apjii-blue border border-apjii-blue/20 uppercase tracking-wide">
                                                {{ $inti['role'] }}
                                            </span>
                                        </div>
                                        <h3 class="text-lg font-bold text-slate-900 leading-snug">
                                            {{ $inti['name'] }}
                                        </h3>
                                        <p class="text-xs sm:text-sm font-medium text-slate-500 flex items-center space-x-1.5">
                                            <svg class="w-3.5 h-3.5 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5m0 0h4m-4 0V11m0 0h4m-4 0H9m4 0V5" />
                                            </svg>
                                            <span>{{ $inti['company'] }}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- SECTION 3: KETUA BIDANG (Indigo / Slate Theme) -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-3 pb-3 border-b border-indigo-200">
                        <div class="w-3 h-8 bg-indigo-600 rounded-full"></div>
                        <h2 class="text-lg sm:text-xl font-extrabold text-slate-900 tracking-tight">
                            3. Ketua Bidang & Departemen
                        </h2>
                    </div>

                    <div class="divide-y divide-slate-100 rounded-2xl border border-slate-200/80 overflow-hidden bg-slate-50/40">
                        @foreach($ketuaBidang as $bidang)
                            <div class="p-5 sm:p-6 bg-white hover:bg-slate-50/80 transition duration-200 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                                <div class="flex items-center space-x-4 sm:space-x-5">
                                    <!-- Avatar Image Container -->
                                    <div class="w-24 h-28 sm:w-26 sm:h-30 rounded-xl overflow-hidden border border-slate-200/80 bg-slate-100 shrink-0 shadow-xs group">
                                        <img class="w-full h-full object-cover object-top transition duration-300 group-hover:scale-105" 
                                             src="{{ $bidang['avatar'] }}" 
                                             alt="{{ $bidang['name'] }}"
                                             loading="lazy">
                                    </div>

                                    <div class="space-y-1 min-w-0">
                                        <span class="inline-block px-2.5 py-0.5 rounded-md text-xs font-bold bg-indigo-50 text-indigo-700 border border-indigo-200/60 uppercase tracking-wide">
                                            {{ $bidang['role'] }}
                                        </span>
                                        <h3 class="text-lg font-bold text-slate-900 leading-snug">
                                            {{ $bidang['name'] }}
                                        </h3>
                                        <p class="text-xs sm:text-sm font-medium text-slate-500 flex items-center space-x-1.5">
                                            <svg class="w-3.5 h-3.5 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5m0 0h4m-4 0V11m0 0h4m-4 0H9m4 0V5" />
                                            </svg>
                                            <span>{{ $bidang['company'] }}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection

