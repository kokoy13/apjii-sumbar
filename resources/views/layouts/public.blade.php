<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'APJII Sumatera Barat — Asosiasi Penyelenggara Jasa Internet Indonesia')</title>
    <meta name="description" content="@yield('meta_description', 'Website Resmi APJII Wilayah Sumatera Barat. Informasi Indonesia Internet Exchange (IIX) Padang, kegiatan rakerwil, berita teknologi, dan anggota ISP.')">

    <link rel="shortcut icon" href="/img/logo-apjii.jpg" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">

    <!-- Vite Scripts & CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-slate-800 bg-slate-50 antialiased selection:bg-apjii-blue selection:text-white flex flex-col min-h-screen">

    <!-- Header / Navbar -->
    <header x-data="{ open: false, scrolled: false }" 
            @scroll.window="scrolled = (window.pageYOffset > 20)" 
            :class="scrolled ? 'bg-white/90 backdrop-blur-md shadow-soft border-b border-slate-200/80 py-3' : 'bg-transparent py-5'" 
            class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <!-- Brand Logo -->
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                                        <img src="{{ asset('img/logo-apjii.png') }}" alt="" class="w-20">

                    <div class="flex flex-col">
                        <span class="font-bold text-slate-900 text-lg tracking-tight leading-none">APJII</span>
                        <span class="text-xs font-semibold text-apjii-blue tracking-wider uppercase mt-0.5">Sumatera Barat</span>
                    </div>
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-sm font-medium text-slate-700 hover:text-apjii-accent transition-colors">Beranda</a>
                    <a href="{{ route('tentang-kami') }}" class="text-sm font-medium text-slate-700 hover:text-apjii-accent transition-colors">Tentang Kami</a>
                    <a href="{{ route('kepengurusan') }}" class="text-sm font-medium text-slate-700 hover:text-apjii-accent transition-colors">Kepengurusan</a>
                    <a href="{{ route('keanggotaan') }}" class="text-sm font-medium text-slate-700 hover:text-apjii-accent transition-colors">Anggota</a>
                    <a href="{{ route('posts.index') }}" class="text-sm font-medium text-slate-700 hover:text-apjii-accent transition-colors">Berita & Kegiatan</a>
                    <a href="{{ route('kontak') }}" class="text-sm font-medium text-slate-700 hover:text-apjii-accent transition-colors">Kontak</a>
                    <a href="{{ route('download') }}" class="text-sm font-medium text-slate-700 hover:text-apjii-accent transition-colors">Download</a>
                </nav>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button @click="open = !open" class="p-2 rounded-lg text-slate-600 hover:text-slate-900 hover:bg-slate-100 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': !open}" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div x-show="open" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             class="md:hidden bg-white border-b border-slate-200 px-4 pt-3 pb-6 space-y-3 mt-3 shadow-lg">
            <a @click="open = false" href="{{ route('home') }}" class="block px-3 py-2 text-base font-medium text-slate-700 rounded-lg hover:bg-slate-50">Beranda</a>
            <a @click="open = false" href="{{ route('tentang-kami') }}" class="block px-3 py-2 text-base font-medium text-slate-700 rounded-lg hover:bg-slate-50">Tentang Kami</a>
            <a @click="open = false" href="{{ route('kepengurusan') }}#iix" class="block px-3 py-2 text-base font-medium text-slate-700 rounded-lg hover:bg-slate-50">Kepengurusan</a>
            <a @click="open = false" href="{{ route('keanggotaan') }}#iix" class="block px-3 py-2 text-base font-medium text-slate-700 rounded-lg hover:bg-slate-50">Anggota</a>
            <a @click="open = false" href="{{ route('posts.index') }}" class="block px-3 py-2 text-base font-medium text-slate-700 rounded-lg hover:bg-slate-50">Berita & Kegiatan</a>
            <a @click="open = false" href="{{ route('kontak') }}" class="block px-3 py-2 text-base font-medium text-slate-700 rounded-lg hover:bg-slate-50">Kontak</a>
            <a @click="open = false" href="{{ route('download') }}" class="block px-3 py-2 text-base font-medium text-slate-700 rounded-lg hover:bg-slate-50">Download</a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow pt-20">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-apjii-navy text-slate-300 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <!-- Col 1: About -->
                <div class="md:col-span-2 space-y-4">
                    <div class="flex items-center space-x-3">
                        <img src="/img/logo-apjii.jpg" alt="Logo APJII" class="h-10 w-auto object-contain rounded-lg">
                        <span class="font-bold text-white text-xl tracking-tight">APJII Sumatera Barat</span>
                    </div>
                    <p class="text-sm text-slate-400 max-w-md leading-relaxed">
                        Asosiasi Penyelenggara Jasa Internet Indonesia (APJII) Wilayah Sumatera Barat bertugas menguatkan kedaulatan digital, mengelola Infrastruktur Interkoneksi Internet Padang, dan memberdayakan ISP lokal.
                    </p>
                    <div class="pt-2 flex space-x-4 text-xs font-semibold text-apjii-accent">
                        <span>#InternetJoss</span>
                        <span>#SovereigntyDigital</span>
                        <span>#InterkoneksiPadang</span>
                    </div>
                </div>

                <!-- Col 2: Navigation -->
                <div class="space-y-3">
                    <h4 class="text-white text-sm font-semibold tracking-wider uppercase">Tautan Pintas</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('tentang-kami') }}" class="hover:text-white transition">Tentang kami</a></li>
                        <li><a href="{{ route('kepengurusan') }}" class="hover:text-white transition">Kepengurusan</a></li>
                        <li><a href="{{ route('keanggotaan') }}" class="hover:text-white transition">Anggota</a></li>
                        <li><a href="{{ route('posts.index') }}" class="hover:text-white transition">Warta & Berita</a></li>
                        <li><a href="{{ route('download') }}" class="hover:text-white transition">Download</a></li>
                    </ul>
                </div>

                <!-- Col 3: Contact Info -->
                <div class="space-y-3">
                    <h4 class="text-white text-sm font-semibold tracking-wider uppercase">Sekretariat Wilayah</h4>
                    <p class="text-sm text-slate-400 leading-relaxed">
                        Kota Padang, Sumatera Barat<br>
                        Indonesia
                    </p>
                    <p class="text-sm text-slate-400">
                        Email: <a href="mailto:sumbar@apjii.or.id" class="text-white hover:underline">sumbar@apjii.or.id</a>
                    </p>
                </div>
            </div>

            <div class="mt-12 pt-8 border-t border-slate-800 flex flex-col md:flex-row items-center justify-center text-xs text-slate-500">
                <p>&copy; {{ date('Y') }} APJII Wilayah Sumatera Barat. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
