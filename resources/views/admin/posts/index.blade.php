<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-apjii-navy leading-tight">
                {{ __('Kelola Berita & Artikel') }}
            </h2>
            <a href="{{ route('admin.posts.create') }}" class="inline-flex items-center px-4 py-2 bg-apjii-blue hover:bg-apjii-navy text-white text-sm font-medium rounded-lg shadow-sm transition duration-150 ease-in-out">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Buat Artikel Baru
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-6 p-4 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-800 rounded-r-lg shadow-sm flex justify-between items-center">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-card rounded-2xl border border-slate-100">
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-slate-200">
                            <thead>
                                <tr class="bg-slate-50 text-slate-500 text-left text-xs uppercase tracking-wider font-semibold">
                                    <th class="px-6 py-4">Gambar</th>
                                    <th class="px-6 py-4">Judul Artikel</th>
                                    <th class="px-6 py-4">Kategori</th>
                                    <th class="px-6 py-4">Status</th>
                                    <th class="px-6 py-4">Tanggal Publikasi</th>
                                    <th class="px-6 py-4 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 bg-white">
                                @forelse($posts as $post)
                                    <tr class="hover:bg-slate-50/80 transition duration-150">
                                        <td class="px-6 py-4 text-sm">
                                            @if($post->featured_image_url)
                                                <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" class="w-16 h-12 object-cover rounded-lg shadow-sm border border-slate-200">
                                            @else
                                                <div class="w-16 h-12 bg-slate-100 border border-slate-200 rounded-lg flex items-center justify-center text-xs text-slate-400 font-medium">No Image</div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-sm font-semibold text-slate-900 max-w-md">
                                            <div class="line-clamp-2">{{ $post->title }}</div>
                                            <div class="text-xs text-slate-400 font-mono mt-0.5">{{ $post->slug }}</div>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-slate-600">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-700">
                                                {{ $post->category?->name ?? 'Tanpa Kategori' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm">
                                            @if($post->status === 'published')
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">
                                                    Diterbitkan
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800">
                                                    Draft
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-sm text-slate-500 whitespace-nowrap">
                                            {{ $post->published_at ? $post->published_at->format('d M Y, H:i') : '-' }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-right space-x-2 whitespace-nowrap">
                                            <a href="{{ route('admin.posts.edit', $post) }}" class="inline-flex items-center text-amber-600 hover:text-amber-800 font-medium">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-rose-600 hover:text-rose-800 font-medium ml-2">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-8 text-center text-slate-500">
                                            Belum ada artikel berita. Klik tombol "Buat Artikel Baru" di atas.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
