@extends('layouts.public')

@section('title', 'APJII Sumatera Barat — Menguatkan Kedaulatan Digital Minangkabau')

@section('content')
<!-- Hero Section -->
<section id="home" class="relative overflow-hidden pt-12 pb-24 md:pt-20 md:pb-32 bg-gradient-to-b from-slate-50 via-apjii-subtle/30 to-slate-50">
    <div class="absolute -top-40 -right-40 w-96 h-96 bg-apjii-accent/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute top-1/2 -left-40 w-80 h-80 bg-apjii-blue/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left Headline (7 cols) -->
            <div class="lg:col-span-7 space-y-8">
                <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-apjii-subtle border border-apjii-blue/20 text-apjii-blue text-xs font-semibold tracking-wide shadow-sm">
                    <span>Asosiasi Penyelenggara Jasa Internet Indonesia — Wilayah Sumbar</span>
                </div>

                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 tracking-tight leading-[1.15]">
                    Menghubungkan Sumatera Barat dengan Ekosistem Digital Berdaulat
                </h1>

                <p class="text-lg sm:text-xl text-slate-600 font-normal leading-relaxed max-w-2xl">
                    APJII Wilayah Sumatera Barat berkomitmen memperkuat kolaborasi antar-operator, memperluas penetrasi internet merata, dan memberdayakan ISP lokal.
                </p>

                <div class="flex flex-wrap gap-4 pt-2">
                    <a href="{{ route('posts.index') }}" class="px-7 py-4 rounded-xl bg-apjii-accent hover:from-apjii-navy hover:to-apjii-blue text-white font-semibold text-base shadow-lg shadow-apjii-blue/25 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5">
                        Baca Berita & Kegiatan
                    </a>
                    <a href="{{route('kepengurusan')}}" class="px-7 py-4 rounded-xl bg-white hover:bg-slate-100 text-slate-800 border border-slate-200/90 font-semibold text-base shadow-soft transition-all duration-300">
                        Kepengurusan
                    </a>
                </div>
            </div>

            <!-- Right Interactive Stat / Decorative Graphic (5 cols) -->
            <div class="lg:col-span-5 relative">
                <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 shadow-card border border-slate-200/80 relative z-10 space-y-6">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                        <div>
                            <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Wilayah Sumatera Barat</span>
                            <h3 class="text-xl font-bold text-apjii-navy mt-0.5">Ekosistem Internet Daerah</h3>
                        </div>
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                            Aktif & Terintegrasi
                        </span>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                            <span class="text-3xl font-extrabold text-apjii-blue">50+</span>
                            <span class="block text-xs font-medium text-slate-500 mt-1">Penyedia Jasa Internet (ISP)</span>
                        </div>
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                            <span class="text-3xl font-extrabold text-apjii-navy">19</span>
                            <span class="block text-xs font-medium text-slate-500 mt-1">Kabupaten & Kota Terjangkau</span>
                        </div>
                    </div>

                    <div class="p-4 rounded-2xl bg-gradient-to-r from-apjii-navy to-apjii-blue text-white space-y-2">
                        <div class="flex justify-between items-center text-xs text-slate-200">
                            <span>Target Pemerataan Akses</span>
                            <span class="font-bold text-emerald-400">Berkelanjutan</span>
                        </div>
                        <div class="w-full bg-white/20 rounded-full h-2">
                            <div class="bg-emerald-400 h-2 rounded-full" style="width: 85%"></div>
                        </div>
                        <p class="text-[11px] text-slate-300 pt-1">Mendorong sinergi antar-operator, advokasi kebijakan, dan peningkatan kapasitas SDM digital.</p>
                    </div>
                </div>

                <!-- Decorative Background Card -->
                <div class="absolute -bottom-6 -right-6 w-full h-full bg-gradient-to-tr from-apjii-blue/20 to-apjii-accent/20 rounded-3xl -z-0 transform rotate-3"></div>
            </div>

        </div>
    </div>
</section>

