@extends('layouts.app')

@section('title', 'Ubah Profil - Tasty Food')

@section('content')

    <!-- Banner Section -->
    <section class="sub-banner" style="background-image: url('{{ asset('ASET/fathul-abrar-T-qI_MI2EMA-unsplash.jpg') }}');">
        <div class="container text-center text-lg-start">
            <h1 class="sub-banner-title text-uppercase">Ubah Profil</h1>
        </div>
    </section>

    <!-- Profile Edit Form Section -->
    <section class="py-5 bg-white">
        <div class="container py-5">
            <div class="mb-5 text-center text-lg-start">
                <h2 class="fw-bold text-uppercase mb-2" style="font-size: 2rem; letter-spacing: 1px;">Pengaturan Akun</h2>
                <p class="text-secondary" style="font-size: 0.95rem;">Perbarui informasi profil dan kata sandi akun Anda di sini.</p>
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
                    <i class="fa-solid fa-circle-exclamation me-2"></i> <strong>Oops!</strong> Ada masalah dengan pembaruan profil Anda:
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="row g-5">
                    <!-- Left Side: Profile Info Card -->
                    <div class="col-lg-6 col-md-12">
                        <div class="p-4 bg-light rounded-4 shadow-sm h-100 border border-0">
                            <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
                                <div class="bg-black text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="fa-solid fa-user-gear fs-4"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-0 text-uppercase" style="font-size: 1.05rem; letter-spacing: 0.5px;">Informasi Profil</h5>
                                    <small class="text-muted">Perbarui nama, email, dan foto profil Anda</small>
                                </div>
                            </div>
                            
                            <!-- Profile Photo Uploader -->
                            <div class="text-center mb-4">
                                <div class="position-relative d-inline-block">
                                    <img id="photo-preview" src="{{ $user->photo ? asset($user->photo) : 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($user->email))) . '?d=mp&s=150' }}" 
                                         alt="Photo Profile" 
                                         class="rounded-circle border border-4 border-white shadow" 
                                         style="width: 120px; height: 120px; object-fit: cover;">
                                    <label for="photo-input" class="position-absolute bottom-0 end-0 bg-black text-white rounded-circle d-flex align-items-center justify-content-center shadow" 
                                           style="width: 35px; height: 35px; border: 2px solid white; cursor: pointer; transition: all 0.2s ease;">
                                        <i class="fa-solid fa-camera small"></i>
                                    </label>
                                    <input type="file" name="photo" id="photo-input" class="d-none" accept="image/*">
                                </div>
                                <div class="mt-2 small text-muted">Klik ikon kamera untuk memilih foto baru</div>
                            </div>
                            
                            <div class="d-flex flex-column gap-4">
                                <div>
                                    <label class="form-label fw-semibold text-uppercase small text-secondary mb-2" style="letter-spacing: 0.5px;">Nama Lengkap</label>
                                    <input type="text" name="name" class="form-control contact-input bg-white" placeholder="Nama Lengkap" value="{{ old('name', $user->name) }}" required>
                                </div>
                                
                                <div>
                                    <label class="form-label fw-semibold text-uppercase small text-secondary mb-2" style="letter-spacing: 0.5px;">Alamat Email</label>
                                    <input type="email" class="form-control contact-input bg-light" placeholder="Alamat Email" value="{{ $user->email }}" readonly style="cursor: not-allowed; opacity: 0.8;">
                                    <small class="text-muted mt-2 d-block" style="font-size: 0.78rem;">
                                        <i class="fa-solid fa-circle-info me-1"></i>Alamat email tidak dapat diubah.
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Right Side: Change Password Card -->
                    <div class="col-lg-6 col-md-12">
                        <div class="p-4 bg-light rounded-4 shadow-sm h-100 border border-0">
                            <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
                                <div class="bg-black text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="fa-solid fa-key fs-4"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-0 text-uppercase" style="font-size: 1.05rem; letter-spacing: 0.5px;">Ubah Password</h5>
                                    <small class="text-muted">Kosongkan jika Anda tidak ingin mengubah password</small>
                                </div>
                            </div>
                            
                            <div class="d-flex flex-column gap-3">
                                <div>
                                    <label class="form-label fw-semibold text-uppercase small text-secondary mb-2" style="letter-spacing: 0.5px;">Password Saat Ini</label>
                                    <input type="password" name="current_password" class="form-control contact-input bg-white" placeholder="Masukkan password saat ini">
                                </div>
                                
                                <div>
                                    <label class="form-label fw-semibold text-uppercase small text-secondary mb-2" style="letter-spacing: 0.5px;">Password Baru</label>
                                    <input type="password" name="new_password" class="form-control contact-input bg-white" placeholder="Masukkan password baru (min. 8 karakter)">
                                </div>
                                
                                <div>
                                    <label class="form-label fw-semibold text-uppercase small text-secondary mb-2" style="letter-spacing: 0.5px;">Konfirmasi Password Baru</label>
                                    <input type="password" name="new_password_confirmation" class="form-control contact-input bg-white" placeholder="Konfirmasi password baru">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Submit Button -->
                <div class="row mt-5">
                    <div class="col-12 text-center text-lg-start">
                        <button type="submit" class="btn btn-black px-5 py-3">Simpan Perubahan</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection

@section('scripts')
<script>
    document.getElementById('photo-input').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('photo-preview').src = event.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
