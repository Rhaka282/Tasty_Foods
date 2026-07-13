@extends('layouts.app')

@section('title', 'Kontak Kami - Tasty Food')

@section('content')

    <!-- Banner Section -->
    <section class="sub-banner" style="background-image: url('{{ $settings['contact_banner'] ?? asset('ASET/fathul-abrar-T-qI_MI2EMA-unsplash.jpg') }}');">
        <div class="container text-center text-lg-start">
            <h1 class="sub-banner-title text-uppercase">{{ $settings['contact_title'] ?? 'Kontak Kami' }}</h1>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="py-5 bg-white">
        <div class="container py-5">
            <div class="mb-5">
                <h2 class="fw-bold text-uppercase mb-4" style="font-size: 2rem; letter-spacing: 1px;">Kontak Kami</h2>
            </div>
            
            <!-- Alerts -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4 border-0 rounded-3 shadow-sm py-3" role="alert" style="background-color: #d1e7dd; color: #0f5132;">
                    <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show mb-4 border-0 rounded-3 shadow-sm py-3" role="alert" style="background-color: #f8d7da; color: #842029;">
                    <i class="fa-solid fa-circle-exclamation me-2"></i> <strong>Oops!</strong> Ada masalah dengan pengiriman pesan Anda:
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            <form action="{{ route('kontak.send') }}" method="POST" class="mb-5">
                @csrf
                <div class="row g-4">
                    <!-- Left Side Inputs -->
                    <div class="col-lg-6 col-md-12 d-flex flex-column gap-4">
                        <input type="text" name="subject" class="form-control contact-input" placeholder="Subject" value="{{ old('subject') }}" required>
                        <input type="text" name="name" class="form-control contact-input" placeholder="Name" value="{{ old('name') }}" required>
                        <input type="email" name="email" class="form-control contact-input" placeholder="Email" value="{{ old('email') }}" required>
                    </div>
                    
                    <!-- Right Side Input -->
                    <div class="col-lg-6 col-md-12">
                        <textarea name="message" class="form-control contact-input h-100" placeholder="Message" rows="6" style="resize: none;" required>{{ old('message') }}</textarea>
                    </div>
                </div>
                
                <div class="row mt-4">
                    <div class="col-12">
                        <button type="submit" class="btn btn-black w-100 py-3">Kirim</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- Contact Info Cards -->
    <section class="py-5 bg-light">
        <div class="container py-5">
            <div class="row g-4 justify-content-center">
                <!-- Email Card -->
                <div class="col-lg-4 col-md-6 col-12">
                    <a href="mailto:{{ $settings['contact_email'] ?? 'tastyfood@gmail.com' }}" class="text-decoration-none d-block">
                        <div class="contact-info-block">
                            <div class="contact-icon-circle">
                                <img src="{{ asset('ASET/ic_markunread_24px@2x.png') }}" alt="Email Icon">
                            </div>
                            <h5 class="fw-bold text-uppercase mb-2 text-dark" style="font-size: 1.1rem; letter-spacing: 1px;">Email</h5>
                            <p class="text-secondary mb-0" style="font-size: 0.95rem;">{{ $settings['contact_email'] ?? 'tastyfood@gmail.com' }}</p>
                        </div>
                    </a>
                </div>
                
                <!-- Phone Card -->
                <div class="col-lg-4 col-md-6 col-12">
                    <a href="tel:{{ str_replace([' ', '-'], '', $settings['contact_phone'] ?? '+62 812 3456 7890') }}" class="text-decoration-none d-block">
                        <div class="contact-info-block">
                            <div class="contact-icon-circle">
                                <img src="{{ asset('ASET/ic_call_24px@2x.png') }}" alt="Phone Icon">
                            </div>
                            <h5 class="fw-bold text-uppercase mb-2 text-dark" style="font-size: 1.1rem; letter-spacing: 1px;">Phone</h5>
                            <p class="text-secondary mb-0" style="font-size: 0.95rem;">{{ $settings['contact_phone'] ?? '+62 812 3456 7890' }}</p>
                        </div>
                    </a>
                </div>
                
                <!-- Location Card -->
                <div class="col-lg-4 col-md-6 col-12">
                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($settings['contact_address'] ?? 'Kota Bandung, Jawa Barat') }}" target="_blank" class="text-decoration-none d-block">
                        <div class="contact-info-block">
                            <div class="contact-icon-circle">
                                <img src="{{ asset('ASET/ic_place_24px@2x.png') }}" alt="Location Icon">
                            </div>
                            <h5 class="fw-bold text-uppercase mb-2 text-dark" style="font-size: 1.1rem; letter-spacing: 1px;">Location</h5>
                            <p class="text-secondary mb-0" style="font-size: 0.95rem;">{{ $settings['contact_address'] ?? 'Kota Bandung, Jawa Barat' }}</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-5 bg-white mb-4">
        <div class="container py-4">
            <div class="map-container">
                <!-- Interactive Embedded Google Map of Bandung -->
                <iframe 
                    src="{{ $settings['contact_maps'] ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.20140228813!2d107.5731165!3d-6.9034443!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6398252477f%3A0x146a1f9a0f47b330!2sBandung%2C%20Bandung%20City%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1718610000000!5m2!1sen!2sid' }}" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>

@endsection
