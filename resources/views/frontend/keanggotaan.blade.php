@extends('layouts.public')

@section('title', 'Daftar Anggota — APJII Sumatera Barat')

@section('content')
<!-- Hero Section -->
<section class="relative overflow-hidden pt-12 pb-20 md:pt-20 md:pb-28 bg-gradient-to-b from-slate-50 via-apjii-subtle/30 to-slate-50">
    <div class="absolute -top-40 -right-40 w-96 h-96 bg-apjii-accent/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute top-1/2 -left-40 w-80 h-80 bg-apjii-blue/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl mx-auto text-center space-y-6">
            <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-apjii-subtle border border-apjii-blue/20 text-apjii-blue text-xs font-semibold tracking-wide shadow-sm">
                <span>Penyelenggara Jasa Internet Resmi</span>
            </div>

            <h1 class="text-4xl sm:text-5xl font-extrabold text-slate-900">
                Daftar <span class="text-transparent bg-clip-text bg-apjii-blue">Anggota APJII</span> Wilayah Sumbar
            </h1>

            <p class="text-lg text-slate-600 font-normal leading-relaxed">
                Penyelenggara Jasa Internet (ISP) dan penyedia layanan jaringan terdaftar yang terintegrasi dalam ekosistem APJII Wilayah Sumatera Barat.
            </p>
        </div>
    </div>
</section>

