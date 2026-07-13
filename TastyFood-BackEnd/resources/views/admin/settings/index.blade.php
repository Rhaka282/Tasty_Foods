<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Informasi Restoran (Tentang & Kontak)') }}
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

            @if($errors->any())
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-r-xl text-red-700 text-sm font-semibold shadow-sm">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-8">
                    <!-- Section 1: Halaman Tentang Kami -->
                    <div class="bg-white p-6 shadow-sm sm:rounded-2xl border border-gray-100 space-y-6">
                        <div class="border-b border-gray-100 pb-4">
                            <h3 class="text-lg font-bold text-gray-900">Konten Halaman "Tentang Kami"</h3>
                            <p class="text-xs text-gray-400 mt-1">Sesuaikan sejarah, judul deskripsi, serta visi & misi restoran Tasty Food.</p>
                        </div>

                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label for="about_title" class="block text-sm font-semibold text-gray-700">Judul Tentang Kami</label>
                                <input type="text" name="about_title" id="about_title" value="{{ old('about_title', $settings['about_title'] ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50" required>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="about_desc_1" class="block text-sm font-semibold text-gray-700">Deskripsi / Sejarah Restoran (Paragraf 1)</label>
                                    <textarea name="about_desc_1" id="about_desc_1" rows="5" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50" required>{{ old('about_desc_1', $settings['about_desc_1'] ?? '') }}</textarea>
                                </div>
                                <div>
                                    <label for="about_desc_2" class="block text-sm font-semibold text-gray-700">Deskripsi / Sejarah Restoran (Paragraf 2)</label>
                                    <textarea name="about_desc_2" id="about_desc_2" rows="5" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50" required>{{ old('about_desc_2', $settings['about_desc_2'] ?? '') }}</textarea>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="visi" class="block text-sm font-semibold text-gray-700">Visi Restoran</label>
                                    <textarea name="visi" id="visi" rows="4" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50" required>{{ old('visi', $settings['visi'] ?? '') }}</textarea>
                                </div>
                                <div>
                                    <label for="misi" class="block text-sm font-semibold text-gray-700">Misi Restoran</label>
                                    <textarea name="misi" id="misi" rows="4" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50" required>{{ old('misi', $settings['misi'] ?? '') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section: Halaman Beranda (Home) -->
                    <div class="bg-white p-6 shadow-sm sm:rounded-2xl border border-gray-100 space-y-6">
                        <div class="border-b border-gray-100 pb-4">
                            <h3 class="text-lg font-bold text-gray-900">Konten Halaman Utama (Home / Beranda)</h3>
                            <p class="text-xs text-gray-400 mt-1">Ubah teks deskripsi utama hero, deskripsi singkat tentang kami, dan 4 kolom card di bawahnya.</p>
                        </div>

                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label for="home_hero_desc" class="block text-sm font-semibold text-gray-700">Deskripsi Hero Section (Header Utama)</label>
                                <textarea name="home_hero_desc" id="home_hero_desc" rows="3" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50" required>{{ old('home_hero_desc', $settings['home_hero_desc'] ?? '') }}</textarea>
                            </div>

                            <div>
                                <label for="home_hero_image" class="block text-sm font-semibold text-gray-700">Gambar Hero Section</label>
                                <div class="mt-2 flex items-center gap-4">
                                    <img src="{{ !empty($settings['home_hero_image']) ? $settings['home_hero_image'] : 'http://127.0.0.1:8000/ASET/Group 70.png' }}" class="w-20 h-20 object-contain rounded-xl border bg-gray-50 p-1" />
                                    <input type="file" name="home_hero_image" id="home_hero_image" class="mt-1 block text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100" />
                                </div>
                                <p class="text-xs text-gray-400 mt-1">Format gambar: jpeg, png, jpg, gif (Max 2MB). Rekomendasi: format bulat transparan png.</p>
                            </div>

                            <div>
                                <label for="home_about_desc" class="block text-sm font-semibold text-gray-700">Deskripsi Singkat Tentang Kami (Tengah Halaman)</label>
                                <textarea name="home_about_desc" id="home_about_desc" rows="3" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50" required>{{ old('home_about_desc', $settings['home_about_desc'] ?? '') }}</textarea>
                            </div>

                            <div class="border-t border-gray-100 pt-4">
                                <h4 class="text-sm font-bold text-gray-900 mb-4">4 Card Informasi (Tentang Kami Grid)</h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Card 1 -->
                                    <div class="bg-gray-50/50 p-4 rounded-xl border border-gray-100 space-y-3">
                                        <h5 class="text-xs font-bold text-amber-600 uppercase tracking-wider">Card 1</h5>
                                        <div>
                                            <label for="home_card1_title" class="block text-xs font-semibold text-gray-600">Judul</label>
                                            <input type="text" name="home_card1_title" id="home_card1_title" value="{{ old('home_card1_title', $settings['home_card1_title'] ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50 text-sm" required>
                                        </div>
                                        <div>
                                            <label for="home_card1_desc" class="block text-xs font-semibold text-gray-600">Deskripsi</label>
                                            <textarea name="home_card1_desc" id="home_card1_desc" rows="2" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50 text-sm" required>{{ old('home_card1_desc', $settings['home_card1_desc'] ?? '') }}</textarea>
                                        </div>
                                        <div>
                                            <label for="home_card1_image" class="block text-xs font-semibold text-gray-600">Gambar Card 1</label>
                                            <div class="mt-1 flex items-center gap-3">
                                                <img src="{{ !empty($settings['home_card1_image']) ? $settings['home_card1_image'] : 'http://127.0.0.1:8000/ASET/img-1.png' }}" class="w-12 h-12 object-cover rounded-full border bg-white" />
                                                <input type="file" name="home_card1_image" id="home_card1_image" class="block w-full text-xs text-gray-500 file:mr-2 file:py-1 file:px-2 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100" />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card 2 -->
                                    <div class="bg-gray-50/50 p-4 rounded-xl border border-gray-100 space-y-3">
                                        <h5 class="text-xs font-bold text-amber-600 uppercase tracking-wider">Card 2</h5>
                                        <div>
                                            <label for="home_card2_title" class="block text-xs font-semibold text-gray-600">Judul</label>
                                            <input type="text" name="home_card2_title" id="home_card2_title" value="{{ old('home_card2_title', $settings['home_card2_title'] ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50 text-sm" required>
                                        </div>
                                        <div>
                                            <label for="home_card2_desc" class="block text-xs font-semibold text-gray-600">Deskripsi</label>
                                            <textarea name="home_card2_desc" id="home_card2_desc" rows="2" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50 text-sm" required>{{ old('home_card2_desc', $settings['home_card2_desc'] ?? '') }}</textarea>
                                        </div>
                                        <div>
                                            <label for="home_card2_image" class="block text-xs font-semibold text-gray-600">Gambar Card 2</label>
                                            <div class="mt-1 flex items-center gap-3">
                                                <img src="{{ !empty($settings['home_card2_image']) ? $settings['home_card2_image'] : 'http://127.0.0.1:8000/ASET/img-2.png' }}" class="w-12 h-12 object-cover rounded-full border bg-white" />
                                                <input type="file" name="home_card2_image" id="home_card2_image" class="block w-full text-xs text-gray-500 file:mr-2 file:py-1 file:px-2 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100" />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card 3 -->
                                    <div class="bg-gray-50/50 p-4 rounded-xl border border-gray-100 space-y-3">
                                        <h5 class="text-xs font-bold text-amber-600 uppercase tracking-wider">Card 3</h5>
                                        <div>
                                            <label for="home_card3_title" class="block text-xs font-semibold text-gray-600">Judul</label>
                                            <input type="text" name="home_card3_title" id="home_card3_title" value="{{ old('home_card3_title', $settings['home_card3_title'] ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50 text-sm" required>
                                        </div>
                                        <div>
                                            <label for="home_card3_desc" class="block text-xs font-semibold text-gray-600">Deskripsi</label>
                                            <textarea name="home_card3_desc" id="home_card3_desc" rows="2" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50 text-sm" required>{{ old('home_card3_desc', $settings['home_card3_desc'] ?? '') }}</textarea>
                                        </div>
                                        <div>
                                            <label for="home_card3_image" class="block text-xs font-semibold text-gray-600">Gambar Card 3</label>
                                            <div class="mt-1 flex items-center gap-3">
                                                <img src="{{ !empty($settings['home_card3_image']) ? $settings['home_card3_image'] : 'http://127.0.0.1:8000/ASET/img-3.png' }}" class="w-12 h-12 object-cover rounded-full border bg-white" />
                                                <input type="file" name="home_card3_image" id="home_card3_image" class="block w-full text-xs text-gray-500 file:mr-2 file:py-1 file:px-2 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100" />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card 4 -->
                                    <div class="bg-gray-50/50 p-4 rounded-xl border border-gray-100 space-y-3">
                                        <h5 class="text-xs font-bold text-amber-600 uppercase tracking-wider">Card 4</h5>
                                        <div>
                                            <label for="home_card4_title" class="block text-xs font-semibold text-gray-600">Judul</label>
                                            <input type="text" name="home_card4_title" id="home_card4_title" value="{{ old('home_card4_title', $settings['home_card4_title'] ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50 text-sm" required>
                                        </div>
                                        <div>
                                            <label for="home_card4_desc" class="block text-xs font-semibold text-gray-600">Deskripsi</label>
                                            <textarea name="home_card4_desc" id="home_card4_desc" rows="2" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50 text-sm" required>{{ old('home_card4_desc', $settings['home_card4_desc'] ?? '') }}</textarea>
                                        </div>
                                        <div>
                                            <label for="home_card4_image" class="block text-xs font-semibold text-gray-600">Gambar Card 4</label>
                                            <div class="mt-1 flex items-center gap-3">
                                                <img src="{{ !empty($settings['home_card4_image']) ? $settings['home_card4_image'] : 'http://127.0.0.1:8000/ASET/img-4.png' }}" class="w-12 h-12 object-cover rounded-full border bg-white" />
                                                <input type="file" name="home_card4_image" id="home_card4_image" class="block w-full text-xs text-gray-500 file:mr-2 file:py-1 file:px-2 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section 2: Informasi Kontak & Lokasi -->
                    <div class="bg-white p-6 shadow-sm sm:rounded-2xl border border-gray-100 space-y-6">
                        <div class="border-b border-gray-100 pb-4">
                            <h3 class="text-lg font-bold text-gray-900">Kontak & Lokasi Maps</h3>
                            <p class="text-xs text-gray-400 mt-1">Ubah email, WhatsApp, alamat tertulis, serta sematkan peta Google Maps baru.</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label for="contact_email" class="block text-sm font-semibold text-gray-700">Alamat Email</label>
                                <input type="email" name="contact_email" id="contact_email" value="{{ old('contact_email', $settings['contact_email'] ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50" required>
                            </div>
                            <div>
                                <label for="contact_phone" class="block text-sm font-semibold text-gray-700">No. WhatsApp / Telepon</label>
                                <input type="text" name="contact_phone" id="contact_phone" value="{{ old('contact_phone', $settings['contact_phone'] ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50" required>
                            </div>
                            <div>
                                <label for="contact_address" class="block text-sm font-semibold text-gray-700">Alamat Fisik</label>
                                <input type="text" name="contact_address" id="contact_address" value="{{ old('contact_address', $settings['contact_address'] ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50" required>
                            </div>
                        </div>

                        <div>
                            <label for="contact_maps" class="block text-sm font-semibold text-gray-700">Google Maps Embed Link (src iframe)</label>
                            <input type="text" name="contact_maps" id="contact_maps" value="{{ old('contact_maps', $settings['contact_maps'] ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50" required>
                            <p class="text-xs text-gray-400 mt-2">Masukkan nilai atribut <strong>src</strong> dari kode bagikan peta Google Maps (iframe).</p>
                        </div>
                    </div>

                    <!-- Section 3: Tautan Media Sosial -->
                    <div class="bg-white p-6 shadow-sm sm:rounded-2xl border border-gray-100 space-y-6">
                        <div class="border-b border-gray-100 pb-4">
                            <h3 class="text-lg font-bold text-gray-900">Media Sosial</h3>
                            <p class="text-xs text-gray-400 mt-1">Ubah tautan media sosial resmi restoran Anda.</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label for="contact_instagram" class="block text-sm font-semibold text-gray-700">Link Instagram</label>
                                <input type="url" name="contact_instagram" id="contact_instagram" value="{{ old('contact_instagram', $settings['contact_instagram'] ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50" placeholder="https://instagram.com/username">
                            </div>
                            <div>
                                <label for="contact_facebook" class="block text-sm font-semibold text-gray-700">Link Facebook</label>
                                <input type="url" name="contact_facebook" id="contact_facebook" value="{{ old('contact_facebook', $settings['contact_facebook'] ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50" placeholder="https://facebook.com/username">
                            </div>
                            <div>
                                <label for="contact_twitter" class="block text-sm font-semibold text-gray-700">Link Twitter (X)</label>
                                <input type="url" name="contact_twitter" id="contact_twitter" value="{{ old('contact_twitter', $settings['contact_twitter'] ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50" placeholder="https://twitter.com/username">
                            </div>
                        </div>
                    </div>

                    <!-- Section 4: Halaman Kontak (Banner & Judul) -->
                    <div class="bg-white p-6 shadow-sm sm:rounded-2xl border border-gray-100 space-y-6">
                        <div class="border-b border-gray-100 pb-4">
                            <h3 class="text-lg font-bold text-gray-900">Halaman Kontak</h3>
                            <p class="text-xs text-gray-400 mt-1">Ubah gambar banner dan judul yang tampil di halaman Kontak Kami.</p>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="contact_title" class="block text-sm font-semibold text-gray-700">Judul Banner Halaman Kontak</label>
                                <input type="text" name="contact_title" id="contact_title" value="{{ old('contact_title', $settings['contact_title'] ?? 'Kontak Kami') }}" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50">
                            </div>
                            <div>
                                <label for="contact_banner" class="block text-sm font-semibold text-gray-700">Gambar Banner Kontak</label>
                                <div class="mt-2 flex items-center gap-4">
                                    @if(!empty($settings['contact_banner']))
                                        <img src="{{ $settings['contact_banner'] }}" class="w-20 h-14 object-cover rounded-xl border bg-gray-50" />
                                    @else
                                        <div class="w-20 h-14 rounded-xl border bg-gray-100 flex items-center justify-center text-xs text-gray-400">No Image</div>
                                    @endif
                                    <input type="file" name="contact_banner" id="contact_banner" class="mt-1 block text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100" />
                                </div>
                                <p class="text-xs text-gray-400 mt-1">Format: jpeg, png, jpg, gif (Max 4MB). Tampil sebagai header/banner halaman kontak.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Section 5: Pengaturan Footer -->
                    <div class="bg-white p-6 shadow-sm sm:rounded-2xl border border-gray-100 space-y-6">
                        <div class="border-b border-gray-100 pb-4">
                            <h3 class="text-lg font-bold text-gray-900">Pengaturan Footer</h3>
                            <p class="text-xs text-gray-400 mt-1">Ubah deskripsi dan tautan navigasi yang muncul di footer website.</p>
                        </div>

                        <!-- Footer Description -->
                        <div>
                            <label for="footer_desc" class="block text-sm font-semibold text-gray-700">Deskripsi Footer</label>
                            <textarea name="footer_desc" id="footer_desc" rows="4" class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50">{{ old('footer_desc', $settings['footer_desc'] ?? '') }}</textarea>
                            <p class="text-xs text-gray-400 mt-1">Teks singkat yang muncul di kolom kiri footer di bawah nama "Tasty Food".</p>
                        </div>

                        <!-- Useful Links -->
                        <div class="border-t border-gray-100 pt-4">
                            <h4 class="text-sm font-bold text-gray-800 mb-4">Tautan Useful Links (Kolom Footer Kiri Tengah)</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @for($i = 1; $i <= 4; $i++)
                                <div class="bg-gray-50/50 p-4 rounded-xl border border-gray-100 space-y-2">
                                    <h5 class="text-xs font-bold text-amber-600 uppercase tracking-wider">Link {{ $i }}</h5>
                                    <div>
                                        <label class="block text-xs font-semibold text-gray-600">Nama Tautan</label>
                                        <input type="text" name="footer_useful_link_{{ $i }}_name" value="{{ old('footer_useful_link_'.$i.'_name', $settings['footer_useful_link_'.$i.'_name'] ?? '') }}" placeholder="Contoh: Blog" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50 text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-gray-600">URL Tautan</label>
                                        <input type="text" name="footer_useful_link_{{ $i }}_url" value="{{ old('footer_useful_link_'.$i.'_url', $settings['footer_useful_link_'.$i.'_url'] ?? '') }}" placeholder="Contoh: /berita atau https://..." class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50 text-sm">
                                    </div>
                                </div>
                                @endfor
                            </div>
                        </div>

                        <!-- Privacy Links -->
                        <div class="border-t border-gray-100 pt-4">
                            <h4 class="text-sm font-bold text-gray-800 mb-4">Tautan Privacy (Kolom Footer Kanan Tengah)</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @for($i = 1; $i <= 4; $i++)
                                <div class="bg-gray-50/50 p-4 rounded-xl border border-gray-100 space-y-2">
                                    <h5 class="text-xs font-bold text-blue-600 uppercase tracking-wider">Link {{ $i }}</h5>
                                    <div>
                                        <label class="block text-xs font-semibold text-gray-600">Nama Tautan</label>
                                        <input type="text" name="footer_privacy_link_{{ $i }}_name" value="{{ old('footer_privacy_link_'.$i.'_name', $settings['footer_privacy_link_'.$i.'_name'] ?? '') }}" placeholder="Contoh: Tentang Kami" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50 text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-gray-600">URL Tautan</label>
                                        <input type="text" name="footer_privacy_link_{{ $i }}_url" value="{{ old('footer_privacy_link_'.$i.'_url', $settings['footer_privacy_link_'.$i.'_url'] ?? '') }}" placeholder="Contoh: /tentang atau https://..." class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50 text-sm">
                                    </div>
                                </div>
                                @endfor
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end pt-4">
                        <button type="submit" class="inline-flex items-center px-6 py-3 bg-amber-500 hover:bg-amber-600 border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-wider shadow-md hover:shadow-lg transition-all duration-300 cursor-pointer">
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
