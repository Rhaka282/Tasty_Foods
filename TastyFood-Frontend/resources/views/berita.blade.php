@extends('layouts.app')

@section('title', 'Berita Kami - Tasty Food')

@section('content')

    <!-- Banner Section -->
    <section class="sub-banner" style="background-image: url('{{ asset('ASET/fathul-abrar-T-qI_MI2EMA-unsplash.jpg') }}');">
        <div class="container text-center text-lg-start">
            <h1 class="sub-banner-title text-uppercase">Berita Kami</h1>
        </div>
    </section>

    @if(count($news) > 0)
        <!-- Featured Post Section -->
        @php $featured = $news[0]; @endphp
        <section class="py-5 bg-white">
            <div class="container py-5">
                <div class="row align-items-center g-5">
                    <!-- Left Image -->
                    <div class="col-lg-6 col-md-12">
                        <div class="gallery-image-wrap rounded-4" style="aspect-ratio: 4 / 3;">
                            <img src="{{ str_starts_with($featured['image'], 'ASET/') ? asset($featured['image']) : $featured['image_url'] }}" alt="{{ $featured['title'] }}" class="img-fluid w-100 h-100" style="object-fit: cover;">
                        </div>
                    </div>
                    <!-- Right Text -->
                    <div class="col-lg-6 col-md-12">
                        <h2 class="fw-black text-uppercase mb-4" style="font-size: 2rem; line-height: 1.3; letter-spacing: 1px;">
                            {{ $featured['title'] }}
                        </h2>
                        <p class="text-secondary lh-lg mb-4 text-justify" style="font-size: 0.95rem;">
                            {{ $featured['content'] }}
                        </p>
                        <a href="#" class="btn btn-black">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Berita Lainnya Section -->
        <section class="py-5 bg-light mb-4">
            <div class="container py-5">
                <div class="mb-5">
                    <h3 class="fw-bold text-uppercase tracking-wider">Berita Lainnya</h3>
                    <div class="my-3" style="width: 60px; height: 3px; background-color: #000;"></div>
                </div>
                
                <div class="row g-4">
                    @forelse (array_slice($news, 1) as $item)
                        <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                            <div class="card news-card p-3 h-100 d-flex flex-column justify-content-between">
                                <div>
                                    <div class="news-card-img-wrap rounded-3 mb-3" style="height: 160px;">
                                        <img src="{{ str_starts_with($item['image'], 'ASET/') ? asset($item['image']) : $item['image_url'] }}" alt="{{ $item['title'] }}">
                                    </div>
                                    <h5 class="fw-bold text-uppercase mb-2 text-truncate shadow-sm-hover" style="font-size: 0.95rem;" title="{{ $item['title'] }}">{{ $item['title'] }}</h5>
                                    <p class="text-secondary small lh-relaxed mb-4 line-clamp-3" style="font-size: 0.8rem;">
                                        {{ Str::limit($item['content'], 120) }}
                                    </p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="#" class="news-link-yellow">baca selengkapnya</a>
                                    <span class="text-muted"><i class="fa-solid fa-ellipsis text-secondary-light"></i></span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 py-5 text-center text-secondary">Belum ada berita lainnya.</div>
                    @endforelse
                </div>
            </div>
        </section>
    @else
        <!-- Featured Post Section Fallback -->
        <section class="py-5 bg-white">
            <div class="container py-5">
                <div class="row align-items-center g-5">
                    <!-- Left Image -->
                    <div class="col-lg-6 col-md-12">
                        <div class="gallery-image-wrap rounded-4" style="aspect-ratio: 4 / 3;">
                            <img src="{{ asset('ASET/img-4.png') }}" alt="Featured Makanan Nusantara" class="img-fluid w-100 h-100" style="object-fit: cover;">
                        </div>
                    </div>
                    <!-- Right Text -->
                    <div class="col-lg-6 col-md-12">
                        <h2 class="fw-black text-uppercase mb-4" style="font-size: 2rem; line-height: 1.3; letter-spacing: 1px;">
                            Apa saja makanan khas Nusantara?
                        </h2>
                        <p class="text-secondary lh-lg mb-4 text-justify" style="font-size: 0.95rem;">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.
                        </p>
                        <p class="text-secondary lh-lg mb-5 text-justify" style="font-size: 0.95rem;">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.
                        </p>
                        <a href="#" class="btn btn-black">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Berita Lainnya Section Fallback -->
        <section class="py-5 bg-light mb-4">
            <div class="container py-5">
                <div class="mb-5">
                    <h3 class="fw-bold text-uppercase tracking-wider">Berita Lainnya</h3>
                    <div class="my-3" style="width: 60px; height: 3px; background-color: #000;"></div>
                </div>
                
                <div class="row g-4">
                    @php
                        $newsAssets = [
                            ['img' => 'ASET/sanket-shah-SVA7TyHxojY-unsplash.jpg', 'title' => 'LOREM IPSUM'],
                            ['img' => 'ASET/jimmy-dean-Jvw3pxgeiZw-unsplash.jpg', 'title' => 'LOREM IPSUM'],
                            ['img' => 'ASET/sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg', 'title' => 'LOREM IPSUM'],
                            ['img' => 'ASET/ella-olsson-mmnKI8kMxpc-unsplash.jpg', 'title' => 'LOREM IPSUM']
                        ];
                    @endphp
                    
                    @for ($i = 0; $i < 8; $i++)
                        @php
                            $item = $newsAssets[$i % 4];
                        @endphp
                        <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                            <div class="card news-card p-3 h-100 d-flex flex-column justify-content-between">
                                <div>
                                    <div class="news-card-img-wrap rounded-3 mb-3" style="height: 160px;">
                                        <img src="{{ asset($item['img']) }}" alt="{{ $item['title'] }}">
                                    </div>
                                    <h5 class="fw-bold text-uppercase mb-2" style="font-size: 0.95rem;">{{ $item['title'] }}</h5>
                                    <p class="text-secondary small lh-relaxed mb-4" style="font-size: 0.8rem;">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo.
                                    </p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="#" class="news-link-yellow">baca selengkapnya</a>
                                    <span class="text-muted"><i class="fa-solid fa-ellipsis text-secondary-light"></i></span>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </section>
    @endif

@endsection
