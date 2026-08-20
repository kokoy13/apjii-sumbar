<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-apjii-navy leading-tight">
                {{ __('Edit Artikel Berita') }}
            </h2>
            <a href="{{ route('admin.posts.index') }}" class="inline-flex items-center px-4 py-2 bg-slate-200 hover:bg-slate-300 text-slate-700 text-sm font-medium rounded-lg transition">
                &larr; Kembali
            </a>
        </div>
    </x-slot>

    <!-- TinyMCE Rich Text Editor CDN -->
    <script src="https://cdn.jsdelivr.net/npm/tinymce@6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            tinymce.init({
                selector: '#body-editor',
                height: 420,
                menubar: false,
                plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code help wordcount',
                toolbar: 'undo redo | blocks | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | link table | code preview',
                images_upload_url: '{{ route("admin.posts.upload-image") }}',
                automatic_uploads: true,
                images_upload_handler: function (blobInfo, progress) {
                    return new Promise(function (resolve, reject) {
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', '{{ route("admin.posts.upload-image") }}');
                        xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                        xhr.onload = function () {
                            if (xhr.status < 200 || xhr.status >= 300) {
                                reject('HTTP Error: ' + xhr.status);
                                return;
                            }
                            var json = JSON.parse(xhr.responseText);
                            if (!json || typeof json.location !== 'string') {
                                reject('Invalid JSON: ' + xhr.responseText);
                                return;
                            }
                            resolve(json.location);
                        };
                        xhr.onerror = function () {
                            reject('Image upload failed due to a XHR Transport error.');
                        };
                        var formData = new FormData();
                        formData.append('file', blobInfo.blob(), blobInfo.filename());
                        xhr.send(formData);
                    });
                },
                content_style: 'body { font-family: "Plus Jakarta Sans", sans-serif; font-size: 15px; color: #1e293b; }'
            });

            // Live Image Preview for Featured Image input
            const imageInput = document.getElementById('featured_image');
            const previewContainer = document.getElementById('image-preview-container');
            const previewImg = document.getElementById('image-preview-img');
            const previewBadge = document.getElementById('image-preview-badge');
            const cancelBtn = document.getElementById('cancel-image-change-btn');
            const originalSrc = "{{ $post->featured_image_url ?? '' }}";

            if (imageInput) {
                imageInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        if (!file.type.startsWith('image/')) {
                            alert('Silakan pilih file gambar yang valid.');
                            imageInput.value = '';
                            return;
                        }
                        const reader = new FileReader();
                        reader.onload = function(evt) {
                            previewImg.src = evt.target.result;
                            previewContainer.classList.remove('hidden');
                            previewBadge.textContent = 'Pratinjau Gambar Baru (Belum Disimpan)';
                            previewBadge.className = 'text-xs font-semibold text-amber-600 bg-amber-50 px-2 py-0.5 rounded border border-amber-200 mt-1 inline-block';
                            if (cancelBtn) cancelBtn.classList.remove('hidden');
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }

            if (cancelBtn) {
                cancelBtn.addEventListener('click', function() {
                    imageInput.value = '';
                    if (originalSrc) {
                        previewImg.src = originalSrc;
                        previewBadge.textContent = 'Gambar saat ini';
                        previewBadge.className = 'text-xs text-slate-500 mt-1 block';
                        cancelBtn.classList.add('hidden');
                    } else {
                        previewContainer.classList.add('hidden');
                        previewImg.src = '';
                    }
                });
            }
        });
    </script>

    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-card rounded-2xl border border-slate-100 p-6">
                <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="md:col-span-2 space-y-6">
                            <div>
                                <label for="title" class="block text-sm font-medium text-slate-700 mb-1">Judul Artikel <span class="text-rose-500">*</span></label>
                                <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" required class="w-full rounded-lg border-slate-300 shadow-sm focus:border-apjii-blue focus:ring-apjii-blue">
                                @error('title')
                                    <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="slug" class="block text-sm font-medium text-slate-700 mb-1">Slug</label>
                                <input type="text" name="slug" id="slug" value="{{ old('slug', $post->slug) }}" class="w-full rounded-lg border-slate-300 shadow-sm focus:border-apjii-blue focus:ring-apjii-blue font-mono text-sm">
                                @error('slug')
                                    <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="excerpt" class="block text-sm font-medium text-slate-700 mb-1">Ringkasan / Excerpt</label>
                                <textarea name="excerpt" id="excerpt" rows="3" class="w-full rounded-lg border-slate-300 shadow-sm focus:border-apjii-blue focus:ring-apjii-blue">{{ old('excerpt', $post->excerpt) }}</textarea>
                                @error('excerpt')
                                    <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="body-editor" class="block text-sm font-medium text-slate-700 mb-1">Konten Lengkap Berita <span class="text-rose-500">*</span></label>
                                <textarea name="body" id="body-editor" class="w-full rounded-lg border-slate-300 shadow-sm">{{ old('body', $post->body) }}</textarea>
                                @error('body')
                                    <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Sidebar Settings -->
                        <div class="space-y-6 bg-slate-50/70 p-5 rounded-xl border border-slate-200/80 h-fit">
                            <h3 class="font-semibold text-slate-900 border-b border-slate-200 pb-3">Pengaturan Artikel</h3>

                            <div>
                                <label for="category_id" class="block text-sm font-medium text-slate-700 mb-1">Kategori <span class="text-rose-500">*</span></label>
                                <select name="category_id" id="category_id" required class="w-full rounded-lg border-slate-300 shadow-sm focus:border-apjii-blue focus:ring-apjii-blue">
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="status" class="block text-sm font-medium text-slate-700 mb-1">Status Publikasi <span class="text-rose-500">*</span></label>
                                <select name="status" id="status" required class="w-full rounded-lg border-slate-300 shadow-sm focus:border-apjii-blue focus:ring-apjii-blue">
                                    <option value="published" {{ old('status', $post->status) == 'published' ? 'selected' : '' }}>Diterbitkan (Published)</option>
                                    <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                                </select>
                                @error('status')
                                    <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="featured_image" class="block text-sm font-medium text-slate-700 mb-1">Gambar Utama (Featured Image)</label>
                                
                                <div id="image-preview-container" class="mb-3 {{ $post->featured_image ? '' : 'hidden' }}">
                                    <div class="relative group">
                                        <img id="image-preview-img" src="{{ $post->featured_image_url ?? '' }}" alt="Preview" class="w-full h-36 object-cover rounded-lg border border-slate-200 shadow-sm">
                                    </div>
                                    <div class="flex justify-between items-center mt-1.5">
                                        <span id="image-preview-badge" class="text-xs text-slate-500">Gambar saat ini</span>
                                        <button type="button" id="cancel-image-change-btn" class="hidden text-xs text-rose-600 hover:text-rose-800 font-semibold underline">
                                            Batal Ganti Gambar
                                        </button>
                                    </div>
                                </div>

                                <input type="file" name="featured_image" id="featured_image" accept="image/png, image/jpeg, image/jpg, image/webp, image/gif, image/svg+xml" class="w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-apjii-subtle file:text-apjii-blue hover:file:bg-apjii-blue hover:file:text-white transition">
                                <p class="mt-1 text-xs text-slate-500">Pilih gambar baru untuk mengganti. Hanya format gambar yang diperbolehkan (PNG, JPG, JPEG, WEBP, SVG, GIF, maks 4MB).</p>
                                @error('featured_image')
                                    <p class="mt-1 text-sm text-rose-600 font-semibold">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="pt-4 border-t border-slate-200">
                                <button type="submit" class="w-full py-3 px-4 bg-apjii-blue hover:bg-apjii-navy text-white text-sm font-semibold rounded-lg shadow-sm transition">
                                    Perbarui Artikel
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
