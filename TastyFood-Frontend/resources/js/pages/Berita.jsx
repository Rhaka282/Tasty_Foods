import React, { useEffect } from 'react';

export default function Berita() {
    // Scroll to top when page is rendered
    useEffect(() => {
        window.scrollTo(0, 0);
    }, []);

    const newsAssets = [
        { img: '/ASET/sanket-shah-SVA7TyHxojY-unsplash.jpg', title: 'LOREM IPSUM' },
        { img: '/ASET/jimmy-dean-Jvw3pxgeiZw-unsplash.jpg', title: 'LOREM IPSUM' },
        { img: '/ASET/sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg', title: 'LOREM IPSUM' },
        { img: '/ASET/ella-olsson-mmnKI8kMxpc-unsplash.jpg', title: 'LOREM IPSUM' }
    ];

    // Generate 8 items by repeating the array twice
    const allNews = [...newsAssets, ...newsAssets];

    return (
        <div className="berita-page">
            {/* Banner Section */}
            <section className="sub-banner" style={{ backgroundImage: "url('/ASET/fathul-abrar-T-qI_MI2EMA-unsplash.jpg')" }}>
                <div className="container text-center text-lg-start">
                    <h1 className="sub-banner-title text-uppercase">Berita Kami</h1>
                </div>
            </section>

            {/* Featured Post Section */}
            <section className="py-5 bg-white">
                <div className="container py-5">
                    <div className="row align-items-center g-5">
                        {/* Left Image */}
                        <div className="col-lg-6 col-md-12">
                            <div className="gallery-image-wrap rounded-4" style={{ aspectRatio: '4 / 3' }}>
                                <img src="/ASET/img-4.png" alt="Featured Makanan Nusantara" className="img-fluid w-100 h-100" style={{ objectFit: 'cover' }} />
                            </div>
                        </div>
                        {/* Right Text */}
                        <div className="col-lg-6 col-md-12">
                            <h2 className="fw-black text-uppercase mb-4" style={{ fontSize: '2rem', lineHeight: 1.3, letterSpacing: '1px' }}>
                                Apa saja makanan khas Nusantara?
                            </h2>
                            <p className="text-secondary lh-lg mb-4 text-justify" style={{ fontSize: '0.95rem' }}>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.
                            </p>
                            <p className="text-secondary lh-lg mb-5 text-justify" style={{ fontSize: '0.95rem' }}>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.
                            </p>
                            <a href="#" className="btn btn-black">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </section>

            {/* Berita Lainnya Section */}
            <section className="py-5 bg-light mb-4">
                <div className="container py-5">
                    <div className="mb-5">
                        <h3 className="fw-bold text-uppercase tracking-wider">Berita Lainnya</h3>
                        <div className="my-3" style={{ width: '60px', height: '3px', backgroundColor: '#000' }}></div>
                    </div>
                    
                    <div className="row g-4">
                        {allNews.map((item, index) => (
                            <div className="col-xl-3 col-lg-6 col-md-6 col-12" key={index}>
                                <div className="card news-card p-3 h-100 d-flex flex-column justify-content-between">
                                    <div>
                                        <div className="news-card-img-wrap rounded-3 mb-3" style={{ height: '160px' }}>
                                            <img src={item.img} alt={item.title} />
                                        </div>
                                        <h5 className="fw-bold text-uppercase mb-2" style={{ fontSize: '0.95rem' }}>{item.title}</h5>
                                        <p className="text-secondary small lh-relaxed mb-4" style={{ fontSize: '0.8rem' }}>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo.
                                        </p>
                                    </div>
                                    <div className="d-flex justify-content-between align-items-center">
                                        <a href="#" className="news-link-yellow">baca selengkapnya</a>
                                        <span className="text-muted"><i className="fa-solid fa-ellipsis text-secondary-light"></i></span>
                                    </div>
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </section>
        </div>
    );
}
