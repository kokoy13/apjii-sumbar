@extends('layouts.public')

@section('title', 'Tentang Kami — APJII Sumatera Barat')

@section('content')
<!-- Hero Section -->
<section class="relative overflow-hidden pt-12 pb-20 md:pt-20 md:pb-28 bg-gradient-to-b from-slate-50 via-apjii-subtle/30 to-slate-50">
    <div class="absolute -top-40 -right-40 w-96 h-96 bg-apjii-accent/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute top-1/2 -left-40 w-80 h-80 bg-apjii-blue/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-7 space-y-6">
                <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-apjii-subtle border border-apjii-blue/20 text-apjii-blue text-xs font-semibold tracking-wide shadow-sm">
                    <span>Profil Organisasi APJII Sumbar</span>
                </div>

                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 tracking-tight leading-[1.15]">
                    Mewujudkan <span class="text-transparent bg-clip-text bg-gradient-to-r from-apjii-blue via-apjii-accent to-indigo-600">Ekosistem Internet</span> Mandiri dan Berdaya Saing
                </h1>

                <p class="text-lg sm:text-xl text-slate-600 font-normal leading-relaxed">
                    APJII Wilayah Sumatera Barat bertindak sebagai pilar pemersatu seluruh Penyedia Jasa Internet (ISP) untuk memastikan pemerataan jaringan, efisiensi lalu lintas data, dan perlindungan hukum bagi para pelaku industri digital.
                </p>
            </div>

            <!-- Stats Card -->
            <div class="lg:col-span-5 relative">
                <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 shadow-card border border-slate-200/80 relative z-10 space-y-6">
                    <h3 class="text-xl font-bold text-apjii-navy border-b border-slate-100 pb-4">Cakupan & Dampak Regional</h3>
                    
                    <div class="space-y-4">

                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100 flex items-center justify-between">
                            <div>
                                <span class="text-2xl font-extrabold text-apjii-navy">Multi-ISP</span>
                                <span class="block text-xs font-medium text-slate-500">Sinergi Perusahaan Jasa Internet</span>
                            </div>
                            <span class="text-xs font-bold text-slate-400">Sumatera Barat</span>
                        </div>
                    </div>
                </div>

                <div class="absolute -bottom-6 -right-6 w-full h-full bg-gradient-to-tr from-apjii-blue/20 to-apjii-accent/20 rounded-3xl -z-0 transform rotate-3"></div>
            </div>

        </div>
    </div>
</section>

<!-- Mission & Role Section -->
<section class="py-20 bg-white border-y border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        <div class="max-w-3xl mx-auto text-center space-y-4">
            <h2 class="text-xs font-extrabold text-apjii-accent tracking-widest uppercase">Pilar Utama</h2>
            <h3 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">Misi APJII di Sumatera Barat</h3>
            <p class="text-slate-600 text-base leading-relaxed">
                Tiga fokus strategis yang dijalankan pengurus untuk memperkuat industri telekomunikasi daerah.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="p-8 rounded-2xl bg-slate-50/80 border border-slate-100 shadow-soft hover:shadow-card transition duration-300 space-y-4">
                <div class="w-12 h-12 rounded-xl bg-apjii-subtle text-apjii-blue flex items-center justify-center font-bold text-xl">
                    01
                </div>
                <h4 class="text-xl font-bold text-slate-900">Survei & Validasi Data</h4>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Menyediakan data survei berkala mengenai penetrasi internet dan tren perilaku pengguna digital di Sumbar sebagai acuan ilmiah bagi pengambilan kebijakan daerah dan pelaku industri.
                </p>
            </div>

            <div class="p-8 rounded-2xl bg-slate-50/80 border border-slate-100 shadow-soft hover:shadow-card transition duration-300 space-y-4">
                <div class="w-12 h-12 rounded-xl bg-apjii-subtle text-apjii-blue flex items-center justify-center font-bold text-xl">
                    02
                </div>
                <h4 class="text-xl font-bold text-slate-900">Advokasi Kebijakan & Sinergi</h4>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Menjadi wadah resmi dalam berdialog dengan pemerintah daerah, Kominfo, dan regulator untuk menciptakan kebijakan investasi internet yang sehat.
                </p>
            </div>

            <div class="p-8 rounded-2xl bg-slate-50/80 border border-slate-100 shadow-soft hover:shadow-card transition duration-300 space-y-4">
                <div class="w-12 h-12 rounded-xl bg-apjii-subtle text-apjii-blue flex items-center justify-center font-bold text-xl">
                    03
                </div>
                <h4 class="text-xl font-bold text-slate-900">Edukasi & Kapasitas SDM</h4>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Mengadakan pelatihan berkala mengenai BGP routing, RPKI security, IPv6 deployment, serta sertifikasi teknisi jaringan bagi anggota lokal.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Banner -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-r from-apjii-navy to-apjii-blue rounded-3xl p-8 md:p-14 text-white shadow-2xl flex flex-col md:flex-row items-center justify-between gap-8 relative overflow-hidden">
            <div class="max-w-2xl space-y-4 relative z-10">
                <span class="px-3 py-1 rounded-full bg-white/10 text-xs font-semibold uppercase tracking-wider">Sinergi Industri</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Ingin Mengetahui Jajaran Pengurus Wilayah?</h2>
                <p class="text-slate-200 text-base leading-relaxed">
                    Lihat daftar lengkap penanggung jawab bidang dan perwakilan ISP anggota APJII Sumatera Barat.
                </p>
            </div>
            <a href="{{ route('kepengurusan') }}" class="px-7 py-4 rounded-xl bg-white text-apjii-navy hover:bg-slate-100 font-bold text-sm shadow-md transition whitespace-nowrap relative z-10 shrink-0">
                Lihat Struktur Kepengurusan
            </a>
        </div>
    </div>
</section>
@endsection