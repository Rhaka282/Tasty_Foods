import React, { useEffect } from 'react';

export default function Galeri() {
    // Scroll to top when page is rendered
    useEffect(() => {
        window.scrollTo(0, 0);
    }, []);

    const galleryImages = [
        '/ASET/jonathan-borba-Gkc_xM3VY34-unsplash.jpg',
        '/ASET/anna-pelzer-IGfIGP5ONV0-unsplash.jpg',
        '/ASET/img-1.png',
        '/ASET/brooke-lark-nBtmglfY0HU-unsplash.jpg',
        '/ASET/jonathan-borba-Gkc_xM3VY34-unsplash.jpg',
        '/ASET/img-4.png',
        '/ASET/ella-olsson-mmnKI8kMxpc-unsplash.jpg',
        '/ASET/sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg',
        '/ASET/brooke-lark-oaz0raysASk-unsplash.jpg',
        '/ASET/jimmy-dean-Jvw3pxgeiZw-unsplash.jpg',
        '/ASET/sanket-shah-SVA7TyHxojY-unsplash.jpg',
        '/ASET/fathul-abrar-T-qI_MI2EMA-unsplash.jpg'
    ];

    return (
        <div className="galeri-page">
            {/* Banner Section */}
            <section className="sub-banner" style={{ backgroundImage: "url('/ASET/fathul-abrar-T-qI_MI2EMA-unsplash.jpg')" }}>
                <div className="container text-center text-lg-start">
                    <h1 className="sub-banner-title text-uppercase">Galeri Kami</h1>
                </div>
            </section>

            {/* Carousel Slider Section */}
            <section className="py-5 bg-white">
                <div className="container py-5">
                    <div id="galleryCarousel" className="carousel slide gallery-carousel" data-bs-ride="carousel">
                        <div className="carousel-inner">
                            {/* Slide 1 */}
                            <div className="carousel-item active">
                                <img src="/ASET/anna-pelzer-IGfIGP5ONV0-unsplash.jpg" alt="Grain Salad Bowl" />
                            </div>
                            {/* Slide 2 */}
                            <div className="carousel-item">
                                <img src="/ASET/ella-olsson-mmnKI8kMxpc-unsplash.jpg" alt="Mediterranean Tablespread" />
                            </div>
                            {/* Slide 3 */}
                            <div className="carousel-item">
                                <img src="/ASET/sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg" alt="Cooking Pasta" />
                            </div>
                        </div>
                        
                        {/* Controls */}
                        <button className="carousel-control-prev" type="button" data-bs-target="#galleryCarousel" data-bs-slide="prev">
                            <span className="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span className="visually-hidden">Previous</span>
                        </button>
                        <button className="carousel-control-next" type="button" data-bs-target="#galleryCarousel" data-bs-slide="next">
                            <span className="carousel-control-next-icon" aria-hidden="true"></span>
                            <span className="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </section>

            {/* Gallery Grid Section (4x3 layout) */}
            <section className="py-5 bg-light mb-4">
                <div className="container py-5">
                    <div className="row g-4">
                        {galleryImages.map((img, index) => (
                            <div className="col-xl-3 col-lg-4 col-md-6 col-12" key={index}>
                                <div className="gallery-image-wrap" style={{ aspectRatio: '1 / 1' }}>
                                    <img src={img} alt={`Gallery Food ${index + 1}`} className="img-fluid w-100 h-100" style={{ objectFit: 'cover' }} />
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </section>
        </div>
    );
}
