<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manajemen Dokumen Unduhan') }}
            </h2>
            <a href="{{ route('admin.downloads.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                + Tambah Dokumen
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Alert Success -->
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Judul Dokumen</th>
                                    <th scope="col" class="px-6 py-3">Kategori</th>
                                    <th scope="col" class="px-6 py-3">Tipe/Ukuran</th>
                                    <th scope="col" class="px-6 py-3">Tgl Diperbarui</th>
                                    <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($downloads as $download)
                                    <tr class="bg-white border-b hover:bg-gray-50">
                                        <td class="px-6 py-4 font-medium text-gray-900">
                                            {{ $download->title }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $download->category ?? '-' }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="uppercase font-bold">{{ $download->extension }}</span> 
                                            <span class="text-gray-400">({{ $download->size }})</span>
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $download->updated_at->format('d M Y') }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="flex justify-center space-x-3">
                                                <a href="{{ route('admin.downloads.edit', $download->id) }}" class="text-blue-600 hover:text-blue-900 font-medium">Edit</a>
                                                
                                                <form action="{{ route('admin.downloads.destroy', $download->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus dokumen ini? File fisik juga akan terhapus.');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900 font-medium">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                            Belum ada data dokumen. Silakan tambah dokumen baru.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>