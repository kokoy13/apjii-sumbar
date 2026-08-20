@extends('layouts.public')

@section('title', ($currentCategory ? $currentCategory->name . ' — ' : '') . 'Arsip Berita & Warta APJII Sumatera Barat')

@section('content')
<div class="py-12 md:py-16 bg-slate-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header & Search Bar -->
        <div class="max-w-3xl mx-auto text-center space-y-6 mb-12">
            <span class="text-xs font-extrabold text-apjii-blue uppercase tracking-widest">Warta & Informasi Official</span>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                {{ $currentCategory ? 'Kategori: ' . $currentCategory->name : 'Berita & Kegiatan APJII Sumbar' }}
            </h1>
            <p class="text-slate-600 text-base">
                Temukan berita terkini seputar rakerwil, penguatan node interkoneksi regional Padang, regulasi internet, dan berbagai kegiatan anggota APJII Wilayah Sumatera Barat.
            </p>

            <!-- Search Form -->
            <form action="{{ route('posts.index') }}" method="GET" class="relative max-w-xl mx-auto mt-4">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <div class="relative">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul artikel atau topik..." class="w-full pl-5 pr-28 py-3.5 rounded-2xl border border-slate-200 shadow-soft focus:border-apjii-blue focus:ring-apjii-blue text-sm">
                    <button type="submit" class="absolute right-2 top-2 bottom-2 px-5 bg-apjii-blue hover:bg-apjii-navy text-white text-xs font-bold rounded-xl transition">
                        Cari
                    </button>
                </div>
            </form>
        </div>

        <!-- Categories Filter Pills -->
        <div class="flex flex-wrap justify-center items-center gap-2 mb-12">
            <a href="{{ route('posts.index', request()->only('search')) }}" class="px-4 py-2 rounded-full text-xs font-semibold transition {{ !request('category') ? 'bg-apjii-blue text-white shadow-sm' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-100' }}">
                Semua Kategori
            </a>
            @foreach($categories as $category)
                <a href="{{ route('posts.index', array_merge(request()->only('search'), ['category' => $category->slug])) }}" class="px-4 py-2 rounded-full text-xs font-semibold transition {{ request('category') == $category->slug ? 'bg-apjii-blue text-white shadow-sm' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-100' }}">
                    {{ $category->name }} ({{ $category->posts_count }})
                </a>
            @endforeach
        </div>

        <!-- Posts Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($posts as $post)
                <article class="bg-white rounded-2xl overflow-hidden shadow-soft hover:shadow-card transition-all duration-300 border border-slate-100 flex flex-col group">
                    <div class="relative h-48 bg-slate-100 overflow-hidden">
                        @if($post->featured_image_url)
                            <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
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

                        <h2 class="text-lg font-bold text-slate-900 group-hover:text-apjii-blue transition-colors line-clamp-2 leading-snug">
                            <a href="{{ route('posts.show', $post->slug) }}">
                                {{ $post->title }}
                            </a>
                        </h2>

                        <p class="text-slate-600 text-sm mt-3 line-clamp-3 leading-relaxed flex-grow">
                            {{ $post->excerpt }}
                        </p>

                        <div class="pt-5 mt-4 border-t border-slate-100">
                            <a href="{{ route('posts.show', $post->slug) }}" class="inline-flex items-center text-sm font-semibold text-apjii-blue hover:text-apjii-navy transition">
                                Baca Artikel &rarr;
                            </a>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-3 text-center py-16 bg-white rounded-2xl border border-slate-100 p-8">
                    <p class="text-slate-500 font-medium">Tidak ada artikel berita yang ditemukan.</p>
                    @if(request('search') || request('category'))
                        <a href="{{ route('posts.index') }}" class="inline-block mt-4 text-xs font-semibold text-apjii-blue underline">Reset Filter Pencarian</a>
                    @endif
                </div>
            @endforelse
        </div>

        <!-- Pagination Links -->
        <div class="mt-12">
            {{ $posts->links() }}
        </div>

    </div>
</div>
@endsection
