@extends('layouts.app')

@section('title', 'Tentang Kami - Tasty Food')

@section('content')

    <!-- Banner Section -->
    <section class="sub-banner" style="background-image: url('{{ asset('ASET/fathul-abrar-T-qI_MI2EMA-unsplash.jpg') }}');">
        <div class="container text-center text-lg-start">
            <h1 class="sub-banner-title text-uppercase">Tentang Kami</h1>
        </div>
    </section>

    <!-- Tasty Food Section -->
    <section class="py-5 bg-white">
        <div class="container py-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 col-md-12">
                    <h2 class="fw-bold text-uppercase mb-4" style="font-size: 2rem; letter-spacing: 1px;">{{ $settings['about_title'] ?? 'Tasty Food' }}</h2>
                    <p class="text-secondary lh-lg mb-4 text-justify" style="font-size: 0.95rem;">
                        {{ $settings['about_desc_1'] ?? '' }}
                    </p>
                    <p class="text-secondary lh-lg mb-0 text-justify" style="font-size: 0.95rem;">
                        {{ $settings['about_desc_2'] ?? '' }}
                    </p>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="row g-4">
                        <div class="col-6">
                            <img src="{{ asset('ASET/jonathan-borba-Gkc_xM3VY34-unsplash.jpg') }}" alt="Tasty Food Salad" class="img-fluid about-grid-img" style="aspect-ratio: 3 / 4; object-fit: cover;">
                        </div>
                        <div class="col-6">
                            <img src="{{ asset('ASET/jimmy-dean-Jvw3pxgeiZw-unsplash.jpg') }}" alt="Tasty Food Plating" class="img-fluid about-grid-img" style="aspect-ratio: 3 / 4; object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Visi Section -->
    <section class="py-5 bg-light">
        <div class="container py-5">
            <div class="row align-items-center g-5 flex-column-reverse flex-lg-row">
                <div class="col-lg-6 col-md-12">
                    <div class="row g-4">
                        <div class="col-6">
                            <img src="{{ asset('ASET/ella-olsson-mmnKI8kMxpc-unsplash.jpg') }}" alt="Visi Image 1" class="img-fluid about-grid-img" style="aspect-ratio: 1 / 1; object-fit: cover;">
                        </div>
                        <div class="col-6">
                            <img src="{{ asset('ASET/anh-nguyen-kcA-c3f_3FE-unsplash.jpg') }}" alt="Visi Image 2" class="img-fluid about-grid-img" style="aspect-ratio: 1 / 1; object-fit: cover;">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <h2 class="fw-bold text-uppercase mb-4" style="font-size: 2rem; letter-spacing: 1px;">Visi</h2>
                    <p class="text-secondary lh-lg mb-0 text-justify" style="font-size: 0.95rem;">
                        {{ $settings['visi'] ?? '' }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Misi Section -->
    <section class="py-5 bg-white mb-4">
        <div class="container py-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 col-md-12">
                    <h2 class="fw-bold text-uppercase mb-4" style="font-size: 2rem; letter-spacing: 1px;">Misi</h2>
                    <p class="text-secondary lh-lg mb-0 text-justify" style="font-size: 0.95rem;">
                        {{ $settings['misi'] ?? '' }}
                    </p>
                </div>
                <div class="col-lg-6 col-md-12">
                    <img src="{{ asset('ASET/sanket-shah-SVA7TyHxojY-unsplash.jpg') }}" alt="Misi Image" class="img-fluid about-grid-img w-100" style="aspect-ratio: 16 / 9; object-fit: cover;">
                </div>
            </div>
        </div>
    </section>

@endsection
