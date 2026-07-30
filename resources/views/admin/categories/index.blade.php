<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-apjii-navy leading-tight">
                {{ __('Kelola Kategori Berita') }}
            </h2>
            <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center px-4 py-2 bg-apjii-blue hover:bg-apjii-navy text-white text-sm font-medium rounded-lg shadow-sm transition duration-150 ease-in-out">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Kategori
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

            @if(session('error'))
                <div class="mb-6 p-4 bg-rose-50 border-l-4 border-rose-500 text-rose-800 rounded-r-lg shadow-sm flex justify-between items-center">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-rose-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span>{{ session('error') }}</span>
                    </div>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-card rounded-2xl border border-slate-100">
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-slate-200">
                            <thead>
                                <tr class="bg-slate-50 text-slate-500 text-left text-xs uppercase tracking-wider font-semibold">
                                    <th class="px-6 py-4">No</th>
                                    <th class="px-6 py-4">Nama Kategori</th>
                                    <th class="px-6 py-4">Slug</th>
                                    <th class="px-6 py-4">Jumlah Artikel</th>
                                    <th class="px-6 py-4 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 bg-white">
                                @forelse($categories as $index => $category)
                                    <tr class="hover:bg-slate-50/80 transition duration-150">
                                        <td class="px-6 py-4 text-sm text-slate-500">{{ $categories->firstItem() + $index }}</td>
                                        <td class="px-6 py-4 text-sm font-semibold text-slate-900">{{ $category->name }}</td>
                                        <td class="px-6 py-4 text-sm text-slate-500 font-mono">{{ $category->slug }}</td>
                                        <td class="px-6 py-4 text-sm text-slate-600">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-apjii-subtle text-apjii-blue">
                                                {{ $category->posts_count }} Artikel
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-right space-x-2">
                                            <a href="{{ route('admin.categories.edit', $category) }}" class="inline-flex items-center text-amber-600 hover:text-amber-800 font-medium">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
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
                                        <td colspan="5" class="px-6 py-8 text-center text-slate-500">
                                            Belum ada kategori. Klik tombol "Tambah Kategori" di atas untuk membuat.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
