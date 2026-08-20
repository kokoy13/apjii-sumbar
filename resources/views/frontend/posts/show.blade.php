@extends('layouts.public')

@section('title', $post->title . ' — APJII Sumatera Barat')
@section('meta_description', Str::limit(strip_tags($post->excerpt ?? $post->body), 150))

@section('content')
<article class="py-12 md:py-16 bg-slate-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumb & Back button -->
        <div class="mb-8 flex items-center justify-between">
            <a href="{{ route('posts.index') }}" class="inline-flex items-center text-xs font-semibold text-slate-500 hover:text-apjii-blue transition">
                &larr; Kembali ke Berita & Kegiatan
            </a>
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-apjii-subtle text-apjii-blue">
                {{ $post->category?->name ?? 'Warta' }}
            </span>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Main Post Body (8 cols) -->
            <div class="lg:col-span-8 bg-white rounded-3xl p-6 sm:p-10 shadow-card border border-slate-100 space-y-8">
                
                <!-- Article Header -->
                <div class="space-y-4 border-b border-slate-100 pb-6">
                    <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight leading-snug">
                        {{ $post->title }}
                    </h1>

                    <div class="flex items-center space-x-4 text-xs text-slate-500 font-medium">
                        <div class="flex items-center space-x-1.5">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            <span>Humas APJII Sumbar</span>
                        </div>
                        <span>&bull;</span>
                        <div class="flex items-center space-x-1.5">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span>{{ $post->published_at ? $post->published_at->format('d MMMM Y') : $post->created_at->format('d MMMM Y') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Featured Image -->
                @if($post->featured_image_url)
                    <div class="rounded-2xl overflow-hidden shadow-md border border-slate-200">
                        <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" class="w-full max-h-[480px] object-cover">
                    </div>
                @endif

                <!-- Excerpt Highlight Box (if available) -->
                @if($post->excerpt)
                    <div class="p-5 rounded-2xl bg-apjii-subtle/50 border-l-4 border-apjii-blue text-slate-700 italic text-base leading-relaxed">
                        {{ $post->excerpt }}
                    </div>
                @endif

                <!-- Article Body HTML from TinyMCE -->
                <div class="prose max-w-none text-slate-800 text-base leading-relaxed space-y-4">
                    {!! $post->body !!}
                </div>

                <!-- Footer Sharing -->
                <div class="pt-8 border-t border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <span class="text-xs font-semibold text-slate-400">Bagikan artikel ini ke rekan Anda</span>
                    <div class="flex space-x-2">
                        <a href="https://api.whatsapp.com/send?text={{ urlencode($post->title . ' ' . url()->current()) }}" target="_blank" class="px-4 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold transition">
                            WhatsApp
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="px-4 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold transition">
                            Facebook
                        </a>
                    </div>
                </div>
            </div>

            <!-- Sidebar Related Posts (4 cols) -->
            <div class="lg:col-span-4 space-y-8">
                <div class="bg-white rounded-3xl p-6 shadow-card border border-slate-100 space-y-6">
                    <h3 class="font-extrabold text-slate-900 text-lg border-b border-slate-100 pb-3">Berita Terkait</h3>

                    <div class="space-y-6">
                        @forelse($relatedPosts as $related)
                            <div class="group space-y-2">
                                <span class="text-[11px] font-semibold text-apjii-blue uppercase tracking-wider">
                                    {{ $related->category?->name }}
                                </span>
                                <h4 class="font-bold text-slate-900 group-hover:text-apjii-blue transition text-sm leading-snug line-clamp-2">
                                    <a href="{{ route('posts.show', $related->slug) }}">
                                        {{ $related->title }}
                                    </a>
                                </h4>
                                <p class="text-xs text-slate-400">
                                    {{ $related->published_at ? $related->published_at->format('d M Y') : $related->created_at->format('d M Y') }}
                                </p>
                            </div>
                        @empty
                            <p class="text-xs text-slate-500">Belum ada berita terkait lainnya.</p>
                        @endforelse
                    </div>

                    <div class="pt-4 border-t border-slate-100">
                        <a href="{{ route('posts.index') }}" class="block text-center py-2.5 px-4 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold transition">
                            Lihat Semua Berita APJII &rarr;
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</article>
@endsection