<!-- About Section -->
<section id="tentang" class="py-20 bg-white border-y border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto text-center space-y-4 mb-16">
            <h2 class="text-xs font-extrabold text-apjii-accent tracking-widest uppercase">Profil Organisasi</h2>
            <h3 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">Peran APJII di Sumatera Barat</h3>
            <p class="text-slate-600 text-base leading-relaxed">
                APJII Wilayah Sumatera Barat berkomitmen memperkuat kolaborasi antar-operator, mendorong penetrasi internet merata, dan memberdayakan ISP lokal.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Card 01 (Diperbarui) -->
            <div class="p-8 rounded-2xl bg-slate-50/80 border border-slate-100 shadow-soft hover:shadow-card transition duration-300 space-y-4">
                <div class="w-12 h-12 rounded-xl bg-apjii-subtle text-apjii-blue flex items-center justify-center font-bold text-xl">
                    01
                </div>
                <h4 class="text-xl font-bold text-slate-900">Sinergi & Ekosistem Digital</h4>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Mendorong kolaborasi antar-operator ISP lokal untuk memperluas jangkauan dan pemerataan akses internet berkualitas hingga ke seluruh pelosok daerah.
                </p>
            </div>

            <!-- Card 02 -->
            <div class="p-8 rounded-2xl bg-slate-50/80 border border-slate-100 shadow-soft hover:shadow-card transition duration-300 space-y-4">
                <div class="w-12 h-12 rounded-xl bg-apjii-subtle text-apjii-blue flex items-center justify-center font-bold text-xl">
                    02
                </div>
                <h4 class="text-xl font-bold text-slate-900">Advokasi & Regulasi</h4>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Menjadi jembatan komunikasi antara para anggota ISP dengan pemerintah daerah, Kominfo, dan pemangku kebijakan regulasi telekomunikasi.
                </p>
            </div>

            <!-- Card 03 -->
            <div class="p-8 rounded-2xl bg-slate-50/80 border border-slate-100 shadow-soft hover:shadow-card transition duration-300 space-y-4">
                <div class="w-12 h-12 rounded-xl bg-apjii-subtle text-apjii-blue flex items-center justify-center font-bold text-xl">
                    03
                </div>
                <h4 class="text-xl font-bold text-slate-900">Pemberdayaan Anggota</h4>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Penyelenggaraan pelatihan teknologi jaringan, cybersecurity, BGP routing, dan workshop peningkatan kualitas SDM lokal.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Latest News Section -->
<section id="berita" class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16">
            <div>
                <span class="text-xs font-extrabold text-apjii-accent tracking-widest uppercase">Kabar Terbaru</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight mt-1">Berita & Kegiatan APJII Sumbar</h2>
            </div>
            <a href="{{ route('posts.index') }}" class="mt-4 md:mt-0 inline-flex items-center text-sm font-semibold text-apjii-blue hover:text-apjii-navy transition group">
                Lihat Semua Artikel 
                <svg class="w-4 h-4 ml-1.5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($latestPosts as $post)
                <article class="bg-white rounded-2xl overflow-hidden shadow-soft hover:shadow-card transition-all duration-300 border border-slate-100 flex flex-col group">
                    <div class="relative h-48 bg-slate-100 overflow-hidden">
                        @if($post->featured_image)
                            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full bg-gradient-to-tr from-slate-200 to-slate-100 flex items-center justify-center text-slate-400 text-sm font-medium">
                                APJII Sumbar
                            </div>
                        @endif
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-white/90 backdrop-blur-md text-apjii-blue shadow-sm">
                                {{ $post->category?->name ?? 'Warta' }}
                            </span>
                        </div>
                    </div>

                    <div class="p-6 flex flex-col flex-grow">
                        <div class="text-xs text-slate-400 mb-2 font-medium">
                            {{ $post->published_at ? $post->published_at->format('d M Y') : $post->created_at->format('d M Y') }}
                        </div>

                        <h3 class="text-lg font-bold text-slate-900 group-hover:text-apjii-blue transition-colors line-clamp-2 leading-snug">
                            <a href="{{ route('posts.show', $post->slug) }}">
                                {{ $post->title }}
                            </a>
                        </h3>

                        <p class="text-slate-600 text-sm mt-3 line-clamp-3 leading-relaxed flex-grow">
                            {{ $post->excerpt }}
                        </p>

                        <div class="pt-5 mt-4 border-t border-slate-100">
                            <a href="{{ route('posts.show', $post->slug) }}" class="inline-flex items-center text-sm font-semibold text-apjii-blue hover:text-apjii-navy transition">
                                Selengkapnya &rarr;
                            </a>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-3 text-center py-12 text-slate-500">
                    Belum ada berita yang diterbitkan.
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="kontak" class="py-20 bg-white border-t border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-r from-apjii-accent to-apjii-blue rounded-3xl p-8 md:p-14 text-white shadow-2xl relative overflow-hidden">
            <div class="max-w-2xl space-y-6 relative z-10">
                <span class="px-3 py-1 rounded-full bg-white/20 text-xs font-semibold uppercase tracking-wider">Kontak & Keanggotaan</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Ingin Bergabung atau Berkolaborasi Bersama Kami?</h2>
                <p class="text-slate-100 text-base leading-relaxed">
                    Hubungi Pengurus Wilayah APJII Sumatera Barat untuk informasi keanggotaan ISP, program kemitraan strategis, atau koordinasi kegiatan organisasi.
                </p>
                <div class="pt-2 flex flex-wrap gap-4">
                    <a href="mailto:sumbar@apjii.or.id" class="px-6 py-3.5 rounded-xl bg-white text-apjii-navy hover:bg-slate-100 font-bold text-sm shadow-md transition">
                        Kirim Email: sumbar@apjii.or.id
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
