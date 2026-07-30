@extends('layouts.public')

@section('title', 'Hubungi Kami — APJII Sumatera Barat')

@section('content')
<!-- Hero Section -->
<section class="relative overflow-hidden pt-12 pb-20 md:pt-20 md:pb-28 bg-gradient-to-b from-slate-50 via-apjii-subtle/30 to-slate-50">
    <div class="absolute -top-40 -right-40 w-96 h-96 bg-apjii-accent/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute top-1/2 -left-40 w-80 h-80 bg-apjii-blue/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl mx-auto text-center space-y-6 ">
            <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-apjii-subtle border border-apjii-blue/20 text-apjii-blue text-xs font-semibold tracking-wide shadow-sm">
                <span>Layanan & Informasi Pusat</span>
            </div>

            <h1 class="text-4xl sm:text-5xl font-extrabold text-slate-900 tracking-tight leading-tight">
                Mari <span class="text-transparent bg-clip-text bg-gradient-to-r from-apjii-blue via-apjii-accent to-indigo-600">Berkoneksi & Berkolaborasi</span> Bersama Kami
            </h1>

            <p class="text-lg text-slate-600 font-normal leading-relaxed">
                Punya pertanyaan seputar keanggotaan ISP, interkoneksi regional Padang, atau peluang kemitraan strategis? Tim pengurus APJII Sumatera Barat siap membantu Anda.
            </p>
        </div>
    </div>
</section>

