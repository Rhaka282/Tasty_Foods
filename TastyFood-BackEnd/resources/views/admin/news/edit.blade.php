<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.news.index') }}" class="text-gray-400 hover:text-gray-600 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Berita') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-r-xl text-red-700 text-sm font-semibold shadow-sm">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100">
                <div class="p-8 text-gray-900">
                    <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Title -->
                        <div>
                            <label for="title" class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">Judul Berita</label>
                            <input type="text" name="title" id="title" class="w-full rounded-xl border-gray-200 focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50 transition-shadow py-3 px-4 text-sm font-semibold" placeholder="Masukkan judul berita yang menarik" value="{{ old('title', $news->title) }}" required>
                        </div>

                        <!-- Content -->
                        <div>
                            <label for="content" class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">Konten / Isi Berita</label>
                            <textarea name="content" id="content" rows="8" class="w-full rounded-xl border-gray-200 focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50 transition-shadow py-3 px-4 text-sm" placeholder="Tuliskan isi artikel lengkap di sini..." required>{{ old('content', $news->content) }}</textarea>
                        </div>

                        <!-- Current Image -->
                        @if($news->image)
                            <div>
                                <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">Gambar Saat Ini</label>
                                <div class="mt-2 text-center bg-gray-50 rounded-xl p-4 border border-gray-200 inline-block">
                                    <img src="{{ str_starts_with($news->image, 'ASET/') ? 'http://127.0.0.1:8000/'.$news->image : asset('storage/'.$news->image) }}" class="max-h-48 rounded-lg shadow-sm object-cover" onerror="this.onerror=null;this.src='{{ asset('images/default-news.jpg') }}'" />
                                    <p class="text-xs text-gray-400 mt-2">{{ basename($news->image) }}</p>
                                </div>
                            </div>
                        @endif

                        <!-- Image Upload -->
                        <div>
                            <label for="image" class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">Ganti Gambar Sampul</label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-200 border-dashed rounded-xl hover:border-amber-400 transition-colors">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-semibold text-amber-600 hover:text-amber-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-amber-500">
                                            <span>Unggah file gambar baru</span>
                                            <input id="file-upload" name="image" type="file" class="sr-only" accept="image/*" onchange="previewImage(event)">
                                        </label>
                                        <p class="pl-1">atau seret dan lepas</p>
                                    </div>
                                    <p class="text-xs text-gray-400">PNG, JPG, JPEG hingga 2MB</p>
                                </div>
                            </div>
                            <!-- Image Preview -->
                            <div id="preview-container" class="mt-4 hidden text-center">
                                <p class="text-xs text-gray-400 mb-2">Pratinjau Gambar Baru:</p>
                                <img id="image-preview" src="#" alt="Pratinjau" class="mx-auto max-h-48 rounded-lg shadow-sm border border-gray-100 object-cover">
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="pt-4 flex justify-end gap-3 border-t border-gray-100">
                            <a href="{{ route('admin.news.index') }}" class="inline-flex items-center px-4 py-2.5 bg-white border border-gray-200 rounded-xl font-bold text-xs text-gray-500 uppercase tracking-widest hover:bg-gray-50 transition-colors">
                                Batal
                            </a>
                            <button type="submit" class="inline-flex items-center px-5 py-2.5 bg-amber-500 hover:bg-amber-600 border border-transparent rounded-xl font-bold text-xs text-white uppercase tracking-widest shadow-md shadow-amber-500/10 transition-colors">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const input = event.target;
            const previewContainer = document.getElementById('preview-container');
            const preview = document.getElementById('image-preview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</x-app-layout>
