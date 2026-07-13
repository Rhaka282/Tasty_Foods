import React, { useState, useEffect } from 'react';

export default function Kontak() {
    // Scroll to top when page is rendered
    useEffect(() => {
        window.scrollTo(0, 0);
    }, []);

    const [formData, setFormData] = useState({
        subject: '',
        name: '',
        email: '',
        message: ''
    });

    const handleChange = (e) => {
        const { name, value } = e.target;
        setFormData(prev => ({
            ...prev,
            [name]: value
        }));
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        alert(`Terima kasih, ${formData.name}! Pesan Anda tentang "${formData.subject}" telah terkirim.`);
        setFormData({
            subject: '',
            name: '',
            email: '',
            message: ''
        });
    };

    return (
        <div className="kontak-page">
            {/* Banner Section */}
            <section className="sub-banner" style={{ backgroundImage: "url('/ASET/fathul-abrar-T-qI_MI2EMA-unsplash.jpg')" }}>
                <div className="container text-center text-lg-start">
                    <h1 className="sub-banner-title text-uppercase">Kontak Kami</h1>
                </div>
            </section>

            {/* Contact Form Section */}
            <section className="py-5 bg-white">
                <div className="container py-5">
                    <div className="mb-5">
                        <h2 className="fw-bold text-uppercase mb-4" style={{ fontSize: '2rem', letterSpacing: '1px' }}>Kontak Kami</h2>
                    </div>
                    
                    <form onSubmit={handleSubmit} className="mb-5">
                        <div className="row g-4">
                            {/* Left Side Inputs */}
                            <div className="col-lg-6 col-md-12 d-flex flex-column gap-4">
                                <input 
                                    type="text" 
                                    name="subject" 
                                    value={formData.subject}
                                    onChange={handleChange}
                                    className="form-control contact-input" 
                                    placeholder="Subject" 
                                    required 
                                />
                                <input 
                                    type="text" 
                                    name="name" 
                                    value={formData.name}
                                    onChange={handleChange}
                                    className="form-control contact-input" 
                                    placeholder="Name" 
                                    required 
                                />
                                <input 
                                    type="email" 
                                    name="email" 
                                    value={formData.email}
                                    onChange={handleChange}
                                    className="form-control contact-input" 
                                    placeholder="Email" 
                                    required 
                                />
                            </div>
                            
                            {/* Right Side Input */}
                            <div className="col-lg-6 col-md-12">
                                <textarea 
                                    name="message" 
                                    value={formData.message}
                                    onChange={handleChange}
                                    className="form-control contact-input h-100" 
                                    placeholder="Message" 
                                    rows="6" 
                                    style={{ resize: 'none' }} 
                                    required
                                ></textarea>
                            </div>
                        </div>
                        
                        <div className="row mt-4">
                            <div className="col-12">
                                <button type="submit" className="btn btn-black w-100 py-3">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>

            {/* Contact Info Cards */}
            <section className="py-5 bg-light">
                <div className="container py-5">
                    <div className="row g-4 justify-content-center">
                        {/* Email Card */}
                        <div className="col-lg-4 col-md-6 col-12">
                            <div className="contact-info-block">
                                <div className="contact-icon-circle">
                                    <img src="/ASET/ic_markunread_24px@2x.png" alt="Email Icon" />
                                </div>
                                <h5 className="fw-bold text-uppercase mb-2" style={{ fontSize: '1.1rem', letterSpacing: '1px' }}>Email</h5>
                                <p className="text-secondary mb-0" style={{ fontSize: '0.95rem' }}>tastyfood@gmail.com</p>
                            </div>
                        </div>
                        
                        {/* Phone Card */}
                        <div className="col-lg-4 col-md-6 col-12">
                            <div className="contact-info-block">
                                <div className="contact-icon-circle">
                                    <img src="/ASET/ic_call_24px@2x.png" alt="Phone Icon" />
                                </div>
                                <h5 className="fw-bold text-uppercase mb-2" style={{ fontSize: '1.1rem', letterSpacing: '1px' }}>Phone</h5>
                                <p className="text-secondary mb-0" style={{ fontSize: '0.95rem' }}>+62 812 3456 7890</p>
                            </div>
                        </div>
                        
                        {/* Location Card */}
                        <div className="col-lg-4 col-md-6 col-12">
                            <div className="contact-info-block">
                                <div className="contact-icon-circle">
                                    <img src="/ASET/ic_place_24px@2x.png" alt="Location Icon" />
                                </div>
                                <h5 className="fw-bold text-uppercase mb-2" style={{ fontSize: '1.1rem', letterSpacing: '1px' }}>Location</h5>
                                <p className="text-secondary mb-0" style={{ fontSize: '0.95rem' }}>Kota Bandung, Jawa Barat</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {/* Map Section */}
            <section className="py-5 bg-white mb-4">
                <div className="container py-4">
                    <div className="map-container">
                        {/* Interactive Embedded Google Map of Bandung */}
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.20140228813!2d107.5731165!3d-6.9034443!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6398252477f%3A0x146a1f9a0f47b330!2sBandung%2C%20Bandung%20City%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1718610000000!5m2!1sen!2sid" 
                            allowFullScreen="" 
                            loading="lazy" 
                            referrerPolicy="no-referrer-when-downgrade"
                            title="Bandung Map"
                        ></iframe>
                    </div>
                </div>
            </section>
        </div>
    );
}
