import React from 'react';
import { Link, NavLink, useLocation } from 'react-router-dom';

export default function Navbar() {
    const location = useLocation();
    const isHome = location.pathname === '/';

    return (
        <nav className={isHome ? 'navbar navbar-expand-lg navbar-light bg-white py-4' : 'navbar navbar-expand-lg navbar-dark bg-transparent position-absolute w-100 top-0 py-4 z-3'}>
            <div className="container">
                <Link className={`navbar-brand fw-black text-uppercase tracking-wider ${isHome ? 'text-dark' : 'text-white'}`} to="/" style={{ fontSize: '1.5rem', fontWeight: 800 }}>
                    Tasty Food
                </Link>
                <button className={`navbar-toggler ${isHome ? '' : 'border-white'}`} type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span className={`navbar-toggler-icon ${isHome ? '' : 'filter-white'}`}></span>
                </button>
                <div className="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul className="navbar-nav gap-lg-4 text-uppercase fw-semibold" style={{ fontSize: '0.85rem', letterSpacing: '1.5px' }}>
                        <li className="nav-item">
                            <NavLink className={({ isActive }) => `nav-link ${isActive ? 'active' : ''} ${!isHome ? 'text-white' : 'text-dark'}`} to="/">
                                Home
                            </NavLink>
                        </li>
                        <li className="nav-item">
                            <NavLink className={({ isActive }) => `nav-link ${isActive ? 'active' : ''} ${!isHome ? 'text-white' : 'text-dark'}`} to="/tentang">
                                Tentang
                            </NavLink>
                        </li>
                        <li className="nav-item">
                            <NavLink className={({ isActive }) => `nav-link ${isActive ? 'active' : ''} ${!isHome ? 'text-white' : 'text-dark'}`} to="/berita">
                                Berita
                            </NavLink>
                        </li>
                        <li className="nav-item">
                            <NavLink className={({ isActive }) => `nav-link ${isActive ? 'active' : ''} ${!isHome ? 'text-white' : 'text-dark'}`} to="/galeri">
                                Galeri
                            </NavLink>
                        </li>
                        <li className="nav-item">
                            <NavLink className={({ isActive }) => `nav-link ${isActive ? 'active' : ''} ${!isHome ? 'text-white' : 'text-dark'}`} to="/kontak">
                                Kontak
                            </NavLink>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    );
}
