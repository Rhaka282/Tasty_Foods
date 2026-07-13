<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Galeri Foto') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 rounded-r-xl text-green-700 text-sm font-semibold shadow-sm flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 p-6 text-gray-900">
                
                <!-- Grid of Images -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @forelse($galleries as $item)
                        <div class="bg-white border border-gray-100 rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-shadow flex flex-col group relative">
                            <!-- Image wrapper -->
                            <div class="aspect-square w-full bg-gray-50 overflow-hidden relative">
                                <img src="{{ str_starts_with($item->image, 'ASET/') ? 'http://127.0.0.1:8000/'.$item->image : asset('storage/'.$item->image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" onerror="this.onerror=null;this.src='{{ asset('images/default-gallery.jpg') }}'" />
                                
                                <!-- Hover actions overlay -->
                                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-3">
                                    <!-- Add Button (Blue) -->
                                    <a href="{{ route('admin.gallery.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white rounded-full p-3 shadow-lg transition-transform scale-90 group-hover:scale-100 duration-300" title="Tambah Foto Baru">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                    </a>
                                    <!-- Edit Title Button (Yellow) -->
                                    <a href="{{ route('admin.gallery.edit', $item->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white rounded-full p-3 shadow-lg transition-transform scale-90 group-hover:scale-100 duration-300" title="Ubah Nama/Foto">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                    </a>
                                    <!-- Delete Form -->
                                    <form action="{{ route('admin.gallery.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini dari galeri?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white rounded-full p-3 shadow-lg transition-transform scale-90 group-hover:scale-100 duration-300" title="Hapus Foto">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <!-- Meta Content -->
                            <div class="p-4 flex-grow flex flex-col justify-between">
                                <h5 class="font-bold text-sm text-gray-900 truncate">{{ $item->title ?? 'Tanpa Judul' }}</h5>
                                <div class="text-[10px] text-gray-400 mt-2 flex justify-between items-center">
                                    <span>Seeded/Uploaded</span>
                                    <span>{{ $item->created_at->format('d M Y') }}</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full py-12 text-center text-gray-400">
                            Belum ada foto dalam galeri. Mulai unggah foto makanan terbaik Anda sekarang!
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $galleries->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
