@extends('layouts.app')

@section('title', 'Galeri Kami - Tasty Food')

@section('content')

    <!-- Banner Section -->
    <section class="sub-banner" style="background-image: url('{{ asset('ASET/fathul-abrar-T-qI_MI2EMA-unsplash.jpg') }}');">
        <div class="container text-center text-lg-start">
            <h1 class="sub-banner-title text-uppercase">Galeri Kami</h1>
        </div>
    </section>

    <!-- Carousel Slider Section -->
    <section class="py-5 bg-white">
        <div class="container py-5">
            <div id="galleryCarousel" class="carousel slide gallery-carousel" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <!-- Slide 1 (Mockup Default) -->
                    <div class="carousel-item active">
                        <img src="{{ asset('ASET/anna-pelzer-IGfIGP5ONV0-unsplash.jpg') }}" alt="Grain Salad Bowl">
                    </div>
                    <!-- Slide 2 (Bonus slider) -->
                    <div class="carousel-item">
                        <img src="{{ asset('ASET/ella-olsson-mmnKI8kMxpc-unsplash.jpg') }}" alt="Mediterranean Tablespread">
                    </div>
                    <!-- Slide 3 (Bonus slider) -->
                    <div class="carousel-item">
                        <img src="{{ asset('ASET/sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg') }}" alt="Cooking Pasta">
                    </div>
                </div>
                
                <!-- Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Gallery Grid Section (4x3 layout) -->
    <section class="py-5 bg-light mb-4">
        <div class="container py-5">
            <div class="row g-4">
                @if(count($gallery) > 0)
                    @foreach ($gallery as $index => $item)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-6">
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
                    @php
                        $galleryImages = [
                            // Row 1
                            ['img' => 'ASET/jonathan-borba-Gkc_xM3VY34-unsplash.jpg', 'title' => 'Nasi Goreng Spesial'],
                            ['img' => 'ASET/anna-pelzer-IGfIGP5ONV0-unsplash.jpg', 'title' => 'Grain Salad Bowl'],
                            ['img' => 'ASET/img-1.png', 'title' => 'Sup Ayam Sayur'],
                            ['img' => 'ASET/brooke-lark-nBtmglfY0HU-unsplash.jpg', 'title' => 'Roti Bakar Alpukat'],
                            // Row 2
                            ['img' => 'ASET/jonathan-borba-Gkc_xM3VY34-unsplash.jpg', 'title' => 'Nasi Kuning Nusantara'],
                            ['img' => 'ASET/img-4.png', 'title' => 'Salad Buah Segar'],
                            ['img' => 'ASET/ella-olsson-mmnKI8kMxpc-unsplash.jpg', 'title' => 'Toast Cokelat Keju'],
                            ['img' => 'ASET/sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg', 'title' => 'Pasta Carbonara'],
                            // Row 3
                            ['img' => 'ASET/brooke-lark-oaz0raysASk-unsplash.jpg', 'title' => 'Pancake Strawberry'],
                            ['img' => 'ASET/jimmy-dean-Jvw3pxgeiZw-unsplash.jpg', 'title' => 'Sosis Panggang'],
                            ['img' => 'ASET/sanket-shah-SVA7TyHxojY-unsplash.jpg', 'title' => 'Kari Ayam India'],
                            ['img' => 'ASET/fathul-abrar-T-qI_MI2EMA-unsplash.jpg', 'title' => 'Es Kopi Susu']
                        ];
                    @endphp

                    @foreach ($galleryImages as $index => $item)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-6">
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
        </div>
    </section>

@endsection
