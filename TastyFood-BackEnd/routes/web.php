<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

// Redirect Breeze dashboard route to admin.dashboard or frontend for users
Route::get('/dashboard', function () {
    if (auth()->check() && auth()->user()->role !== 'admin') {
        return redirect()->away('http://127.0.0.1:8000');
    }
    return redirect()->route('admin.dashboard');
})->name('dashboard');

Route::middleware(['auth', 'verified', \App\Http\Middleware\CheckAdmin::class])->prefix('admin')->name('admin.')->group(function () {
    // Admin Dashboard
    Route::get('/dashboard', function () {
        $newsCount = \App\Models\News::count();
        $galleryCount = \App\Models\Gallery::count();
        $contactCount = \App\Models\ContactMessage::count();
        
        $latestMessages = \App\Models\ContactMessage::latest()->limit(5)->get();
        $latestNews = \App\Models\News::latest()->limit(5)->get();

        return view('admin.dashboard', compact('newsCount', 'galleryCount', 'contactCount', 'latestMessages', 'latestNews'));
    })->name('dashboard');

    // News CRUD
    Route::resource('news', NewsController::class);

    // Gallery CRUD
    Route::resource('gallery', GalleryController::class)->except(['show']);

    // Contacts Inbox
    Route::get('contacts', [ContactMessageController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{contact}', [ContactMessageController::class, 'show'])->name('contacts.show');
    Route::delete('contacts/{contact}', [ContactMessageController::class, 'destroy'])->name('contacts.destroy');

    // Settings (Tentang & Kontak)
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');

    // User Management
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::patch('users/{user}/toggle-role', [UserController::class, 'toggleRole'])->name('users.toggle-role');
    Route::patch('users/{user}/toggle-block', [UserController::class, 'toggleBlock'])->name('users.toggle-block');

    // Profile (from Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
