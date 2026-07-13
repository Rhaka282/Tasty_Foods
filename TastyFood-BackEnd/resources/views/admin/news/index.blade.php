<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola Berita') }}
            </h2>
            <a href="{{ route('admin.news.create') }}" class="inline-flex items-center px-4 py-2 bg-amber-500 hover:bg-amber-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest transition-colors duration-300">
                + Tambah Berita
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 rounded-r-xl text-green-700 text-sm font-semibold shadow-sm flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-100 text-sm">
                            <thead>
                                <tr class="bg-gray-50 text-left font-semibold text-gray-500 uppercase tracking-wider text-xs">
                                    <th class="px-6 py-4 rounded-l-xl">Gambar</th>
                                    <th class="px-6 py-4">Judul</th>
                                    <th class="px-6 py-4">Konten</th>
                                    <th class="px-6 py-4">Tanggal Dibuat</th>
                                    <th class="px-6 py-4 rounded-r-xl text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                @forelse($news as $item)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($item->image)
                                                <img src="{{ str_starts_with($item->image, 'ASET/') ? 'http://127.0.0.1:8000/'.$item->image : asset('storage/'.$item->image) }}" class="w-16 h-12 rounded-lg object-cover bg-gray-100 shadow-sm border border-gray-100" onerror="this.onerror=null;this.src='{{ asset('images/default-news.jpg') }}'" />
                                            @else
                                                <div class="w-16 h-12 rounded-lg bg-gray-100 flex items-center justify-center text-gray-400 border border-gray-100">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="font-bold text-gray-900 max-w-xs truncate">{{ $item->title }}</div>
                                            <div class="text-xs text-gray-400 font-mono mt-1">/{{ $item->slug }}</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <p class="text-gray-500 line-clamp-2 max-w-sm">{{ $item->content }}</p>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-500 text-xs">
                                            {{ $item->created_at->format('d M Y H:i') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-xs font-semibold space-x-2">
                                            <a href="{{ route('admin.news.edit', $item->id) }}" class="inline-flex items-center px-3 py-1.5 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors">
                                                Edit
                                            </a>
                                            
                                            <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-colors">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-8 text-center text-gray-400">
                                            Belum ada data berita. Silakan tambahkan berita pertama Anda!
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-6">
                        {{ $news->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
