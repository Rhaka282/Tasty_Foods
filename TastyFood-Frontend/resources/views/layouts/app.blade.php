<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tasty Food - Menyajikan berbagai macam makanan khas Nusantara yang sehat dan lezat.">
    <title>@yield('title', 'Tasty Food - Healthy Tasty Food')</title>
    
    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FontAwesome v6 for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    
    @yield('styles')
</head>
<body>

    <!-- Navigation Bar -->
    @php
        $isHome = Route::is('home');
    @endphp
    
    <nav class="{{ $isHome ? 'navbar navbar-expand-lg navbar-light bg-white py-4' : 'navbar navbar-expand-lg navbar-dark bg-transparent position-absolute w-100 top-0 py-4 z-3' }}">
        <div class="container">
            <a class="navbar-brand fw-black text-uppercase tracking-wider {{ $isHome ? 'text-dark' : 'text-white' }}" href="{{ route('home') }}" style="font-size: 1.5rem; font-weight: 800;">
                Tasty Food
            </a>
            <button class="navbar-toggler {{ $isHome ? '' : 'border-white' }}" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon {{ $isHome ? '' : 'filter-white' }}"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav gap-lg-4 text-uppercase fw-semibold" style="font-size: 0.85rem; letter-spacing: 1.5px;">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('home') ? 'active' : '' }} {{ !$isHome ? 'text-white' : 'text-dark' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('tentang') ? 'active' : '' }} {{ !$isHome ? 'text-white' : 'text-dark' }}" href="{{ route('tentang') }}">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('berita') ? 'active' : '' }} {{ !$isHome ? 'text-white' : 'text-dark' }}" href="{{ route('berita') }}">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('galeri') ? 'active' : '' }} {{ !$isHome ? 'text-white' : 'text-dark' }}" href="{{ route('galeri') }}">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('kontak') ? 'active' : '' }} {{ !$isHome ? 'text-white' : 'text-dark' }}" href="{{ route('kontak') }}">Kontak</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ Route::is('profile.edit') ? 'active' : '' }} {{ !$isHome ? 'text-white' : 'text-dark' }} d-flex align-items-center gap-2" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ Auth::user()->photo ? asset(Auth::user()->photo) : 'https://www.gravatar.com/avatar/' . md5(strtolower(trim(Auth::user()->email ?? ''))) . '?d=mp&s=40' }}" 
                                 alt="Avatar" 
                                 class="rounded-circle border border-1" 
                                 style="width: 25px; height: 25px; object-fit: cover; border-color: rgba(255,255,255,0.2);">
                            <span>{{ Auth::user()->name ?? 'User' }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg mt-2 py-2" aria-labelledby="profileDropdown" style="min-width: 200px;">
                            <li>
                                <a class="dropdown-item py-2 px-3 fw-semibold text-dark d-flex align-items-center gap-2" href="{{ route('profile.edit') }}">
                                    <i class="fa-solid fa-user-gear text-secondary"></i>
                                    <span>Ubah Profil</span>
                                </a>
                            </li>
                            <li><hr class="dropdown-divider my-2"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" id="logout-form" class="d-none">
                                    @csrf
                                </form>
                                <a class="dropdown-item py-2 px-3 fw-semibold text-danger d-flex align-items-center gap-2" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                    <span>Log Out</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer-premium text-white">
        <div class="footer-inner container py-5">
            <div class="row g-5">

                <!-- Col 1: Brand Info -->
                <div class="col-lg-4 col-md-12">
                    <h4 class="footer-brand-title">Tasty Food</h4>
                    <p class="footer-desc">
                        {{ $settings['footer_desc'] ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.' }}
                    </p>
                    <div class="d-flex gap-3 mt-4">
                        @if(!empty($settings['contact_facebook']))
                            <a href="{{ $settings['contact_facebook'] }}" target="_blank" class="footer-social-btn fb" title="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        @else
                            <a href="#" class="footer-social-btn fb" title="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        @endif
                        @if(!empty($settings['contact_twitter']))
                            <a href="{{ $settings['contact_twitter'] }}" target="_blank" class="footer-social-btn tw" title="Twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                        @else
                            <a href="#" class="footer-social-btn tw" title="Twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                        @endif
                        @if(!empty($settings['contact_instagram']))
                            <a href="{{ $settings['contact_instagram'] }}" target="_blank" class="footer-social-btn ig" title="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                        @else
                            <a href="#" class="footer-social-btn ig" title="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Col 2: Useful Links -->
                <div class="col-lg-2 col-md-4 col-6">
                    <h5 class="footer-col-title">Useful Links</h5>
                    <ul class="list-unstyled footer-link-list">
                        @for($i = 1; $i <= 4; $i++)
                            @if(!empty($settings['footer_useful_link_'.$i.'_name']))
                                <li>
                                    <a href="{{ $settings['footer_useful_link_'.$i.'_url'] ?? '#' }}" class="footer-nav-link">
                                        {{ $settings['footer_useful_link_'.$i.'_name'] }}
                                    </a>
                                </li>
                            @else
                                @php
                                    $defaults = ['Blog', 'Hewan', 'Galeri', 'Testimonial'];
                                    $defaultUrls = [route('berita'), '#', route('galeri'), '#'];
                                @endphp
                                <li><a href="{{ $defaultUrls[$i-1] }}" class="footer-nav-link">{{ $defaults[$i-1] }}</a></li>
                            @endif
                        @endfor
                    </ul>
                </div>

                <!-- Col 3: Privacy Links -->
                <div class="col-lg-2 col-md-4 col-6">
                    <h5 class="footer-col-title">Privacy</h5>
                    <ul class="list-unstyled footer-link-list">
                        @for($i = 1; $i <= 4; $i++)
                            @if(!empty($settings['footer_privacy_link_'.$i.'_name']))
                                <li>
                                    <a href="{{ $settings['footer_privacy_link_'.$i.'_url'] ?? '#' }}" class="footer-nav-link">
                                        {{ $settings['footer_privacy_link_'.$i.'_name'] }}
                                    </a>
                                </li>
                            @else
                                @php
                                    $privDefaults = ['Karir', 'Tentang Kami', 'Kontak Kami', 'Servis'];
                                    $privUrls = ['#', route('tentang'), route('kontak'), '#'];
                                @endphp
                                <li><a href="{{ $privUrls[$i-1] }}" class="footer-nav-link">{{ $privDefaults[$i-1] }}</a></li>
                            @endif
                        @endfor
                    </ul>
                </div>

                <!-- Col 4: Contact Info -->
                <div class="col-lg-4 col-md-4 col-12">
                    <h5 class="footer-col-title">Contact Info</h5>
                    <ul class="list-unstyled footer-contact-list">
                        <li>
                            <a href="mailto:{{ $settings['contact_email'] ?? 'tastyfood@gmail.com' }}" class="d-flex align-items-center gap-3 text-decoration-none text-reset w-100">
                                <span class="footer-contact-icon"><i class="fas fa-envelope"></i></span>
                                <span>{{ $settings['contact_email'] ?? 'tastyfood@gmail.com' }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="tel:{{ str_replace([' ', '-'], '', $settings['contact_phone'] ?? '+62 812 3456 7890') }}" class="d-flex align-items-center gap-3 text-decoration-none text-reset w-100">
                                <span class="footer-contact-icon"><i class="fas fa-phone"></i></span>
                                <span>{{ $settings['contact_phone'] ?? '+62 812 3456 7890' }}</span>
                            </a>
                        </li>
                        <li class="align-items-start">
                            <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($settings['contact_address'] ?? 'Kota Bandung, Jawa Barat') }}" target="_blank" class="d-flex align-items-start gap-3 text-decoration-none text-reset w-100">
                                <span class="footer-contact-icon mt-1"><i class="fas fa-map-marker-alt"></i></span>
                                <span>{{ $settings['contact_address'] ?? 'Kota Bandung, Jawa Barat' }}</span>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>

            <!-- Footer Bottom Bar -->
            <div class="footer-bottom-bar mt-5 pt-4">
                <p class="mb-0">Copyright &copy; {{ date('Y') }} <strong>Tasty Food</strong>. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AI Chatbot Floating Widget -->
    <div class="chatbot-wrapper z-3">
        <!-- Chatbot Button -->
        <button id="chatbot-toggle-btn" class="btn chatbot-trigger shadow-lg d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-robot text-white fs-4"></i>
            <span class="chatbot-badge">AI</span>
        </button>

        <!-- Chat Window -->
        <div id="chatbot-window" class="chatbot-window shadow-2xl d-none flex-column">
            <!-- Header -->
            <div class="chatbot-header d-flex align-items-center justify-content-between p-3 bg-black text-white">
                <div class="d-flex align-items-center gap-2">
                    <div class="bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center animate-bounce" style="width: 38px; height: 38px;">
                        <i class="fa-solid fa-robot"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-0 text-uppercase" style="font-size: 0.85rem; letter-spacing: 0.5px;">TastyAI Chatbot</h6>
                        <small class="text-secondary-light" style="font-size: 0.72rem; color: #a0a0a0;">Online • Asisten Kuliner</small>
                    </div>
                </div>
                <button id="chatbot-close-btn" class="btn text-white p-0 border-0 bg-transparent">
                    <i class="fa-solid fa-xmark fs-5"></i>
                </button>
            </div>

            <!-- Messages Body -->
            <div id="chatbot-body" class="chatbot-body p-3 flex-grow-1 overflow-y-auto bg-light">
                <div class="chat-message bot mb-3">
                    <div class="chat-bubble p-3 rounded-4 shadow-sm" style="background-color: #e5a93c; color: #000;">
                        Halo! Saya <strong>TastyAI</strong>, asisten kuliner Anda. Ada yang bisa saya bantu mengenai Tasty Food hari ini? 🍲
                    </div>
                </div>
                
                <!-- Quick Options -->
                <div class="d-flex flex-wrap gap-2 mb-3 quick-suggestions">
                    <button class="btn btn-outline-dark btn-sm rounded-pill py-1 px-3 quick-opt" data-query="Rekomendasi Makanan">Rekomendasi Makanan</button>
                    <button class="btn btn-outline-dark btn-sm rounded-pill py-1 px-3 quick-opt" data-query="Lokasi Tasty Food">Lokasi Resto</button>
                    <button class="btn btn-outline-dark btn-sm rounded-pill py-1 px-3 quick-opt" data-query="Hubungi Kontak">Hubungi Kontak</button>
                    <button class="btn btn-outline-dark btn-sm rounded-pill py-1 px-3 quick-opt" data-query="Tentang Tasty Food">Tentang Resto</button>
                </div>
            </div>

            <!-- Input Footer -->
            <div class="chatbot-footer p-3 border-top bg-white">
                <form id="chatbot-form" class="d-flex gap-2">
                    <input type="text" id="chatbot-input" class="form-control rounded-pill px-3 py-2 border" placeholder="Tulis pesan Anda..." style="font-size: 0.88rem;" required autocomplete="off">
                    <button type="submit" class="btn btn-dark rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; min-width: 40px;">
                        <i class="fa-solid fa-paper-plane text-white" style="font-size: 0.85rem;"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('chatbot-toggle-btn');
            const closeBtn = document.getElementById('chatbot-close-btn');
            const chatbotWindow = document.getElementById('chatbot-window');
            const chatbotForm = document.getElementById('chatbot-form');
            const chatbotInput = document.getElementById('chatbot-input');
            const chatbotBody = document.getElementById('chatbot-body');

            // Toggle Chat Window
            toggleBtn.addEventListener('click', () => {
                if (chatbotWindow.classList.contains('d-none')) {
                    chatbotWindow.classList.remove('d-none');
                    chatbotWindow.classList.add('d-flex');
                    chatbotBody.scrollTop = chatbotBody.scrollHeight;
                } else {
                    chatbotWindow.classList.remove('d-flex');
                    chatbotWindow.classList.add('d-none');
                }
            });

            closeBtn.addEventListener('click', () => {
                chatbotWindow.classList.remove('d-flex');
                chatbotWindow.classList.add('d-none');
            });

            // Quick Suggestions click
            document.addEventListener('click', function(e) {
                if (e.target && e.target.classList.contains('quick-opt')) {
                    const query = e.target.getAttribute('data-query');
                    sendUserMessage(query);
                }
            });

            chatbotForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const message = chatbotInput.value.trim();
                if (message) {
                    sendUserMessage(message);
                    chatbotInput.value = '';
                }
            });

            function sendUserMessage(message) {
                // Remove quick suggestions if they exist
                const suggestions = chatbotBody.querySelector('.quick-suggestions');
                if (suggestions) {
                    suggestions.remove();
                }

                // Append User Message
                appendMessage(message, 'user');
                
                // Show Typing Indicator
                showTypingIndicator();

                // Simulate Bot response after 1 second
                setTimeout(() => {
                    removeTypingIndicator();
                    const reply = getBotResponse(message);
                    appendMessage(reply, 'bot');
                }, 1000);
            }

            function appendMessage(text, sender) {
                const messageDiv = document.createElement('div');
                messageDiv.className = `chat-message ${sender} mb-3`;
                
                const bubbleDiv = document.createElement('div');
                bubbleDiv.className = `chat-bubble p-3 rounded-4 shadow-sm`;
                
                if (sender === 'bot') {
                    bubbleDiv.style.backgroundColor = '#e5a93c';
                    bubbleDiv.style.color = '#000';
                } else {
                    bubbleDiv.style.backgroundColor = '#000';
                    bubbleDiv.style.color = '#fff';
                }
                
                // Format bold text
                bubbleDiv.innerHTML = formatMarkdown(text);
                
                messageDiv.appendChild(bubbleDiv);
                
                // Append before quick suggestions if they exist
                const suggestions = chatbotBody.querySelector('.quick-suggestions');
                if (suggestions && sender === 'user') {
                    chatbotBody.insertBefore(messageDiv, suggestions);
                } else {
                    chatbotBody.appendChild(messageDiv);
                }
                
                chatbotBody.scrollTop = chatbotBody.scrollHeight;
            }

            function showTypingIndicator() {
                const indicatorDiv = document.createElement('div');
                indicatorDiv.id = 'typing-indicator-wrapper';
                indicatorDiv.className = 'chat-message bot mb-3';
                indicatorDiv.innerHTML = `
                    <div class="typing-indicator">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                `;
                
                const suggestions = chatbotBody.querySelector('.quick-suggestions');
                if (suggestions) {
                    chatbotBody.insertBefore(indicatorDiv, suggestions);
                } else {
                    chatbotBody.appendChild(indicatorDiv);
                }
                
                chatbotBody.scrollTop = chatbotBody.scrollHeight;
            }

            function removeTypingIndicator() {
                const indicator = document.getElementById('typing-indicator-wrapper');
                if (indicator) {
                    indicator.remove();
                }
            }

            function formatMarkdown(text) {
                // Basic bold markdown formatter
                return text.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
            }

            function generateRecipe(queryText) {
                const q = queryText.toLowerCase();
                let dishName = '';
                
                if (q.startsWith('resep ')) {
                    dishName = q.substring(6).trim();
                } else if (q.includes('cara membuat ')) {
                    dishName = q.substring(q.indexOf('cara membuat ') + 13).trim();
                } else if (q.includes('cara buat ')) {
                    dishName = q.substring(q.indexOf('cara buat ') + 10).trim();
                } else if (q.includes('cara memasak ')) {
                    dishName = q.substring(q.indexOf('cara memasak ') + 13).trim();
                } else if (q.includes('resep')) {
                    dishName = q.replace('resep', '').trim();
                } else {
                    dishName = q.trim();
                }

                if (!dishName) {
                    dishName = 'masakan nusantara';
                }

                // Capitalize words
                const name = dishName.split(' ').map(w => w.charAt(0).toUpperCase() + w.slice(1)).join(' ');
                
                let bahan = '';
                let cara = '';
                
                if (dishName.includes('taichan')) {
                    bahan = '500g dada ayam potong dadu, 2 siung bawang putih halus, 1 sdm air jeruk nipis, garam & merica secukupnya, tusuk sate.\n\n**Bahan Sambal:** 15 cabe rawit merah, 5 cabai keriting, 2 siung bawang putih, garam, gula, kaldu jamur, dan 1 sdm jeruk limau.';
                    cara = '1. Lumuri ayam dengan bawang putih, jeruk nipis, garam, dan merica. Diamkan 15 menit.\n2. Tusuk ayam ke tusuk sate, bakar hingga matang kecokelatan.\n3. Rebus bahan sambal, haluskan, tumis sebentar dengan sedikit air, lalu tambahkan garam, gula, kaldu, dan perasan jeruk limau.\n4. Sajikan sate taichan dengan siraman sambal pedas gurih!';
                } else if (dishName.includes('liwet')) {
                    bahan = '3 cup beras, 4 siung bawang merah iris, 2 siung bawang putih iris, 2 batang serai memarkan, 3 lembar daun salam, garam secukupnya, teri goreng, dan cabe rawit utuh.';
                    cara = '1. Cuci beras dan masukkan ke rice cooker dengan takaran air biasa.\n2. Tumis bawang merah, bawang putih, serai, dan daun salam hingga harum.\n3. Masukkan tumisan bumbu ke dalam beras, tambahkan garam, aduk rata.\n4. Masak nasi. Setelah matang, taburi teri goreng dan cabe rawit di atasnya. Siap disajikan hangat!';
                } else if (dishName.includes('nasi goreng')) {
                    bahan = '1 piring nasi dingin, 2 siung bawang putih cincang, 1 butir telur, kecap manis secukupnya, saus tiram, garam, merica, irisan daun bawang, dan cabe jika suka pedas.';
                    cara = '1. Tumis bawang putih cincang hingga harum.\n2. Masukkan telur, buat orak-arik.\n3. Masukkan nasi dingin, aduk rata.\n4. Tambahkan kecap manis, saus tiram, garam, dan merica. Aduk cepat di api besar.\n5. Taburi daun bawang dan sajikan hangat!';
                } else if (dishName.includes('bakso krispi')) {
                    bahan = '20 butir bakso sapi berkualitas, iris tipis atau belah empat bagian; 100g tepung terigu; 50g tepung maizena; 1 sdt bawang putih bubuk; 1/2 sdt merica bubuk; garam & penyedap rasa secukupnya; air es secukupnya untuk celupan; minyak goreng melimpah untuk deep frying.';
                    cara = '1. Campurkan tepung terigu, maizena, bawang putih bubuk, merica, garam, dan penyedap rasa.\n2. Ambil sebagian campuran tepung kering tersebut, beri sedikit air es untuk dijadikan adonan basah.\n3. Celupkan potongan bakso ke dalam adonan basah, lalu gulingkan ke sisa tepung kering sambil sedikit ditekan agar menempel sempurna.\n4. Panaskan minyak dalam jumlah banyak, lalu goreng bakso dengan api sedang hingga berwarna kuning keemasan dan krispi merata.\n5. Angkat, tiriskan, dan sajikan bakso krispi hangat dengan saus cocolan!';
                } else if (dishName.includes('tunjang')) {
                    bahan = '500g tunjang/kikil sapi (rebus hingga empuk), 500ml santan kental, 300ml santan encer, 2 batang serai memarkan, 2 lembar daun kunyit, 4 lembar daun jeruk, 1 asam kandis.\n\n**Bumbu Halus:** 8 siung bawang merah, 4 siung bawang putih, 10 cabai merah keriting, 2 cm jahe, 2 cm lengkuas, 1 cm kunyit bakar, 1 sdt ketumbar bubuk, garam & gula secukupnya.';
                    cara = '1. Rebus tunjang/kikil hingga benar-benar empuk, buang air rebusan pertama.\n2. Tumis bumbu halus bersama serai, daun kunyit, daun jeruk, dan asam kandis hingga harum dan matang.\n3. Masukkan santan encer dan tunjang, masak dengan api sedang sambil diaduk agar santan tidak pecah.\n4. Setelah mendidih, masukkan santan kental, garam, dan sedikit gula. Masak hingga kuah mengental dan berminyak.\n5. Angkat dan sajikan gulai tunjang hangat bersama nasi putih!';
                } else if (dishName.includes('rendang')) {
                    bahan = '500g daging sapi potong tebal, 1 liter santan (dari 2 butir kelapa), 2 batang serai memarkan, 2 lembar daun kunyit, 4 lembar daun jeruk.\n\n**Bumbu Halus:** 10 siung bawang merah, 5 siung bawang putih, 15 cabai merah keriting, 3 cm jahe, 3 cm lengkuas, 1 sdt ketumbar, 1/4 sdt pala bubuk, garam secukupnya.';
                    cara = '1. Rebus santan bersama bumbu halus, serai, daun kunyit, dan daun jeruk sambil terus diaduk hingga mengeluarkan minyak.\n2. Masukkan daging sapi, aduk rata.\n3. Masak dengan api kecil hingga air menyusut dan daging empuk (berwarna cokelat gelap).\n4. Aduk terus secara berkala agar bagian bawah tidak gosong hingga bumbu meresap sempurna. Angkat dan sajikan!';
                } else if (dishName.includes('seblak')) {
                    bahan = '1 genggam kerupuk orange (rendam air panas), 5 butir bakso iris, 2 buah sosis iris, 1 butir telur, 1 ikat caisim potong, air secukupnya, garam, gula, penyedap rasa.\n\n**Bumbu Halus:** 3 siung bawang merah, 2 siung bawang putih, 2 cm kencur, 5 cabai rawit merah.';
                    cara = '1. Tumis bumbu halus hingga harum dan matang.\n2. Masukkan telur, buat orak-arik.\n3. Tambahkan air secukupnya, biarkan mendidih.\n4. Masukkan bakso, sosis, kerupuk yang sudah lunak, dan sayuran.\n5. Tambahkan garam, gula, dan penyedap rasa. Masak hingga bumbu meresap dan kuah mengental. Sajikan hangat!';
                } else if (dishName.includes('pempek')) {
                    bahan = '500g daging ikan tenggiri giling, 350g tepung sagu/tapioka, 1 sdm garam, 1 sdt penyedap rasa, 250ml air es.\n\n**Bahan Kuah Cuko:** 500g gula merah aren, 500ml air, 10 cabai rawit (haluskan), 5 siung bawang putih (haluskan), 2 sdm asam jawa, 1 sdt garam.';
                    cara = '1. Campur ikan giling dengan air es, garam, dan penyedap hingga lengket. Masukkan sagu bertahap, aduk perlahan jangan diuleni terlalu kuat agar tidak keras.\n2. Bentuk adonan pempek (lenjer atau kapal selam dengan isian telur).\n3. Rebus pempek dalam air mendidih yang diberi sedikit minyak hingga mengapung, angkat dan tiriskan.\n4. Buat kuah cuko dengan merebus gula merah, air, bumbu halus, asam jawa, dan garam hingga mendidih dan mengental, lalu saring.\n5. Goreng pempek dan sajikan bersama kuah cuko!';
                } else if (dishName.includes('martabak')) {
                    bahan = '250g tepung terigu protein sedang, 300ml air, 3 sdm gula pasir, 1 butir telur, 1/2 sdt baking powder, 1/2 sdt soda kue, margarin untuk olesan.\n\n**Toping:** Susu kental manis, keju parut, meses cokelat, kacang tanah sangrai.';
                    cara = '1. Campur terigu, gula, baking powder, telur, dan air. Kocok rata hingga licin. Diamkan adonan selama 1 jam.\n2. Sesaat sebelum dipanggang, masukkan soda kue yang dilarutkan dengan sedikit air, aduk rata.\n3. Tuang ke teflon yang sudah dipanaskan dengan api kecil. Biarkan hingga bersarang/berlubang.\n4. Taburi sedikit gula pasir di atasnya, lalu tutup teflon hingga permukaan matang kering.\n5. Angkat, olesi margarin selagi panas, beri toping keju/cokelat/susu, lipat dua, potong-potong, dan sajikan!';
                } else if (dishName.includes('mie')) {
                    bahan = '1 bungkus mie telur (rebus setengah matang), 2 siung bawang putih cincang, 1 butir telur, irisan kol & caisim, 3 sdm kecap manis, 1 sdm saus tiram, garam, merica, minyak goreng.';
                    cara = '1. Tumis bawang putih cincang hingga harum.\n2. Masukkan telur, orak-arik.\n3. Masukkan kol, caisim, dan bakso/sosis jika ada.\n4. Masukkan mie telur, tambahkan kecap manis, saus tiram, garam, dan merica.\n5. Aduk merata di atas api besar hingga matang dan bumbu meresap. Sajikan hangat!';
                } else if (dishName.includes('bakso')) {
                    bahan = '500g bakso sapi siap pakai, 1.5 liter air kaldu tulang sapi, 5 siung bawang putih goreng (haluskan), 5 siung bawang merah goreng (haluskan), daun seledri & daun bawang iris, garam, gula, merica bubuk.\n\n**Pelengkap:** Mie kuning, bihun, kecap, saus, sambal.';
                    cara = '1. Didihkan air kaldu tulang sapi di panci.\n2. Masukkan bumbu halus (bawang putih dan merah goreng), garam, gula, dan merica kuah kaldu.\n3. Masukkan bakso sapi ke kuah mendidih, masak hingga bakso mengapung dan mekar.\n4. Susun mie, bihun, seledri, dan daun bawang di mangkok saji.\n5. Siram dengan kuah panas beserta baksonya. Sajikan hangat dengan sambal dan kecap!';
                } else if (dishName.includes('sop buah') || dishName.includes('es buah') || dishName.includes('sup buah')) {
                    bahan = 'Aneka buah segar sesuai selera (alpukat, melon, semangka, mangga, strawberry, kelapa muda), 200g kolang-kaling rebus, 1 sdm biji selasih (rendam air hangat), 100ml sirup cocopandan merah, 200ml susu kental manis putih, es batu/es serut secukupnya, air matang secukupnya.';
                    cara = '1. Potong dadu semua buah-buahan segar pilihan sesuai selera.\n2. Siapkan wadah/mangkuk besar, lalu tata potongan buah, kolang-kaling, dan biji selasih di dalamnya.\n3. Masukkan air matang secukupnya, lalu tambahkan susu kental manis dan sirup cocopandan merah sesuai tingkat kemanisan yang diinginkan.\n4. Tambahkan es batu atau es serut melimpah di atasnya.\n5. Aduk hingga dingin merata, dan sop buah manis segar siap disajikan selagi dingin!';
                } else if (dishName.includes('es teler') || dishName.includes('es campur')) {
                    bahan = '1 buah alpukat matang keruk, 100g kelapa muda keruk, 100g nangka potong dadu, cincau hitam potong dadu, kolang-kaling iris tipis, air kelapa muda secukupnya, susu kental manis, sirup gula pasir, es batu.';
                    cara = '1. Tata buah alpukat, kelapa muda, nangka, cincau hitam, dan kolang-kaling di dalam mangkuk saji.\n2. Tuang air kelapa muda dan sirup gula pasir secukupnya.\n3. Tambahkan es batu sesuai selera.\n4. Kucuri susu kental manis putih di atasnya.\n5. Sajikan dingin dan segera nikmati!';
                } else if (dishName.includes('sop duren') || dishName.includes('es duren') || dishName.includes('sop durian') || dishName.includes('es durian') || dishName.includes('durian') || dishName.includes('duren')) {
                    bahan = '500g daging buah durian matang manis, 100ml susu cair full cream, 3 sdm krimer bubuk (larutkan dengan 50ml air hangat), 100ml susu kental manis putih, es batu atau es serut secukupnya.\n\n**Bahan Toping (opsional):** Keju cheddar parut, ketan hitam matang, daging kelapa muda, atau potongan roti tawar.';
                    cara = '1. Blender sebagian daging durian bersama susu cair full cream dan larutan krimer hingga lembut dan kental menjadi saus durian. Sisakan sebagian daging durian utuh.\n2. Siapkan wadah atau mangkuk saji, lalu letakkan es serut atau es batu di dalamnya.\n3. Tuangkan saus durian kental yang telah diblender di atas es batu secara merata.\n4. Tata sisa daging durian utuh dan bahan toping pilihan (kelapa muda, ketan hitam, roti tawar) di atasnya.\n5. Kucuri dengan susu kental manis putih sesuai selera, lalu taburi dengan parutan keju cheddar melimpah. Sajikan selagi dingin!';
                } else {
                    const isSweetOrDessert = dishName.includes('buah') || dishName.includes('duren') || dishName.includes('durian') || 
                                             dishName.includes('pisang') || dishName.includes('mangga') || dishName.includes('alpukat') || 
                                             dishName.includes('melon') || dishName.includes('kelapa') || dishName.includes('nangka') || 
                                             dishName.includes('cincau') || dishName.includes('cendol') || dishName.includes('dawet') || 
                                             dishName.includes('kolak') || dishName.includes('es ') || dishName.includes('teler') || 
                                             dishName.includes('campur') || dishName.includes('ketan') || dishName.includes('manis') || 
                                             dishName.includes('madu') || dishName.includes('jus ') || dishName.includes('juice') || 
                                             dishName.includes('ice');

                    const isPasta = dishName.includes('pasta') || dishName.includes('spaghetti') || dishName.includes('macaroni') || dishName.includes('fettuccine') || dishName.includes('lasagna') || dishName.includes('carbonara') || dishName.includes('bolognese');
                    const isPizza = dishName.includes('pizza');
                    const isBurger = dishName.includes('burger') || dishName.includes('sandwich') || dishName.includes('hotdog');
                    const isSushi = dishName.includes('sushi') || dishName.includes('kimbap');
                    const isRamen = dishName.includes('ramen') || dishName.includes('udon') || dishName.includes('soba');
                    const isSteak = dishName.includes('steak') || dishName.includes('bistik');
                    const isKebab = dishName.includes('kebab') || dishName.includes('shawarma');
                    const isDimsum = dishName.includes('dimsum') || dishName.includes('siomay') || dishName.includes('pangsit') || dishName.includes('dumpling') || dishName.includes('gyoza');
                    const isTaco = dishName.includes('taco') || dishName.includes('burrito') || dishName.includes('quesadilla') || dishName.includes('nachos');
                    const isBaking = dishName.includes('cake') || dishName.includes('kue') || dishName.includes('bolu') || dishName.includes('roti') || dishName.includes('donat') || dishName.includes('cookie') || dishName.includes('muffin') || dishName.includes('pancake') || dishName.includes('waffle') || dishName.includes('pie') || dishName.includes('brownies');

                    const isSate = dishName.includes('sate');
                    const isSoto = dishName.includes('soto');
                    const isNasi = dishName.includes('nasi');
                    const isAyam = dishName.includes('ayam');
                    const isDaging = dishName.includes('daging');
                    const isSup = (dishName.includes('sup') || dishName.includes('sop')) && !isSweetOrDessert;
                    const isGoreng = dishName.includes('goreng');
                    const isBakar = dishName.includes('bakar') || dishName.includes('panggang');
                    const isTumis = dishName.includes('tumis') || dishName.includes('cah');
                    const isGulai = dishName.includes('gulai') || dishName.includes('kari') || dishName.includes('opor');
                    const isKuah = dishName.includes('kuah') || dishName.includes('rebus') || dishName.includes('sayur');
                    
                    if (isPasta) {
                        bahan = `Bahan utama (${dishName}), pasta pilihan (spaghetti/fettuccine), 2 siung bawang putih cincang, 1/2 buah bawang bombay cincang, 100ml krim segar atau susu cair, keju parut (parmesan/cheddar), garam, merica bubuk, oregano, dan minyak zaitun/margarin.`;
                        cara = `1. Rebus pasta dalam air mendidih yang diberi sedikit garam hingga al dente, tiriskan.\n2. Tumis bawang putih cincang dan bawang bombay dengan margarin/minyak zaitun hingga wangi.\n3. Masukkan bahan utama (${dishName}), tumis sebentar hingga matang.\n4. Tuangkan susu cair atau krim segar, aduk rata. Tambahkan keju parut, garam, merica, dan oregano.\n5. Masukkan pasta rebus, aduk cepat hingga saus mengental dan menyelimuti pasta. Angkat dan sajikan hangat!`;
                    } else if (isPizza) {
                        bahan = `Adonan roti pizza siap pakai atau buatan sendiri, bahan utama (${dishName}), saus tomat/saus bolognese, keju mozzarella parut, bawang bombay iris, paprika, dan sedikit oregano.`;
                        cara = `1. Siapkan adonan roti pizza di atas loyang bulat, tusuk-tusuk permukaannya dengan garpu.\n2. Olesi permukaan roti pizza dengan saus tomat atau saus bolognese secara merata.\n3. Susun merata bahan utama (${dishName}), potongan bawang bombay, dan paprika di atas saus.\n4. Taburi keju mozzarella parut dan taburan oregano kering.\n5. Panggang dalam oven bersuhu 200°C selama 15-20 menit hingga roti matang kecokelatan dan keju meleleh sempurna. Sajikan hangat!`;
                    } else if (isBurger) {
                        bahan = `Roti bun burger (belah dua), patty daging burger (sapi/ayam), bahan utama tambahan (${dishName}), keju lembaran (cheddar), irisan tomat, mentimun, selada segar, saus sambal/tomat, dan mayones.`;
                        cara = `1. Panggang sebentar permukaan belahan roti bun burger di atas wajan teflon dengan sedikit mentega.\n2. Masak patty daging dengan api sedang hingga matang merata di kedua sisi.\n3. Susun di atas roti bun bawah: daun selada, irisan mentimun, tomat, patty daging hangat, dan selembar keju cheddar di atasnya agar sedikit meleleh.\n4. Tambahkan bahan utama (${dishName}), mayones, serta saus pilihan Anda.\n5. Tutup dengan roti bun bagian atas, burger siap dinikmati!`;
                    } else if (isSushi) {
                        bahan = `Nasi putih pulen khusus sushi (diberi sedikit cuka sushi, gula, dan garam), lembaran nori (rumput laut kering), bahan utama (${dishName} seperti salmon/kepiting stik), mentimun iris memanjang, mayones, kecap asin (shoyu), dan wasabi.`;
                        cara = `1. Bentangkan selembar nori di atas penggulung sushi (bamboo mat), ratakan nasi sushi hangat di atasnya (sisakan 1 cm di ujung nori).\n2. Susun bahan utama (${dishName}) dan irisan mentimun secara memanjang di tengah nasi.\n3. Gulung sushi secara perlahan sambil dipadatkan menggunakan tikar penggulung.\n4. Potong gulungan sushi menjadi 6-8 bagian menggunakan pisau tajam yang dibasahi air.\n5. Sajikan sushi bersama kecap asin and wasabi cocolan!`;
                    } else if (isRamen) {
                        bahan = `Mie ramen atau udon, air kaldu gurih (kaldu shoyu/miso/tulang), bahan utama (${dishName}), telur rebus setengah matang (belah dua), irisan daun bawang, nori lembaran, dan wijen sangrai.`;
                        cara = `1. Rebus mie ramen/udon hingga matang al dente, angkat dan tiriskan di mangkuk saji.\n2. Didihkan air kaldu gurih bersama bumbu shoyu atau miso hingga mendidih dan wangi.\n3. Masak bahan utama (${dishName}) secara terpisah hingga matang sempurna.\n4. Tuangkan kuah kaldu ramen mendidih ke mangkuk berisi mie.\n5. Tata bahan utama, telur rebus setengah matang, nori, dan irisan daun bawang di atas mie. Sajikan selagi panas!`;
                    } else if (isSteak) {
                        bahan = `Daging steak pilihan (${dishName} seperti sirloin/ribeye), 2 siung bawang putih digeprek, rosemary segar (opsional), 2 sdm mentega, garam kasar (sea salt), merica hitam ulek kasar, saus steak (lada hitam/barbeque).`;
                        cara = `1. Keringkan daging steak dengan tisu dapur, lumuri kedua sisinya dengan garam kasar dan merica hitam ulek secara merata. Diamkan 10 menit.\n2. Panaskan wajan anti lengket (cast iron) dengan sedikit minyak hingga sangat panas/berasap.\n3. Letakkan daging steak di wajan, masak 2-3 menit per sisi untuk tingkat kematangan medium.\n4. Masukkan mentega, bawang putih geprek, dan rosemary ke wajan. Siramkan mentega cair ke permukaan steak (basting) secara berkala selama 1 menit.\n5. Angkat dan istirahatkan steak selama 5 menit sebelum dipotong agar jus daging tidak terbuang. Sajikan dengan saus pilihan!`;
                    } else if (isKebab) {
                        bahan = `Kulit tortilla/kebab siap pakai, bahan utama (${dishName} seperti daging sapi/ayam iris tipis), bawang bombay iris, selada segar, tomat iris, saus sambal, saus tomat, dan mayones.`;
                        cara = `1. Tumis bahan utama (${dishName}) dengan sedikit mentega hingga matang kecokelatan.\n2. Panaskan sebentar kulit tortilla di atas teflon tanpa minyak hingga agak lentur.\n3. Letakkan kulit tortilla di atas piring rata, susun selada, tomat, bawang bombay, dan daging di tengahnya.\n4. Tuangkan saus sambal, saus tomat, dan mayones sesuai selera.\n5. Gulung kulit tortilla dengan rapi, lalu panggang sebentar di teflon dengan sedikit mentega hingga kecokelatan. Sajikan hangat!`;
                    } else if (isDimsum) {
                        bahan = `Kulit pangsit/dimsum siap pakai, bahan utama (${dishName} seperti ayam giling dan udang cincang), 1 butir telur, 2 sdm tepung tapioka, 1 batang daun bawang iris halus, 1 sdm minyak wijen, 1 sdm saus tiram, garam, gula, dan merica.`;
                        cara = `1. Campurkan daging giling, udang cincang, telur, tepung tapioka, daun bawang, minyak wijen, saus tiram, garam, gula, dan merica hingga menjadi adonan rata.\n2. Ambil selembar kulit pangsit, letakkan 1 sendok makan adonan isi di tengahnya.\n3. Lipat pinggiran kulit ke atas secara melingkar dan rapikan agar merekat sempurna.\n4. Kukus dimsum dalam panci kukusan panas selama 15-20 menit hingga matang sempurna.\n5. Sajikan hangat dengan cocolan saus sambal asam manis!`;
                    } else if (isTaco) {
                        bahan = `Kulit taco shell (crispy) atau kulit tortilla kecil (soft), bahan utama (${dishName} seperti daging cincang berbumbu taco), bawang bombay cincang, tomat dadu, parutan keju cheddar, selada iris tipis, dan saus salsa segar.`;
                        cara = `1. Tumis daging cincang dan bawang bombay dengan bubuk jinten, cabai bubuk, garam, dan merica hingga matang.\n2. Siapkan kulit taco shell atau tortilla.\n3. Tata tumisan daging cincang hangat di bagian dalam kulit taco.\n4. Tambahkan potongan tomat segar, selada iris, dan siraman saus salsa.\n5. Taburi parutan keju cheddar di atasnya. Taco siap dinikmati segera!`;
                    } else if (isBaking) {
                        bahan = `Bahan utama (${dishName}), 250g tepung terigu protein sedang, 150g gula pasir, 2 butir telur, 100g mentega cair, 1 sdt baking powder, 1/2 sdt vanila bubuk, susu cair secukupnya.`;
                        cara = `1. Kocok telur dan gula pasir hingga mengembang dan berwarna putih pucat.\n2. Masukkan tepung terigu, vanila, dan baking powder yang sudah diayak secara bertahap.\n3. Tuangkan mentega cair dan susu cair sedikit demi sedikit sambil diaduk perlahan hingga adonan tercampur rata.\n4. Masukkan bahan utama (${dishName}) sebagai isian atau perasa adonan.\n5. Tuang adonan ke dalam cetakan/loyang yang sudah diolesi margarin, lalu panggang dalam oven bersuhu 180°C selama 25-30 menit hingga matang kecokelatan. Sajikan dingin!`;
                    } else if (isSweetOrDessert) {
                        bahan = `Bahan utama (${dishName}), susu cair/santan secukupnya, gula pasir/gula merah sesuai selera, es batu atau es serut, dan bahan pelengkap segar pilihan (seperti kelapa muda, nangka, atau biji selasih).`;
                        cara = `1. Siapkan bahan utama (${dishName}), cuci bersih dan potong/keruk sesuai selera.\n2. Tata potongan bahan utama tersebut ke dalam mangkuk atau gelas saji.\n3. Tuangkan air matang, susu cair, santan rebus, atau air kelapa muda secukupnya.\n4. Tambahkan pemanis berupa sirup (cocopandan/gula cair) dan susu kental manis sesuai selera.\n5. Beri es batu atau es serut melimpah di atasnya. Aduk rata dan sajikan selagi dingin segar!`;
                    } else if (isSate) {
                        const sateType = dishName.replace('sate', '').trim();
                        bahan = `500g daging ${sateType || 'ayam/sapi'} potong dadu, tusuk sate secukupnya, 3 siung bawang putih, 1 sdt ketumbar bubuk, 3 sdm kecap manis, 1 sdm air asam jawa, garam & merica.\n\n**Bahan Bumbu:** Kacang tanah goreng dihaluskan, bawang merah, bawang putih, cabai, kecap manis, dan sedikit air hangat.`;
                        cara = `1. Rendam potongan daging dengan bumbu halus (bawang putih, ketumbar, garam, merica) dan kecap manis selama 20 menit.\n2. Tusuk daging pada tusuk sate.\n3. Bakar sate di atas panggangan hingga matang merata sambil sesekali diolesi sisa bumbu.\n4. Sajikan sate hangat dengan siraman bumbu kacang atau sambal kecap pilihan Anda!`;
                    } else if (isSoto) {
                        const sotoType = dishName.replace('soto', '').trim();
                        bahan = `500g bahan utama (${sotoType || 'ayam/daging'}), 1.2 liter air, 2 batang serai memarkan, 3 lembar daun jeruk, 1 lembar daun salam, daun bawang & seledri iris.\n\n**Bumbu Halus Kuah:** 5 siung bawang merah, 3 siung bawang putih, 2 butir kemiri sangrai, 1 cm kunyit, 1 cm jahe, garam, gula & merica.`;
                        cara = `1. Rebus bahan utama hingga matang dan empuk, tiriskan lalu suwir atau potong sesuai selera.\n2. Tumis bumbu halus bersama serai, daun jeruk, dan daun salam hingga harum.\n3. Masukkan tumisan bumbu ke dalam air kaldu rebusan, aduk rata and didihkan kembali.\n4. Susun suwiran bahan di mangkok, tuangkan kuah soto panas, taburi daun bawang dan bawang goreng. Siap dinikmati!`;
                    } else if (isSup) {
                        const supType = dishName.replace('sup', '').replace('sop', '').trim();
                        bahan = `Bahan utama (${supType || 'sayur/daging'}), 1 liter air kaldu, 1 buah wortel potong bulat, 1 buah kentang potong dadu, seledri, daun bawang.\n\n**Bumbu Kuah:** 3 siung bawang putih memarkan, 1/2 siung bawang bombay iris, 1/2 sdt pala bubuk, garam, gula, dan merica bubuk.`;
                        cara = `1. Rebus bahan utama dalam air hingga empuk.\n2. Tumis bawang putih dan bawang bombay dengan sedikit margarin hingga harum.\n3. Masukkan tumisan bumbu ke kuah rebusan.\n4. Masukkan wortel dan kentang, masak hingga empuk.\n5. Tambahkan pala bubuk, garam, gula, merica, lalu seledri dan daun bawang. Angkat dan sajikan selagi hangat!`;
                    } else if (isGoreng) {
                        bahan = `Bahan utama (${dishName}), 3 siung bawang putih, 4 siung bawang merah, cabai secukupnya, garam, merica, penyedap rasa, dan minyak goreng.`;
                        cara = `1. Bersihkan bahan utama (${dishName}) dan bumbui dengan sedikit garam/merica.\n2. Haluskan bawang putih, bawang merah, dan cabai.\n3. Panaskan minyak goreng secukupnya di wajan.\n4. Tumis bumbu halus hingga wangi, lalu masukkan bahan utama.\n5. Masak hingga matang kecokelatan dan kering/meresap. Sajikan selagi hangat!`;
                    } else if (isBakar) {
                        bahan = `Bahan utama (${dishName}), 3 siung bawang putih, 4 siung bawang merah, ketumbar bubuk, 3 sdm kecap manis, margarin/minyak untuk olesan, garam & merica.`;
                        cara = `1. Bersihkan bahan utama (${dishName}), lalu lumuri dengan bumbu halus (bawang putih, bawang merah, ketumbar, garam, merica) dan kecap manis. Diamkan 15 menit agar meresap.\n2. Panaskan alat pemanggang/teflon dan beri sedikit margarin.\n3. Panggang di atas api sedang sambil sesekali diolesi sisa bumbu kecap.\n4. Balik hingga kedua sisi matang merata dan berwarna kecokelatan.\n5. Angkat dan hidangkan bersama sambal kecap!`;
                    } else if (isTumis) {
                        bahan = `Bahan utama (${dishName}), 3 siung bawang putih iris tipis, 4 siung bawang merah iris, cabai iris sesuai selera, 1 sdm saus tiram, garam, merica, dan sedikit air.`;
                        cara = `1. Cuci bersih dan potong-potong bahan utama (${dishName}) sesuai selera.\n2. Panaskan 2 sdm minyak, tumis irisan bawang putih, bawang merah, dan cabai hingga layu dan harum.\n3. Masukkan bahan utama, aduk cepat hingga tercampur rata.\n4. Tambahkan saus tiram, garam, merica, dan tuang sedikit air.\n5. Masak sebentar hingga bahan layu/matang dan bumbu meresap. Angkat dan sajikan!`;
                    } else if (isGulai) {
                        bahan = `Bahan utama (${dishName}), 400ml santan kental, 200ml santan encer, 1 batang serai memarkan, 2 lembar daun jeruk, 1 lembar daun salam.\n\n**Bumbu Halus:** 5 siung bawang merah, 3 siung bawang putih, 2 cm kunyit, 1 cm jahe, 1 sdt ketumbar, garam & gula.`;
                        cara = `1. Tumis bumbu halus bersama serai, daun jeruk, dan daun salam hingga harum.\n2. Masukkan bahan utama (${dishName}), aduk hingga berubah warna.\n3. Tuangkan santan encer terlebih dahulu, masak hingga mendidih dan bahan empuk.\n4. Tambahkan santan kental, garam, dan gula secukupnya. Masak dengan api kecil sambil diaduk perlahan agar santan tidak pecah.\n5. Setelah kuah mengental dan matang sempurna, angkat dan sajikan!`;
                    } else if (isKuah) {
                        bahan = `Bahan utama (${dishName}), 1 liter air/kaldu, 3 siung bawang putih memarkan, 1 batang daun bawang iris, garam, gula, dan merica bubuk.`;
                        cara = `1. Rebus air/kaldu hingga mendidih.\n2. Masukkan bahan utama (${dishName}) yang sudah dipotong-potong, rebus hingga empuk.\n3. Masukkan bawang putih yang dimemarkan/ditumis sebentar ke dalam kuah.\n4. Tambahkan garam, gula, merica bubuk, dan daun bawang.\n5. Didihkan beberapa saat hingga semua bahan matang merata. Sajikan kuah hangat!`;
                    } else {
                        // General dynamic fallback recipe
                        bahan = `Bahan utama (${dishName}), 3 siung bawang putih, 5 siung bawang merah, cabai sesuai selera, garam, gula, penyedap rasa, air secukupnya, dan minyak goreng.`;
                        cara = `1. Siapkan bahan utama (${dishName}), cuci bersih dan potong sesuai selera.\n2. Tumis bumbu halus (bawang putih, bawang merah, cabai) hingga harum.\n3. Masukkan bahan utama, aduk merata hingga berubah warna.\n4. Tambahkan sedikit air, garam, gula, dan penyedap rasa.\n5. Masak dengan api sedang hingga air menyusut dan bahan matang merata. Angkat dan sajikan!`;
                    }
                }
                
                return `Berikut adalah resep **${name}** ala Tasty Food:\n\n**Bahan-bahan:**\n${bahan}\n\n**Cara Membuat:**\n${cara}`;
            }

            function getBotResponse(query) {
                const q = query.toLowerCase();
                
                // Cek apakah pertanyaan relevan dengan makanan, resep, atau informasi Tasty Food
                const isFood = q.includes('rekomendasi') || q.includes('makan') || q.includes('menu') || q.includes('hidangan') || 
                               q.includes('nasi') || q.includes('rendang') || q.includes('sate') || q.includes('ayam') || q.includes('daging') ||
                               q.includes('taichan') || q.includes('bakso') || q.includes('soto') || q.includes('sup') || q.includes('sop') || q.includes('mie') || q.includes('pizza');
                
                const isRecipe = q.includes('resep') || q.includes('masak') || q.includes('cara buat') || q.includes('cara membuat') || 
                                 q.includes('bahan') || q.includes('bumbu') || q.includes('liwet');
                                 
                const isRestoInfo = q.includes('lokasi') || q.includes('alamat') || q.includes('dimana') || q.includes('resto') || q.includes('tempat') ||
                                    q.includes('kontak') || q.includes('hubungi') || q.includes('email') || q.includes('telepon') || q.includes('nomor') ||
                                    q.includes('tentang') || q.includes('sejarah') || q.includes('tasty food') || q.includes('tastyfood') ||
                                    q.includes('halo') || q.includes('hai') || q.includes('pagi') || q.includes('siang') || q.includes('sore') || q.includes('malam') || q.includes('hello');

                // Jika tidak relevan dengan makanan, resep, atau restoran, tolak secara sopan
                if (!isFood && !isRecipe && !isRestoInfo) {
                    return 'Maaf, TastyAI hanya dapat menjawab pertanyaan seputar menu makanan, resep masakan, dan informasi terkait restoran Tasty Food. Silakan ajukan pertanyaan yang relevan! 😊';
                }

                // Proses jawaban resep masakan apa pun secara dinamis
                if (q.includes('resep') || q.includes('masak') || q.includes('cara membuat') || q.includes('cara buat') || q.includes('bahan') || q.includes('bumbu') || q.includes('liwet')) {
                    return generateRecipe(query);
                }

                if (q.includes('rekomendasi') || q.includes('makan') || q.includes('menu') || q.includes('hidangan')) {
                    return 'Kami sangat merekomendasikan hidangan khas Nusantara terbaik kami seperti **Nasi Goreng Spesial**, **Rendang Daging Lembut**, dan **Sate Ayam Madura** khas Tasty Food! Anda bisa melihat galeri foto hidangan kami di halaman **Galeri**.';
                }
                if (q.includes('lokasi') || q.includes('alamat') || q.includes('dimana') || q.includes('resto') || q.includes('tempat')) {
                    return 'Restoran **Tasty Food** berlokasi di **Kota Bandung, Jawa Barat**. Kami menyediakan peta navigasi interaktif di bagian bawah halaman **Kontak** untuk membantu Anda menemukan rute terbaik!';
                }
                if (q.includes('kontak') || q.includes('hubungi') || q.includes('email') || q.includes('telepon') || q.includes('nomor')) {
                    return 'Anda dapat menghubungi layanan pelanggan Tasty Food melalui email di **tastyfood@gmail.com** atau telepon di **+62 812 3456 7890**. Anda juga bisa mengirim pesan langsung dari form kontak kami.';
                }
                if (q.includes('tentang') || q.includes('sejarah') || q.includes('tasty food') || q.includes('tastyfood')) {
                    return '**Tasty Food** adalah restoran yang menyajikan aneka masakan Nusantara dengan bahan-bahan sehat pilihan dan cita rasa otentik premium sejak tahun 2023. Kami bangga dapat melayani kuliner nusantara untuk Anda!';
                }
                if (q.includes('halo') || q.includes('hai') || q.includes('pagi') || q.includes('siang') || q.includes('sore') || q.includes('malam') || q.includes('hello')) {
                    return 'Halo! Ada yang bisa saya bantu mengenai informasi kuliner di **Tasty Food** hari ini? 😊';
                }
                
                return 'TastyAI siap membantu Anda menemukan resep masakan Nusantara atau hidangan terbaik Tasty Food. Silakan tanyakan resep makanan kesukaan Anda!';
            }
        });
    </script>
    
    @yield('scripts')
</body>
</html>
