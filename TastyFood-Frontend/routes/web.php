<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;

// Custom login route that redirects to Backend login
Route::get('/login', function () {
    return redirect()->away('http://127.0.0.1:8001/login');
})->name('login');

Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        $backendUrl = env('BACKEND_API_URL', 'http://127.0.0.1:8001/api');
        
        // Fetch latest 5 news (1 featured + 4 small)
        try {
            $newsResponse = Http::timeout(3)->get($backendUrl . '/news', ['limit' => 5]);
            $news = $newsResponse->successful() ? $newsResponse->json() : [];
        } catch (\Exception $e) {
            $news = [];
        }

        // Fetch latest 6 gallery images
        try {
            $galleryResponse = Http::timeout(3)->get($backendUrl . '/gallery', ['limit' => 6]);
            $gallery = $galleryResponse->successful() ? $galleryResponse->json() : [];
        } catch (\Exception $e) {
            $gallery = [];
        }

        return view('home', compact('news', 'gallery'));
    })->name('home');

    Route::get('/tentang', function () {
        return view('tentang');
    })->name('tentang');

    Route::get('/berita', function () {
        $backendUrl = env('BACKEND_API_URL', 'http://127.0.0.1:8001/api');
        
        try {
            $newsResponse = Http::timeout(3)->get($backendUrl . '/news');
            $news = $newsResponse->successful() ? $newsResponse->json() : [];
        } catch (\Exception $e) {
            $news = [];
        }

        return view('berita', compact('news'));
    })->name('berita');

    Route::get('/galeri', function () {
        $backendUrl = env('BACKEND_API_URL', 'http://127.0.0.1:8001/api');
        
        try {
            $galleryResponse = Http::timeout(3)->get($backendUrl . '/gallery');
            $gallery = $galleryResponse->successful() ? $galleryResponse->json() : [];
        } catch (\Exception $e) {
            $gallery = [];
        }

        return view('galeri', compact('gallery'));
    })->name('galeri');

    Route::get('/kontak', function () {
        return view('kontak');
    })->name('kontak');

    Route::post('/kontak', function (Request $request) {
        $backendUrl = env('BACKEND_API_URL', 'http://127.0.0.1:8001/api');
        
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        try {
            $response = Http::timeout(3)->post($backendUrl . '/contact', $validated);
            if ($response->successful()) {
                return redirect()->route('kontak')->with('success', 'Pesan Anda telah berhasil terkirim!');
            }
            return redirect()->route('kontak')->withErrors(['api' => 'Gagal mengirim pesan ke server.']);
        } catch (\Exception $e) {
            return redirect()->route('kontak')->withErrors(['api' => 'Koneksi ke backend gagal.']);
        }
    })->name('kontak.send');

    // Profile Settings
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Logout
    Route::post('/logout', function (Request $request) {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    })->name('logout');

});
