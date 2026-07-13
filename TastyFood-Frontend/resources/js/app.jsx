import './bootstrap';
import React from 'react';
import ReactDOM from 'react-dom/client';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';

// Layout components
import Navbar from './components/Navbar';
import Footer from './components/Footer';

// Page components
import Home from './pages/Home';
import Tentang from './pages/Tentang';
import Berita from './pages/Berita';
import Galeri from './pages/Galeri';
import Kontak from './pages/Kontak';

function App() {
    return (
        <Router>
            <div className="d-flex flex-column min-vh-100">
                <Navbar />
                <main className="flex-grow-1">
                    <Routes>
                        <Route path="/" element={<Home />} />
                        <Route path="/tentang" element={<Tentang />} />
                        <Route path="/berita" element={<Berita />} />
                        <Route path="/galeri" element={<Galeri />} />
                        <Route path="/kontak" element={<Kontak />} />
                    </Routes>
                </main>
                <Footer />
            </div>
        </Router>
    );
}

const rootElement = document.getElementById('app');
if (rootElement) {
    const root = ReactDOM.createRoot(rootElement);
    root.render(
        <React.StrictMode>
            <App />
        </React.StrictMode>
    );
}
