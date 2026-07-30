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

                    <!-- Single Full-width Item Row for Ketua -->
                    <div class="bg-amber-50/60 hover:bg-amber-50 rounded-2xl p-5 sm:p-6 border border-amber-200/80 transition duration-200 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div class="flex items-center space-x-4 sm:space-x-5">
                            <!-- Color Badge Avatar -->
                            <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-amber-500 to-amber-600 text-white flex items-center justify-center font-extrabold text-2xl shadow-md shadow-amber-500/20 shrink-0">
                                {{ substr($ketua['name'], 0, 1) }}
                            </div>
                            <div>
                                <div class="flex flex-wrap items-center gap-2 mb-1">
                                    <span class="px-3 py-0.5 rounded-full text-xs font-extrabold bg-amber-500 text-white shadow-xs tracking-wider uppercase">
                                        {{ $ketua['role'] }}
                                    </span>
                                </div>
                                <h3 class="text-xl font-extrabold text-slate-900">
                                    {{ $ketua['name'] }}
                                </h3>
                                <p class="text-xs sm:text-sm font-semibold text-slate-600">
                                    {{ $ketua['company'] }}
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
                                    <!-- Color Badge Avatar -->
                                    <div class="w-12 h-12 rounded-xl bg-gradient-to-tr from-apjii-navy to-apjii-blue text-white flex items-center justify-center font-extrabold text-xl shadow-sm shrink-0">
                                        {{ substr($inti['name'], 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="flex flex-wrap items-center gap-2 mb-1">
                                            <span class="px-2.5 py-0.5 rounded-md text-xs font-bold bg-apjii-subtle text-apjii-blue border border-apjii-blue/20 uppercase tracking-wide">
                                                {{ $inti['role'] }}
                                            </span>
                                        </div>
                                        <h3 class="text-lg font-bold text-slate-900">
                                            {{ $inti['name'] }}
                                        </h3>
                                        <p class="text-xs sm:text-sm font-medium text-slate-500">
                                            {{ $inti['company'] }}
                                        </p>
                                    </div>
                                </div>

                                <div class="shrink-0">
                                    <span class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-semibold bg-slate-100 text-slate-600">
                                        Pengurus Inti
                                    </span>
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
                                <div class="flex items-start sm:items-center space-x-4 sm:space-x-5">
                                    <!-- Numbering & Avatar Badge -->
                                    <div class="w-11 h-11 rounded-xl bg-indigo-50 text-indigo-700 font-extrabold text-sm flex items-center justify-center border border-indigo-100 shrink-0">
                                        {{ sprintf('%02d', $loop->iteration) }}
                                    </div>

                                    <div class="space-y-1">
                                        <span class="inline-block px-2.5 py-0.5 rounded-md text-xs font-bold bg-indigo-50 text-indigo-700 border border-indigo-200/60 uppercase tracking-wide">
                                            {{ $bidang['role'] }}
                                        </span>
                                        <h3 class="text-lg font-bold text-slate-900">
                                            {{ $bidang['name'] }}
                                        </h3>
                                        <p class="text-xs sm:text-sm font-medium text-slate-500">
                                            {{ $bidang['company'] }}
                                        </p>
                                    </div>
                                </div>

                                <div class="shrink-0 sm:text-right">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-slate-100 text-slate-600">
                                        Ketua Bidang #{{ $loop->iteration }}
                                    </span>
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