<!-- List Anggota Section -->
<section class="py-16 md:py-20 bg-white border-y border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">

            @php
                // Data dummy anggota APJII Sumbar berdasarkan Perusahaan Pengurus
                $members = $members ?? [
                    [
                        'name' => 'PT Marawa Transmisi Media',
                        'brand' => 'Marawa Media',
                        'logo' => null,
                        'category' => 'Penyelenggara Jasa Internet',
                        'status' => 'Anggota Penuh',
                        'website' => null,
                    ],
                    [
                        'name' => 'PT Carano Tech Solusi',
                        'brand' => 'Carano Tech',
                        'logo' => null,
                        'category' => 'Penyelenggara Jasa Internet',
                        'status' => 'Anggota Penuh',
                        'website' => null,
                    ],
                    [
                        'name' => 'PT Gogiga Media Teknologi',
                        'brand' => 'Gogiga Media',
                        'logo' => null,
                        'category' => 'Penyelenggara Jasa Internet',
                        'status' => 'Anggota Penuh',
                        'website' => null,
                    ],
                    [
                        'name' => 'PT Gnet Biaro Akses',
                        'brand' => 'Gnet Biaro Akses',
                        'logo' => null,
                        'category' => 'Penyelenggara Jasa Internet',
                        'status' => 'Anggota Penuh',
                        'website' => null,
                    ],
                    [
                        'name' => 'PT Irama Media Flashnet',
                        'brand' => 'Irama Flashnet',
                        'logo' => null,
                        'category' => 'Penyelenggara Jasa Internet',
                        'status' => 'Anggota Penuh',
                        'website' => null,
                    ],
                    [
                        'name' => 'PT CinoxMedia Network Indonesia',
                        'brand' => 'CinoxMedia',
                        'logo' => null,
                        'category' => 'Penyelenggara Jasa Internet',
                        'status' => 'Anggota Penuh',
                        'website' => null,
                    ],
                    [
                        'name' => 'PT Skynet Network Bersama',
                        'brand' => 'Skynet Network',
                        'logo' => null,
                        'category' => 'Penyelenggara Jasa Internet',
                        'status' => 'Anggota Penuh',
                        'website' => null,
                    ],
                    [
                        'name' => 'PT Gnet Biaro Data',
                        'brand' => 'Gnet Data Center',
                        'logo' => null,
                        'category' => 'Jaringan & Data Center',
                        'status' => 'Anggota Penuh',
                        'website' => null,
                    ],
                    [
                        'name' => 'PT Media Tekno Nusantara',
                        'brand' => 'Media Tekno Nusantara',
                        'logo' => null,
                        'category' => 'Penyelenggara Jasa Internet',
                        'status' => 'Anggota Penuh',
                        'website' => null,
                    ],
                    [
                        'name' => 'PT Salingka Telekomunikasi Nusantara',
                        'brand' => 'Salingka Telecom',
                        'logo' => null,
                        'category' => 'Penyelenggara Jasa Internet',
                        'status' => 'Anggota Penuh',
                        'website' => null,
                    ],
                ];
            @endphp

        <!-- Header Controls (Total & Search Filter visual) -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-4 border-b border-slate-200">
            <div>
                <h2 class="text-xl font-extrabold text-slate-900">Perusahaan Terdaftar</h2>
                <p class="text-xs text-slate-500 mt-0.5">Daftar ISP dan penyelenggara jaringan aktif di Sumatera Barat.</p>
            </div>
            
            <div class="flex items-center space-x-3">
                <span class="text-xs font-bold text-apjii-blue bg-apjii-subtle px-3.5 py-2 rounded-xl border border-apjii-blue/20">
                    Total: {{ count($members) }} Perusahaan
                </span>
            </div>
        </div>

        <!-- Grid Cards Anggota -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse ($members as $member)
                @php
                    // Ambil inisial nama jika logo tidak tersedia
                    $initials = collect(explode(' ', $member['brand'] ?? $member['name']))
                        ->map(fn($word) => strtoupper(substr($word, 0, 1)))
                        ->take(2)
                        ->implode('');
                @endphp

                <div class="bg-white rounded-3xl border border-slate-200/80 p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between group">
                    <div>
                        <!-- Container Logo -->
                        <div class="w-full h-28 bg-slate-50 rounded-2xl border border-slate-100 flex items-center justify-center p-4 mb-5 group-hover:bg-apjii-subtle/40 transition duration-300">
                            @if (!empty($member['logo']))
                                <img src="{{ asset($member['logo']) }}" alt="Logo {{ $member['name'] }}" class="max-h-full max-w-full object-contain filter grayscale group-hover:grayscale-0 transition duration-300">
                            @else
                                <!-- Fallback jika logo belum ada -->
                                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-apjii-blue to-indigo-600 text-white flex items-center justify-center font-extrabold text-lg shadow-md tracking-wider">
                                    {{ $initials }}
                                </div>
                            @endif
                        </div>

                        <!-- Info Perusahaan -->
                        <div class="space-y-2 text-center sm:text-left">
                            <span class="inline-block px-2.5 py-1 text-[10px] font-bold text-apjii-blue bg-apjii-subtle rounded-md border border-apjii-blue/10">
                                {{ $member['category'] }}
                            </span>
                            
                            <h3 class="text-base font-bold text-slate-900 group-hover:text-apjii-blue transition line-clamp-1" title="{{ $member['brand'] ?? $member['name'] }}">
                                {{ $member['brand'] ?? $member['name'] }}
                            </h3>
                            
                            <p class="text-xs text-slate-500 line-clamp-1 font-medium" title="{{ $member['name'] }}">
                                {{ $member['name'] }}
                            </p>
                        </div>
                    </div>

                    <!-- Footer Card / Link Website -->
                    <div class="pt-6 mt-6 border-t border-slate-100 flex items-center justify-between text-xs">
                        <span class="inline-flex items-center space-x-1 text-emerald-600 font-semibold bg-emerald-50 px-2 py-0.5 rounded">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                            <span>{{ $member['status'] }}</span>
                        </span>

                        @if (!empty($member['website']))
                            <a href="{{ $member['website'] }}" target="_blank" rel="noopener noreferrer" class="text-slate-400 hover:text-apjii-blue font-semibold inline-flex items-center space-x-1 transition">
                                <span>Website</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-span-full p-12 text-center bg-slate-50 rounded-3xl border border-slate-200 text-slate-500">
                    Belum ada data anggota yang ditampilkan.
                </div>
            @endforelse
        </div>

    </div>
</section>
@endsection