<!-- Main Contact & Form Section -->
<section class="py-16 md:py-20 bg-white border-y border-slate-100 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Information & Map Side (5 Cols) -->
            <div class="lg:col-span-5 space-y-8">
                <div>
                    <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">Informasi Sekretariat</h2>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed">
                        Silakan kunjungi kantor sekretariat sementara kami atau hubungi melalui saluran komunikasi resmi berikut.
                    </p>
                </div>

                <!-- Contact Detail Cards -->
                <div class="space-y-4">
                    <!-- Alamat -->
                    <div class="p-5 rounded-2xl bg-slate-50/80 border border-slate-100 shadow-soft flex items-start space-x-4">
                        <div class="w-11 h-11 rounded-xl bg-apjii-subtle text-apjii-blue flex items-center justify-center shrink-0 mt-0.5">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div class="space-y-1">
                            <span class="text-xs font-extrabold text-apjii-accent uppercase tracking-wider block">Alamat Sekretariat</span>
                            <p class="text-sm font-semibold text-slate-800 leading-snug">
                                TBA
                            </p>
                        </div>
                    </div>

                    <!-- Email -->
                    <a href="mailto:darmawi.apjiisumbar@gmail.com" class="p-5 rounded-2xl bg-slate-50/80 border border-slate-100 shadow-soft hover:shadow-card transition duration-300 flex items-start space-x-4 group block">
                        <div class="w-11 h-11 rounded-xl bg-apjii-subtle text-apjii-blue flex items-center justify-center shrink-0 mt-0.5 group-hover:bg-apjii-blue group-hover:text-white transition duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div class="space-y-1">
                            <span class="text-xs font-extrabold text-apjii-accent uppercase tracking-wider block">Email Surat & Informasi</span>
                            <p class="text-sm font-bold text-slate-900 group-hover:text-apjii-blue transition">
                                TBA
                            </p>
                        </div>
                    </a>

                    <!-- Telepon / WA -->
                    <!-- <a href="https://wa.me/6281274055771" target="_blank" rel="noopener noreferrer" class="p-5 rounded-2xl bg-slate-50/80 border border-slate-100 shadow-soft hover:shadow-card transition duration-300 flex items-start space-x-4 group block">
                        <div class="w-11 h-11 rounded-xl bg-apjii-subtle text-apjii-blue flex items-center justify-center shrink-0 mt-0.5 group-hover:bg-apjii-blue group-hover:text-white transition duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div class="space-y-1">
                            <span class="text-xs font-extrabold text-apjii-accent uppercase tracking-wider block">Telepon / WhatsApp</span>
                            <p class="text-sm font-bold text-slate-900 group-hover:text-apjii-blue transition">
                                081274055771
                            </p>
                        </div>
                    </a> -->
                </div>

                <!-- Google Maps Embedded Container -->
                <!-- <div class="rounded-3xl overflow-hidden border border-slate-200/80 shadow-card bg-slate-100 h-64 relative">
                    <iframe 
                        title="Lokasi APJII Sumbar"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.288219665313!2d100.35467047588001!3d-0.9339943990569837!2m3!1f0!2f0!3f0!2m3!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b8e219736f1f%3A0x6b4465d3888adcfb!2sGOR%20H.%20Agus%20Salim!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
                        class="w-full h-full border-0" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div> -->
            </div>

            <!-- Form Side (7 Cols) -->
            <div class="lg:col-span-7">
                <div class="bg-white rounded-3xl p-8 sm:p-10 shadow-card border border-slate-200/80 space-y-6 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-apjii-blue via-apjii-accent to-indigo-600"></div>

                    <div>
                        <h3 class="text-2xl font-extrabold text-slate-900 tracking-tight">Kirim Pesan atau Pertanyaan</h3>
                        <p class="text-sm text-slate-600 mt-1">
                            Isi formulir di bawah ini. Tim kami akan merespons pesan Anda sesegera mungkin.
                        </p>
                    </div>

                    @if(session('success'))
                        <div class="p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm font-medium flex items-center space-x-3">
                            <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif

                    <form action="#" method="POST" class="space-y-5">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <!-- Nama Lengkap -->
                            <div class="space-y-2">
                                <label for="name" class="block text-xs font-extrabold text-slate-700 uppercase tracking-wider">Nama Lengkap <span class="text-red-500">*</span></label>
                                <input type="text" id="name" name="name" required placeholder="Contoh: Rian Anggara" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 text-slate-900 text-sm focus:outline-none focus:border-apjii-blue focus:ring-2 focus:ring-apjii-blue/20 transition">
                            </div>

                            <!-- Email -->
                            <div class="space-y-2">
                                <label for="email" class="block text-xs font-extrabold text-slate-700 uppercase tracking-wider">Alamat Email <span class="text-red-500">*</span></label>
                                <input type="email" id="email" name="email" required placeholder="nama@perusahaan.co.id" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 text-slate-900 text-sm focus:outline-none focus:border-apjii-blue focus:ring-2 focus:ring-apjii-blue/20 transition">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <!-- Nama Instansi / Perusahaan -->
                            <div class="space-y-2">
                                <label for="company" class="block text-xs font-extrabold text-slate-700 uppercase tracking-wider">Nama ISP / Perusahaan</label>
                                <input type="text" id="company" name="company" placeholder="PT Media Akses Utama" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 text-slate-900 text-sm focus:outline-none focus:border-apjii-blue focus:ring-2 focus:ring-apjii-blue/20 transition">
                            </div>

                            <!-- Kategori Topik -->
                            <div class="space-y-2">
                                <label for="subject" class="block text-xs font-extrabold text-slate-700 uppercase tracking-wider">Topik Inkuiri <span class="text-red-500">*</span></label>
                                <select id="subject" name="subject" required class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 text-slate-900 text-sm focus:outline-none focus:border-apjii-blue focus:ring-2 focus:ring-apjii-blue/20 transition">
                                    <option value="" disabled selected>Pilih kategori kebutuhan...</option>
                                    <option value="keanggotaan">Pendaftaran Keanggotaan APJII</option>
                                    <option value="iix">Interkoneksi / Peering IIX Padang</option>
                                    <option value="regulasi">Advokasi & Regulasi Telekomunikasi</option>
                                    <option value="event">Sertifikasi & Pelatihan Teknis</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>

                        <!-- Isi Pesan -->
                        <div class="space-y-2">
                            <label for="message" class="block text-xs font-extrabold text-slate-700 uppercase tracking-wider">Isi Pesan <span class="text-red-500">*</span></label>
                            <textarea id="message" name="message" rows="5" required placeholder="Tuliskan detail pertanyaan atau maksud kunjungan Anda di sini..." class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 text-slate-900 text-sm focus:outline-none focus:border-apjii-blue focus:ring-2 focus:ring-apjii-blue/20 transition resize-none"></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="w-full py-4 px-6 rounded-xl bg-apjii-blue hover:from-apjii-navy hover:to-slate-900 text-white font-bold text-sm shadow-md hover:shadow-xl transition duration-300 flex items-center justify-center space-x-2">
                            <span>Kirim Pesan Sekarang</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-16 bg-slate-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        <div class="text-center space-y-2">
            <h2 class="text-xs font-extrabold text-apjii-accent tracking-widest uppercase">Pertanyaan Populer</h2>
            <h3 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Sering Ditanyakan (FAQ)</h3>
        </div>

        <div class="space-y-4">
            <div class="p-6 rounded-2xl bg-white border border-slate-200/80 shadow-soft">
                <h4 class="text-base font-bold text-slate-900">Bagaimana syarat mendaftar menjadi anggota APJII Sumbar?</h4>
                <p class="text-sm text-slate-600 mt-2 leading-relaxed">
                    Perusahaan Anda harus memiliki izin resmi Penyelenggara Jasa Akses Internet (ISP) dari Kemenkominfo RI dan melengkapi dokumen legalitas entitas usaha.
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-white border border-slate-200/80 shadow-soft">
                <h4 class="text-base font-bold text-slate-900">Di mana lokasi fisik Node Interkoneksi Regional Padang?</h4>
                <p class="text-sm text-slate-600 mt-2 leading-relaxed">
                    Node Interkoneksi Padang ditempatkan di fasilitas data center mitra terpercaya yang terhubung langsung ke jaringan interkoneksi APJII Pusat. Silakan hubungi pengurus bidang infrastruktur dan interkoneksi untuk koordinasi teknis <i>cross-connect</i>.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection