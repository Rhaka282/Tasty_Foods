import React, { useEffect } from 'react';

export default function Tentang() {
    // Scroll to top when page is rendered
    useEffect(() => {
        window.scrollTo(0, 0);
    }, []);

    return (
        <div className="tentang-page">
            {/* Banner Section */}
            <section className="sub-banner" style={{ backgroundImage: "url('/ASET/fathul-abrar-T-qI_MI2EMA-unsplash.jpg')" }}>
                <div className="container text-center text-lg-start">
                    <h1 className="sub-banner-title text-uppercase">Tentang Kami</h1>
                </div>
            </section>

            {/* Tasty Food Section */}
            <section className="py-5 bg-white">
                <div className="container py-5">
                    <div className="row align-items-center g-5">
                        <div className="col-lg-6 col-md-12">
                            <h2 className="fw-bold text-uppercase mb-4" style={{ fontSize: '2rem', letterSpacing: '1px' }}>Tasty Food</h2>
                            <p className="text-secondary lh-lg mb-4 text-justify" style={{ fontSize: '0.95rem' }}>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.
                            </p>
                            <p className="text-secondary lh-lg mb-0 text-justify" style={{ fontSize: '0.95rem' }}>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.
                            </p>
                        </div>
                        <div className="col-lg-6 col-md-12">
                            <div className="row g-4">
                                <div className="col-6">
                                    <img src="/ASET/jonathan-borba-Gkc_xM3VY34-unsplash.jpg" alt="Tasty Food Salad" className="img-fluid about-grid-img" style={{ aspectRatio: '3 / 4', objectFit: 'cover' }} />
                                </div>
                                <div className="col-6">
                                    <img src="/ASET/jimmy-dean-Jvw3pxgeiZw-unsplash.jpg" alt="Tasty Food Plating" className="img-fluid about-grid-img" style={{ aspectRatio: '3 / 4', objectFit: 'cover' }} />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {/* Visi Section */}
            <section className="py-5 bg-light">
                <div className="container py-5">
                    <div className="row align-items-center g-5 flex-column-reverse flex-lg-row">
                        <div className="col-lg-6 col-md-12">
                            <div className="row g-4">
                                <div className="col-6">
                                    <img src="/ASET/ella-olsson-mmnKI8kMxpc-unsplash.jpg" alt="Visi Image 1" className="img-fluid about-grid-img" style={{ aspectRatio: '1 / 1', objectFit: 'cover' }} />
                                </div>
                                <div className="col-6">
                                    <img src="/ASET/anh-nguyen-kcA-c3f_3FE-unsplash.jpg" alt="Visi Image 2" className="img-fluid about-grid-img" style={{ aspectRatio: '1 / 1', objectFit: 'cover' }} />
                                </div>
                            </div>
                        </div>
                        <div className="col-lg-6 col-md-12">
                            <h2 className="fw-bold text-uppercase mb-4" style={{ fontSize: '2rem', letterSpacing: '1px' }}>Visi</h2>
                            <p className="text-secondary lh-lg mb-0 text-justify" style={{ fontSize: '0.95rem' }}>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce scelerisque magna aliquet cursus tempus. Duis viverra metus et turpis elementum elementum. Aliquam rutrum placerat tellus et suscipit. Curabitur facilisis lectus vitae eros malesuada eleifend. Mauris eget tellus odio. Phasellus vestibulum turpis ac sem commodo, at posuere eros consequat. Duis nec ea at ante volutpat posuere. Morbi vel nunc tortor. Nulla facilisi. Nulla accumsan ullamcorper purus nec venenatis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer imperdiet erat vel leo rutrum lobortis.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            {/* Misi Section */}
            <section className="py-5 bg-white mb-4">
                <div className="container py-5">
                    <div className="row align-items-center g-5">
                        <div className="col-lg-6 col-md-12">
                            <h2 className="fw-bold text-uppercase mb-4" style={{ fontSize: '2rem', letterSpacing: '1px' }}>Misi</h2>
                            <p className="text-secondary lh-lg mb-0 text-justify" style={{ fontSize: '0.95rem' }}>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce scelerisque magna aliquet cursus tempus. Duis viverra metus et turpis elementum elementum. Aliquam rutrum placerat tellus et suscipit. Curabitur facilisis lectus vitae eros malesuada eleifend. Mauris eget tellus odio. Phasellus vestibulum turpis ac sem commodo, at posuere eros consequat. Duis nec ea at ante volutpat posuere. Morbi vel nunc tortor. Nulla facilisi. Nulla accumsan ullamcorper purus nec venenatis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer imperdiet erat vel leo rutrum lobortis.
                            </p>
                        </div>
                        <div className="col-lg-6 col-md-12">
                            <img src="/ASET/sanket-shah-SVA7TyHxojY-unsplash.jpg" alt="Misi Image" className="img-fluid about-grid-img w-100" style={{ aspectRatio: '16 / 9', objectFit: 'cover' }} />
                        </div>
                    </div>
                </div>
            </section>
        </div>
    );
}
