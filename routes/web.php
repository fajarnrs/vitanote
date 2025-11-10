<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VitaminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AboutController;

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Vitamin Routes
Route::prefix('vitamin')->group(function () {
    Route::get('/', [VitaminController::class, 'index'])->name('vitamins.index');
    Route::get('/kategori/{slug}', [VitaminController::class, 'category'])->name('vitamins.category');
    Route::get('/{slug}', [VitaminController::class, 'show'])->name('vitamins.show');
});

// Article Routes
Route::prefix('artikel')->group(function () {
    Route::get('/', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/{slug}', [ArticleController::class, 'show'])->name('articles.show');
});

// Static Pages
Route::get('/tentang-kami', [AboutController::class, 'index'])->name('about');
Route::get('/kontak', [AboutController::class, 'contact'])->name('contact');
