import React, { useEffect } from 'react';
import { Link } from 'react-router-dom';

export default function Home() {
    // Scroll to top when page is rendered
    useEffect(() => {
        window.scrollTo(0, 0);
    }, []);

    return (
        <div className="home-page">
            {/* Hero Section */}
            <section className="hero-section overflow-hidden">
                <div className="container">
                    <div className="row align-items-center g-4">
                        <div className="col-lg-6 col-md-12">
                            <div className="hero-content">
                                {/* Thick Black Line */}
                                <div className="mb-4" style={{ width: '70px', height: '5px', backgroundColor: '#000' }}></div>
                                <h1 className="hero-title text-uppercase mb-4">
                                    Healthy<br /><span className="fw-black">Tasty Food</span>
                                </h1>
                                <p className="text-secondary lh-lg mb-5" style={{ fontSize: '0.95rem' }}>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.
                                </p>
                                <Link to="/tentang" className="btn btn-black">Tentang Kami</Link>
                            </div>
                        </div>
                        <div className="col-lg-6 col-md-12 text-center text-lg-end mt-5 mt-lg-0">
                            <div className="position-relative d-inline-block">
                                {/* Plate artwork image */}
                                <img src="/ASET/Group 70.png" alt="Tasty Food Plate" className="img-fluid" style={{ maxHeight: '520px', objectFit: 'contain' }} />
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {/* Tentang Kami Section */}
            <section className="py-5 bg-white">
                <div className="container py-5">
                    <div className="text-center mb-5">
                        <h2 className="fw-bold text-uppercase tracking-wider">Tentang Kami</h2>
                        <div className="mx-auto my-3" style={{ width: '60px', height: '3px', backgroundColor: '#000' }}></div>
                        <div className="row justify-content-center">
                            <div className="col-lg-8">
                                <p className="text-secondary lh-lg mb-0" style={{ fontSize: '0.95rem' }}>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div className="row g-4 mt-4">
                        {/* Card 1 */}
                        <div className="col-xl-3 col-md-6 col-12">
                            <div className="card card-custom h-100 text-center">
                                <div className="circle-img-wrap">
                                    <img src="/ASET/img-1.png" alt="Lorem Ipsum" />
                                </div>
                                <h5 className="fw-bold text-uppercase mb-3">Lorem Ipsum</h5>
                                <p className="text-secondary small lh-relaxed mb-0">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare.
                                </p>
                            </div>
                        </div>
                        {/* Card 2 */}
                        <div className="col-xl-3 col-md-6 col-12">
                            <div className="card card-custom h-100 text-center">
                                <div className="circle-img-wrap">
                                    <img src="/ASET/img-2.png" alt="Lorem Ipsum" />
                                </div>
                                <h5 className="fw-bold text-uppercase mb-3">Lorem Ipsum</h5>
                                <p className="text-secondary small lh-relaxed mb-0">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare.
                                </p>
                            </div>
                        </div>
                        {/* Card 3 */}
                        <div className="col-xl-3 col-md-6 col-12">
                            <div className="card card-custom h-100 text-center">
                                <div className="circle-img-wrap">
                                    <img src="/ASET/img-3.png" alt="Lorem Ipsum" />
                                </div>
                                <h5 className="fw-bold text-uppercase mb-3">Lorem Ipsum</h5>
                                <p className="text-secondary small lh-relaxed mb-0">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare.
                                </p>
                            </div>
                        </div>
                        {/* Card 4 */}
                        <div className="col-xl-3 col-md-6 col-12">
                            <div className="card card-custom h-100 text-center">
                                <div className="circle-img-wrap">
                                    <img src="/ASET/img-4.png" alt="Lorem Ipsum" />
                                </div>
                                <h5 className="fw-bold text-uppercase mb-3">Lorem Ipsum</h5>
                                <p className="text-secondary small lh-relaxed mb-0">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {/* Berita Kami Section */}
            <section className="py-5 bg-light">
                <div className="container py-5">
                    <div className="text-center mb-5">
                        <h2 className="fw-bold text-uppercase tracking-wider">Berita Kami</h2>
                        <div className="mx-auto my-3" style={{ width: '60px', height: '3px', backgroundColor: '#000' }}></div>
                    </div>
                    
                    <div className="row g-4">
                        {/* Large Featured Card (Left) */}
                        <div className="col-lg-6 col-md-12">
                            <div className="card news-card h-100 p-3">
                                <div className="news-card-img-wrap rounded-3 mb-4" style={{ height: '320px' }}>
                                    <img src="/ASET/ella-olsson-mmnKI8kMxpc-unsplash.jpg" alt="Featured News" />
                                </div>
                                <div className="card-body p-2 d-flex flex-column justify-content-between">
                                    <div>
                                        <h4 className="fw-bold text-uppercase mb-3" style={{ fontSize: '1.15rem', lineHeight: '1.4' }}>
                                            LOREM IPSUM DOLOR SIT AMET, CONSECTETUR ADIPISCING ELIT
                                        </h4>
                                        <p className="text-secondary small lh-lg mb-4">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.
                                        </p>
                                    </div>
                                    <div className="d-flex justify-content-between align-items-center">
                                        <Link to="/berita" className="news-link-yellow">baca selengkapnya</Link>
                                        <span className="text-muted"><i className="fa-solid fa-ellipsis text-secondary-light"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        {/* 4 Small News Cards Grid (Right) */}
                        <div className="col-lg-6 col-md-12">
                            <div className="row g-4">
                                {/* Small Card 1 */}
                                <div className="col-md-6 col-12">
                                    <div className="card news-card p-3">
                                        <div className="news-card-img-wrap rounded-3 mb-3" style={{ height: '140px' }}>
                                            <img src="/ASET/sanket-shah-SVA7TyHxojY-unsplash.jpg" alt="News 1" />
                                        </div>
                                        <h5 className="fw-bold text-uppercase mb-2" style={{ fontSize: '0.95rem' }}>Lorem Ipsum</h5>
                                        <p className="text-secondary small lh-normal mb-3" style={{ fontSize: '0.78rem' }}>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo.
                                        </p>
                                        <div className="d-flex justify-content-between align-items-center">
                                            <Link to="/berita" className="news-link-yellow">baca selengkapnya</Link>
                                            <span class="text-muted"><i className="fa-solid fa-ellipsis text-secondary-light"></i></span>
                                        </div>
                                    </div>
                                </div>
                                
                                {/* Small Card 2 */}
                                <div className="col-md-6 col-12">
                                    <div className="card news-card p-3">
                                        <div className="news-card-img-wrap rounded-3 mb-3" style={{ height: '140px' }}>
                                            <img src="/ASET/jimmy-dean-Jvw3pxgeiZw-unsplash.jpg" alt="News 2" />
                                        </div>
                                        <h5 className="fw-bold text-uppercase mb-2" style={{ fontSize: '0.95rem' }}>Lorem Ipsum</h5>
                                        <p className="text-secondary small lh-normal mb-3" style={{ fontSize: '0.78rem' }}>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo.
                                        </p>
                                        <div className="d-flex justify-content-between align-items-center">
                                            <Link to="/berita" className="news-link-yellow">baca selengkapnya</Link>
                                            <span class="text-muted"><i className="fa-solid fa-ellipsis text-secondary-light"></i></span>
                                        </div>
                                    </div>
                                </div>
                                
                                {/* Small Card 3 */}
                                <div className="col-md-6 col-12">
                                    <div className="card news-card p-3">
                                        <div className="news-card-img-wrap rounded-3 mb-3" style={{ height: '140px' }}>
                                            <img src="/ASET/sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg" alt="News 3" />
                                        </div>
                                        <h5 className="fw-bold text-uppercase mb-2" style={{ fontSize: '0.95rem' }}>Lorem Ipsum</h5>
                                        <p className="text-secondary small lh-normal mb-3" style={{ fontSize: '0.78rem' }}>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo.
                                        </p>
                                        <div className="d-flex justify-content-between align-items-center">
                                            <Link to="/berita" className="news-link-yellow">baca selengkapnya</Link>
                                            <span class="text-muted"><i className="fa-solid fa-ellipsis text-secondary-light"></i></span>
                                        </div>
                                    </div>
                                </div>
                                
                                {/* Small Card 4 */}
                                <div className="col-md-6 col-12">
                                    <div className="card news-card p-3">
                                        <div className="news-card-img-wrap rounded-3 mb-3" style={{ height: '140px' }}>
                                            <img src="/ASET/brooke-lark-oaz0raysASk-unsplash.jpg" alt="News 4" />
                                        </div>
                                        <h5 className="fw-bold text-uppercase mb-2" style={{ fontSize: '0.95rem' }}>Lorem Ipsum</h5>
                                        <p className="text-secondary small lh-normal mb-3" style={{ fontSize: '0.78rem' }}>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo.
                                        </p>
                                        <div className="d-flex justify-content-between align-items-center">
                                            <Link to="/berita" className="news-link-yellow">baca selengkapnya</Link>
                                            <span class="text-muted"><i className="fa-solid fa-ellipsis text-secondary-light"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {/* Galeri Kami Section */}
            <section className="py-5 bg-white text-center">
                <div className="container py-5">
                    <div className="mb-5">
                        <h2 className="fw-bold text-uppercase tracking-wider">Galeri Kami</h2>
                        <div className="mx-auto my-3" style={{ width: '60px', height: '3px', backgroundColor: '#000' }}></div>
                    </div>
                    
                    <div className="row g-4 mb-5">
                        {/* Image 1 */}
                        <div className="col-lg-4 col-md-6 col-12">
                            <div className="gallery-image-wrap">
                                <img src="/ASET/jonathan-borba-Gkc_xM3VY34-unsplash.jpg" alt="Gallery 1" />
                            </div>
                        </div>
                        {/* Image 2 */}
                        <div className="col-lg-4 col-md-6 col-12">
                            <div className="gallery-image-wrap">
                                <img src="/ASET/anna-pelzer-IGfIGP5ONV0-unsplash.jpg" alt="Gallery 2" />
                            </div>
                        </div>
                        {/* Image 3 */}
                        <div className="col-lg-4 col-md-6 col-12">
                            <div className="gallery-image-wrap">
                                <img src="/ASET/img-4.png" alt="Gallery 3" />
                            </div>
                        </div>
                        {/* Image 4 */}
                        <div className="col-lg-4 col-md-6 col-12">
                            <div className="gallery-image-wrap">
                                <img src="/ASET/anh-nguyen-kcA-c3f_3FE-unsplash.jpg" alt="Gallery 4" />
                            </div>
                        </div>
                        {/* Image 5 */}
                        <div className="col-lg-4 col-md-6 col-12">
                            <div className="gallery-image-wrap">
                                <img src="/ASET/mariana-medvedeva-iNwCO9ycBlc-unsplash.jpg" alt="Gallery 5" />
                            </div>
                        </div>
                        {/* Image 6 */}
                        <div className="col-lg-4 col-md-6 col-12">
                            <div className="gallery-image-wrap">
                                <img src="/ASET/fathul-abrar-T-qI_MI2EMA-unsplash.jpg" alt="Gallery 6" />
                            </div>
                        </div>
                    </div>
                    
                    <Link to="/galeri" className="btn btn-black">Lihat Lebih Banyak</Link>
                </div>
            </section>
        </div>
    );
}
