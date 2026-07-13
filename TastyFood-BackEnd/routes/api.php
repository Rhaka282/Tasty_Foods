<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactMessageController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Public REST APIs for Tasty Food Frontend
Route::get('/news', [NewsController::class, 'apiIndex']);
Route::get('/news/{idOrSlug}', [NewsController::class, 'apiShow']);
Route::get('/gallery', [GalleryController::class, 'apiIndex']);
Route::post('/contact', [ContactMessageController::class, 'apiStore']);
