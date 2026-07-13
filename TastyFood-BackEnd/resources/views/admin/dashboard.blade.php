<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Welcome Alert -->
            <div class="bg-gradient-to-r from-yellow-500 to-amber-600 text-white rounded-2xl p-8 shadow-lg relative overflow-hidden">
                <div class="relative z-10">
                    <h3 class="text-2xl font-bold mb-2">Selamat Datang kembali, {{ Auth::user()->name }}!</h3>
                    <p class="text-yellow-100 opacity-90 max-w-xl">
                        Kelola konten situs Tasty Food Anda dengan mudah. Tambahkan berita kuliner terbaru, unggah foto makanan terbaik ke galeri, dan tinjau pesan masuk dari pelanggan.
                    </p>
                </div>
                <div class="absolute right-0 bottom-0 translate-y-6 translate-x-6 opacity-10">
                    <svg class="w-64 h-64" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm2.07-7.75l-.9.92C13.45 12.9 13 13.5 13 15h-2v-.5c0-1.1.45-2.1 1.17-2.83l1.24-1.26c.37-.36.59-.86.59-1.41 0-1.1-.9-2-2-2s-2 .9-2 2H7c0-2.76 2.24-5 5-5s5 2.24 5 5c0 1.04-.42 1.99-1.07 2.75z"/>
                    </svg>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- News Card -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Total Berita</p>
                            <h3 class="text-3xl font-bold text-gray-900 mt-2">{{ $newsCount }}</h3>
                        </div>
                        <div class="p-3 bg-amber-50 text-amber-600 rounded-xl group-hover:bg-amber-100 transition-colors duration-300">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <a href="{{ route('admin.news.index') }}" class="text-xs font-semibold text-amber-600 hover:text-amber-700 inline-flex items-center gap-1">
                            Kelola Berita
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                </div>

                <!-- Gallery Card -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Total Foto Galeri</p>
                            <h3 class="text-3xl font-bold text-gray-900 mt-2">{{ $galleryCount }}</h3>
                        </div>
                        <div class="p-3 bg-blue-50 text-blue-600 rounded-xl group-hover:bg-blue-100 transition-colors duration-300">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <a href="{{ route('admin.gallery.index') }}" class="text-xs font-semibold text-blue-600 hover:text-blue-700 inline-flex items-center gap-1">
                            Kelola Galeri
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                </div>

                <!-- Contacts Card -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Pesan Masuk</p>
                            <h3 class="text-3xl font-bold text-gray-900 mt-2">{{ $contactCount }}</h3>
                        </div>
                        <div class="p-3 bg-green-50 text-green-600 rounded-xl group-hover:bg-green-100 transition-colors duration-300">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <a href="{{ route('admin.contacts.index') }}" class="text-xs font-semibold text-green-600 hover:text-green-700 inline-flex items-center gap-1">
                            Lihat Pesan Masuk
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Activity Row -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Latest News -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h4 class="text-lg font-bold text-gray-950">Berita Terbaru</h4>
                        <a href="{{ route('admin.news.create') }}" class="text-xs font-bold text-white bg-amber-500 hover:bg-amber-600 px-3 py-1.5 rounded-lg transition-colors">
                            Tambah Berita
                        </a>
                    </div>
                    
                    <div class="divide-y divide-gray-100">
                        @forelse($latestNews as $item)
                            <div class="py-4 flex gap-4 first:pt-0 last:pb-0">
                                @if($item->image)
                                    <div class="w-16 h-12 rounded-lg overflow-hidden flex-shrink-0 bg-gray-100">
                                        <img src="{{ str_starts_with($item->image, 'ASET/') ? 'http://127.0.0.1:8000/'.$item->image : asset('storage/'.$item->image) }}" class="w-full h-full object-cover" onerror="this.onerror=null;this.src='{{ asset('images/default-news.jpg') }}'" />
                                    </div>
                                @else
                                    <div class="w-16 h-12 rounded-lg bg-gray-100 flex items-center justify-center text-gray-400 flex-shrink-0">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                @endif
                                <div class="flex-grow min-w-0">
                                    <h5 class="text-sm font-bold text-gray-900 truncate hover:text-amber-600 transition-colors">
                                        <a href="{{ route('admin.news.edit', $item->id) }}">{{ $item->title }}</a>
                                    </h5>
                                    <p class="text-xs text-gray-400 mt-1">Diposting {{ $item->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-400 text-sm py-4">Belum ada berita ditambahkan.</p>
                        @endforelse
                    </div>
                </div>

                <!-- Latest Message Inbox -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h4 class="text-lg font-bold text-gray-950">Pesan Masuk Terbaru</h4>
                        <a href="{{ route('admin.contacts.index') }}" class="text-xs font-bold text-gray-600 hover:text-gray-800">
                            Lihat Semua
                        </a>
                    </div>
                    
                    <div class="divide-y divide-gray-100">
                        @forelse($latestMessages as $msg)
                            <div class="py-4 flex flex-col gap-1 first:pt-0 last:pb-0">
                                <div class="flex items-center justify-between">
                                    <span class="text-sm font-bold text-gray-900">{{ $msg->name }}</span>
                                    <span class="text-[10px] text-gray-400 font-medium">{{ $msg->created_at->diffForHumans() }}</span>
                                </div>
                                <span class="text-xs font-semibold text-amber-600">{{ $msg->subject }}</span>
                                <p class="text-xs text-gray-500 line-clamp-2 mt-1">{{ $msg->message }}</p>
                            </div>
                        @empty
                            <p class="text-gray-400 text-sm py-4">Belum ada pesan masuk.</p>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
