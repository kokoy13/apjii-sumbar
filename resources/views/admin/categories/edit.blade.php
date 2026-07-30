<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-apjii-navy leading-tight">
                {{ __('Edit Kategori') }}
            </h2>
            <a href="{{ route('admin.categories.index') }}" class="inline-flex items-center px-4 py-2 bg-slate-200 hover:bg-slate-300 text-slate-700 text-sm font-medium rounded-lg transition">
                &larr; Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-card rounded-2xl border border-slate-100 p-6">
                <form action="{{ route('admin.categories.update', $category) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="name" class="block text-sm font-medium text-slate-700 mb-1">Nama Kategori <span class="text-rose-500">*</span></label>
                        <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required class="w-full rounded-lg border-slate-300 shadow-sm focus:border-apjii-blue focus:ring-apjii-blue">
                        @error('name')
                            <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="slug" class="block text-sm font-medium text-slate-700 mb-1">Slug</label>
                        <input type="text" name="slug" id="slug" value="{{ old('slug', $category->slug) }}" class="w-full rounded-lg border-slate-300 shadow-sm focus:border-apjii-blue focus:ring-apjii-blue font-mono text-sm">
                        @error('slug')
                            <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end space-x-3 pt-4 border-t border-slate-100">
                        <a href="{{ route('admin.categories.index') }}" class="px-5 py-2.5 rounded-lg border border-slate-300 text-slate-700 text-sm font-medium hover:bg-slate-50 transition">Batal</a>
                        <button type="submit" class="px-5 py-2.5 rounded-lg bg-apjii-blue hover:bg-apjii-navy text-white text-sm font-semibold shadow-sm transition">Perbarui Kategori</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
