<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Dokumen Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form method="POST" action="{{ route('admin.downloads.store') }}" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <!-- Judul -->
                        <div>
                            <label for="title" class="block font-medium text-sm text-gray-700">Judul Dokumen <span class="text-red-500">*</span></label>
                            <input type="text" name="title" id="title" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" value="{{ old('title') }}" required autofocus>
                            @error('title')
                                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Kategori -->
                        <div>
                            <label for="category" class="block font-medium text-sm text-gray-700">Kategori (Opsional)</label>
                            <input type="text" name="category" id="category" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" value="{{ old('category') }}" placeholder="Contoh: Keanggotaan, Regulasi, dll">
                            @error('category')
                                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Upload File -->
                        <div>
                            <label for="document" class="block font-medium text-sm text-gray-700">Pilih File (PDF, DOC/X, ZIP, RAR) <span class="text-red-500">*</span></label>
                            <input type="file" name="document" id="document" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" accept=".pdf,.doc,.docx,.zip,.rar" required>
                            <p class="text-xs text-gray-500 mt-1">Maksimal ukuran file: 10MB.</p>
                            @error('document')
                                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-end mt-4 space-x-3">
                            <a href="{{ route('admin.downloads.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                                Batal
                            </a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Simpan Dokumen
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>