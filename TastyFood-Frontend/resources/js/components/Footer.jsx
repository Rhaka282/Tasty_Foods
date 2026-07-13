import React from 'react';
import { Link } from 'react-router-dom';

export default function Footer() {
    return (
        <footer class="footer-bg text-white py-5">
            <div class="container py-4">
                <div class="row g-5">
                    {/* Brand Info */}
                    <div class="col-lg-4 col-md-12">
                        <h4 class="fw-bold text-white mb-4 text-uppercase">Tasty Food</h4>
                        <p class="text-secondary-light lh-lg" style={{ fontSize: '0.9rem', color: '#a0a0a0' }}>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <div class="d-flex gap-3 mt-4">
                            <a href="#" class="social-circle fb" title="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="social-circle tw" title="Twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                    
                    {/* Useful Links */}
                    <div class="col-lg-2 col-md-4 col-6">
                        <h5 class="fw-bold text-white mb-4 text-uppercase" style={{ fontSize: '1.05rem' }}>Useful links</h5>
                        <ul class="list-unstyled d-flex flex-column gap-3" style={{ fontSize: '0.85rem' }}>
                            <li><Link to="/berita" class="footer-link">Blog</Link></li>
                            <li><a href="#" class="footer-link">Hewan</a></li>
                            <li><Link to="/galeri" class="footer-link">Galeri</Link></li>
                            <li><a href="#" class="footer-link">Testimonial</a></li>
                        </ul>
                    </div>
                    
                    {/* Privacy Links */}
                    <div class="col-lg-2 col-md-4 col-6">
                        <h5 class="fw-bold text-white mb-4 text-uppercase" style={{ fontSize: '1.05rem' }}>Privacy</h5>
                        <ul class="list-unstyled d-flex flex-column gap-3" style={{ fontSize: '0.85rem' }}>
                            <li><a href="#" class="footer-link">Karir</a></li>
                            <li><Link to="/tentang" class="footer-link">Tentang Kami</Link></li>
                            <li><Link to="/kontak" class="footer-link">Kontak Kami</Link></li>
                            <li><a href="#" class="footer-link">Servis</a></li>
                        </ul>
                    </div>
                    
                    {/* Contact Info */}
                    <div class="col-lg-4 col-md-4 col-12">
                        <h5 class="fw-bold text-white mb-4 text-uppercase" style={{ fontSize: '1.05rem' }}>Contact Info</h5>
                        <ul class="list-unstyled d-flex flex-column gap-3" style={{ fontSize: '0.88rem', color: '#a0a0a0' }}>
                            <li class="d-flex align-items-center gap-3">
                                <span class="footer-icon-wrap"><i class="fas fa-envelope text-white"></i></span>
                                <span class="text-white">tastyfood@gmail.com</span>
                            </li>
                            <li class="d-flex align-items-center gap-3">
                                <span class="footer-icon-wrap"><i class="fas fa-phone text-white"></i></span>
                                <span class="text-white">+62 812 3456 7890</span>
                            </li>
                            <li class="d-flex align-items-start gap-3">
                                <span class="footer-icon-wrap mt-1"><i class="fas fa-map-marker-alt text-white"></i></span>
                                <span class="text-white lh-base">Kota Bandung, Jawa Barat</span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="border-top border-secondary mt-5 pt-4 text-center">
                    <p class="small text-secondary mb-0" style={{ color: '#666666', fontSize: '0.8rem' }}>
                        Copyright &copy;2023 All rights reserved
                    </p>
                </div>
            </div>
        </footer>
    );
}
