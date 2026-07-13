@extends('layouts.app')

@section('title', 'Tasty Food - Healthy Tasty Food')

@section('content')

    <!-- Hero Section -->
    <section class="hero-section overflow-hidden">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-6 col-md-12">
                    <div class="hero-content">
                        <!-- Thick Black Line -->
                        <div class="mb-4" style="width: 70px; height: 5px; background-color: #000;"></div>
                        <h1 class="hero-title text-uppercase mb-4">
                            Healthy<br><span class="fw-black">Tasty Food</span>
                        </h1>
                        <p class="text-secondary lh-lg mb-5" style="font-size: 0.95rem;">
                            {{ $settings['home_hero_desc'] ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.' }}
                        </p>
                        <a href="{{ route('tentang') }}" class="btn btn-black">Tentang Kami</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 text-center text-lg-end mt-5 mt-lg-0">
                    <div class="position-relative d-inline-block">
                        <!-- Plate artwork image Group 70.png -->
                        <img src="{{ !empty($settings['home_hero_image']) ? $settings['home_hero_image'] : asset('ASET/Group 70.png') }}" alt="Tasty Food Plate" class="img-fluid" style="max-height: 520px; object-fit: contain;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tentang Kami Section -->
    <section class="py-5 bg-white">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-uppercase tracking-wider">Tentang Kami</h2>
                <div class="mx-auto my-3" style="width: 60px; height: 3px; background-color: #000;"></div>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <p class="text-secondary lh-lg mb-0" style="font-size: 0.95rem;">
                            {{ $settings['home_about_desc'] ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus.' }}
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="row g-4 mt-4">
                 <!-- Card 1 -->
                 <div class="col-xl-3 col-md-6 col-12">
                     <div class="card card-custom h-100 text-center">
                         <div class="circle-img-wrap">
                             <img src="{{ !empty($settings['home_card1_image']) ? $settings['home_card1_image'] : asset('ASET/img-1.png') }}" alt="{{ $settings['home_card1_title'] ?? 'Lorem Ipsum' }}">
                         </div>
                         <h5 class="fw-bold text-uppercase mb-3">{{ $settings['home_card1_title'] ?? 'Lorem Ipsum' }}</h5>
                         <p class="text-secondary small lh-relaxed mb-0">
                             {{ $settings['home_card1_desc'] ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare.' }}
                         </p>
                     </div>
                 </div>
                 <!-- Card 2 -->
                 <div class="col-xl-3 col-md-6 col-12">
                     <div class="card card-custom h-100 text-center">
                         <div class="circle-img-wrap">
                             <img src="{{ !empty($settings['home_card2_image']) ? $settings['home_card2_image'] : asset('ASET/img-2.png') }}" alt="{{ $settings['home_card2_title'] ?? 'Lorem Ipsum' }}">
                         </div>
                         <h5 class="fw-bold text-uppercase mb-3">{{ $settings['home_card2_title'] ?? 'Lorem Ipsum' }}</h5>
                         <p class="text-secondary small lh-relaxed mb-0">
                             {{ $settings['home_card2_desc'] ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare.' }}
                         </p>
                     </div>
                 </div>
                 <!-- Card 3 -->
                 <div class="col-xl-3 col-md-6 col-12">
                     <div class="card card-custom h-100 text-center">
                         <div class="circle-img-wrap">
                             <img src="{{ !empty($settings['home_card3_image']) ? $settings['home_card3_image'] : asset('ASET/img-3.png') }}" alt="{{ $settings['home_card3_title'] ?? 'Lorem Ipsum' }}">
                         </div>
                         <h5 class="fw-bold text-uppercase mb-3">{{ $settings['home_card3_title'] ?? 'Lorem Ipsum' }}</h5>
                         <p class="text-secondary small lh-relaxed mb-0">
                             {{ $settings['home_card3_desc'] ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare.' }}
                         </p>
                     </div>
                 </div>
                 <!-- Card 4 -->
                 <div class="col-xl-3 col-md-6 col-12">
                     <div class="card card-custom h-100 text-center">
                         <div class="circle-img-wrap">
                             <img src="{{ !empty($settings['home_card4_image']) ? $settings['home_card4_image'] : asset('ASET/img-4.png') }}" alt="{{ $settings['home_card4_title'] ?? 'Lorem Ipsum' }}">
                         </div>
                         <h5 class="fw-bold text-uppercase mb-3">{{ $settings['home_card4_title'] ?? 'Lorem Ipsum' }}</h5>
                         <p class="text-secondary small lh-relaxed mb-0">
                             {{ $settings['home_card4_desc'] ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare.' }}
                         </p>
                     </div>
                 </div>
            </div>
        </div>
    </section>

    <!-- Berita Kami Section -->
    <section class="py-5 bg-light">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-uppercase tracking-wider">Berita Kami</h2>
                <div class="mx-auto my-3" style="width: 60px; height: 3px; background-color: #000;"></div>
            </div>
            
            <div class="row g-4">
                @if(count($news) > 0)
                    <!-- Large Featured Card (Left) -->
                    @php $featured = $news[0]; @endphp
                    <div class="col-lg-6 col-md-12">
                        <div class="card news-card h-100 p-3">
                            <div class="news-card-img-wrap rounded-3 mb-4" style="height: 320px;">
                                <img src="{{ str_starts_with($featured['image'], 'ASET/') ? asset($featured['image']) : $featured['image_url'] }}" alt="{{ $featured['title'] }}">
                            </div>
                            <div class="card-body p-2 d-flex flex-column justify-content-between">
                                <div>
                                    <h4 class="fw-bold text-uppercase mb-3" style="font-size: 1.15rem; line-height: 1.4;">
                                        {{ $featured['title'] }}
                                    </h4>
                                    <p class="text-secondary small lh-lg mb-4 text-justify">
                                        {{ Str::limit($featured['content'], 180) }}
                                    </p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="{{ route('berita') }}" class="news-link-yellow">baca selengkapnya</a>
                                    <span class="text-muted"><i class="fa-solid fa-ellipsis text-secondary-light"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- 4 Small News Cards Grid (Right) -->
                    <div class="col-lg-6 col-md-12">
                        <div class="row g-4">
                            @forelse(array_slice($news, 1, 4) as $item)
                                <div class="col-md-6 col-12">
                                    <div class="card news-card p-3">
                                        <div class="news-card-img-wrap rounded-3 mb-3" style="height: 140px;">
                                            <img src="{{ str_starts_with($item['image'], 'ASET/') ? asset($item['image']) : $item['image_url'] }}" alt="{{ $item['title'] }}">
                                        </div>
                                        <h5 class="fw-bold text-uppercase mb-2 text-truncate" style="font-size: 0.95rem;" title="{{ $item['title'] }}">{{ $item['title'] }}</h5>
                                        <p class="text-secondary small lh-normal mb-3 line-clamp-2" style="font-size: 0.78rem;">
                                            {{ Str::limit($item['content'], 70) }}
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a href="{{ route('berita') }}" class="news-link-yellow">baca selengkapnya</a>
                                            <span class="text-muted"><i class="fa-solid fa-ellipsis text-secondary-light"></i></span>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 py-5 text-center text-secondary">Belum ada berita lainnya.</div>
                            @endforelse
                        </div>
                    </div>
                @else
                    <!-- Fallback default static mockup if no API connection -->
                    <!-- Large Featured Card (Left) -->
                    <div class="col-lg-6 col-md-12">
                        <div class="card news-card h-100 p-3">
                            <div class="news-card-img-wrap rounded-3 mb-4" style="height: 320px;">
                                <img src="{{ asset('ASET/ella-olsson-mmnKI8kMxpc-unsplash.jpg') }}" alt="Featured News">
                            </div>
                            <div class="card-body p-2 d-flex flex-column justify-content-between">
                                <div>
                                    <h4 class="fw-bold text-uppercase mb-3" style="font-size: 1.15rem; line-height: 1.4;">
                                        LOREM IPSUM DOLOR SIT AMET, CONSECTETUR ADIPISCING ELIT
                                    </h4>
                                    <p class="text-secondary small lh-lg mb-4">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.
                                    </p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="{{ route('berita') }}" class="news-link-yellow">baca selengkapnya</a>
                                    <span class="text-muted"><i class="fa-solid fa-ellipsis text-secondary-light"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- 4 Small News Cards Grid (Right) -->
                    <div class="col-lg-6 col-md-12">
                        <div class="row g-4">
                            <!-- Small Card 1 -->
                            <div class="col-md-6 col-12">
                                <div class="card news-card p-3">
                                    <div class="news-card-img-wrap rounded-3 mb-3" style="height: 140px;">
                                        <img src="{{ asset('ASET/sanket-shah-SVA7TyHxojY-unsplash.jpg') }}" alt="News 1">
                                    </div>
                                    <h5 class="fw-bold text-uppercase mb-2" style="font-size: 0.95rem;">Lorem Ipsum</h5>
                                    <p class="text-secondary small lh-normal mb-3" style="font-size: 0.78rem;">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo.
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="{{ route('berita') }}" class="news-link-yellow">baca selengkapnya</a>
                                        <span class="text-muted"><i class="fa-solid fa-ellipsis text-secondary-light"></i></span>
                                    </div>
                                </div>
                            </div>
                            <!-- Small Card 2 -->
                            <div class="col-md-6 col-12">
                                <div class="card news-card p-3">
                                    <div class="news-card-img-wrap rounded-3 mb-3" style="height: 140px;">
                                        <img src="{{ asset('ASET/jimmy-dean-Jvw3pxgeiZw-unsplash.jpg') }}" alt="News 2">
                                    </div>
                                    <h5 class="fw-bold text-uppercase mb-2" style="font-size: 0.95rem;">Lorem Ipsum</h5>
                                    <p class="text-secondary small lh-normal mb-3" style="font-size: 0.78rem;">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo.
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="{{ route('berita') }}" class="news-link-yellow">baca selengkapnya</a>
                                        <span class="text-muted"><i class="fa-solid fa-ellipsis text-secondary-light"></i></span>
                                    </div>
                                </div>
                            </div>
                            <!-- Small Card 3 -->
                            <div class="col-md-6 col-12">
                                <div class="card news-card p-3">
                                    <div class="news-card-img-wrap rounded-3 mb-3" style="height: 140px;">
                                        <img src="{{ asset('ASET/sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg') }}" alt="News 3">
                                    </div>
                                    <h5 class="fw-bold text-uppercase mb-2" style="font-size: 0.95rem;">Lorem Ipsum</h5>
                                    <p class="text-secondary small lh-normal mb-3" style="font-size: 0.78rem;">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo.
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="{{ route('berita') }}" class="news-link-yellow">baca selengkapnya</a>
                                        <span class="text-muted"><i class="fa-solid fa-ellipsis text-secondary-light"></i></span>
                                    </div>
                                </div>
                            </div>
                            <!-- Small Card 4 -->
                            <div class="col-md-6 col-12">
                                <div class="card news-card p-3">
                                    <div class="news-card-img-wrap rounded-3 mb-3" style="height: 140px;">
                                        <img src="{{ asset('ASET/brooke-lark-oaz0raysASk-unsplash.jpg') }}" alt="News 4">
                                    </div>
                                    <h5 class="fw-bold text-uppercase mb-2" style="font-size: 0.95rem;">Lorem Ipsum</h5>
                                    <p class="text-secondary small lh-normal mb-3" style="font-size: 0.78rem;">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo.
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="{{ route('berita') }}" class="news-link-yellow">baca selengkapnya</a>
                                        <span class="text-muted"><i class="fa-solid fa-ellipsis text-secondary-light"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Galeri Kami Section -->
    <section class="py-5 bg-white text-center">
        <div class="container py-5">
            <div class="mb-5">
                <h2 class="fw-bold text-uppercase tracking-wider">Galeri Kami</h2>
                <div class="mx-auto my-3" style="width: 60px; height: 3px; background-color: #000;"></div>
            </div>
            <div class="row g-4 mb-5">
                @if(count($gallery) > 0)
                    @foreach($gallery as $index => $item)
                        <div class="col-lg-4 col-md-6 col-6">
                            <div class="card border-0 shadow-sm h-100 overflow-hidden" style="border-radius: var(--border-radius-lg); transition: all 0.3s ease;">
                                <div class="gallery-image-wrap" style="aspect-ratio: 1 / 1; border-bottom-left-radius: 0; border-bottom-right-radius: 0; border-radius: 0;">
                                    <img src="{{ str_starts_with($item['image'], 'ASET/') ? asset($item['image']) : $item['image_url'] }}" alt="{{ $item['title'] ?? 'Gallery Food ' . ($index + 1) }}" class="img-fluid w-100 h-100" style="object-fit: cover;">
                                </div>
                                <div class="p-3 bg-white text-center">
                                    <h6 class="fw-bold text-uppercase mb-1 text-truncate" style="font-size: 0.88rem; color: #111;">{{ $item['title'] ?? 'Tanpa Judul' }}</h6>
                                    <span class="text-muted text-uppercase" style="font-size: 0.68rem; letter-spacing: 1px;">Tasty Food</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Fallback default static mockup if no API connection -->
                    @php
                        $fallbackHomeGallery = [
                            ['img' => 'ASET/jonathan-borba-Gkc_xM3VY34-unsplash.jpg', 'title' => 'Nasi Goreng Spesial'],
                            ['img' => 'ASET/anna-pelzer-IGfIGP5ONV0-unsplash.jpg', 'title' => 'Grain Salad Bowl'],
                            ['img' => 'ASET/img-4.png', 'title' => 'Salad Buah Segar'],
                            ['img' => 'ASET/anh-nguyen-kcA-c3f_3FE-unsplash.jpg', 'title' => 'Toast Cokelat Keju'],
                            ['img' => 'ASET/mariana-medvedeva-iNwCO9ycBlc-unsplash.jpg', 'title' => 'Pancake Strawberry'],
                            ['img' => 'ASET/fathul-abrar-T-qI_MI2EMA-unsplash.jpg', 'title' => 'Es Kopi Susu']
                        ];
                    @endphp
                    @foreach($fallbackHomeGallery as $index => $item)
                        <div class="col-lg-4 col-md-6 col-6">
                            <div class="card border-0 shadow-sm h-100 overflow-hidden" style="border-radius: var(--border-radius-lg); transition: all 0.3s ease;">
                                <div class="gallery-image-wrap" style="aspect-ratio: 1 / 1; border-bottom-left-radius: 0; border-bottom-right-radius: 0; border-radius: 0;">
                                    <img src="{{ asset($item['img']) }}" alt="{{ $item['title'] }}" class="img-fluid w-100 h-100" style="object-fit: cover;">
                                </div>
                                <div class="p-3 bg-white text-center">
                                    <h6 class="fw-bold text-uppercase mb-1 text-truncate" style="font-size: 0.88rem; color: #111;">{{ $item['title'] }}</h6>
                                    <span class="text-muted text-uppercase" style="font-size: 0.68rem; letter-spacing: 1px;">Tasty Food</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <a href="{{ route('galeri') }}" class="btn btn-black">Lihat Lebih Banyak</a>
        </div>
    </section>

@endsection