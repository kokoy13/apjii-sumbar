<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\PublicPostController;

// ==========================================
// FRONTEND ROUTES (Halaman Publik)
// ==========================================
Route::get('/', [PublicPostController::class, 'home'])->name('home');
Route::get('/tentang-kami', function(){
    return view('frontend.tentang-kami');
})->name('tentang-kami');
Route::get('/kepengurusan', [PublicPostController::class, 'kepengurusan'])->name('kepengurusan');
Route::get('/keanggotaan', function(){
    return view('frontend.keanggotaan');
})->name('keanggotaan');
Route::get('/download', [DownloadController::class, 'frontendIndex'])->name('download');
Route::get('/kontak', function(){
    return view('frontend.kontak');
})->name('kontak');
Route::get('/berita', [PublicPostController::class, 'index'])->name('posts.index');
Route::get('/berita/{slug}', [PublicPostController::class, 'show'])->name('posts.show');

// ==========================================
// BACKEND ROUTES (Panel Admin)
// ==========================================
Route::get('/dashboard', function () {
    return redirect()->route('admin.posts.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Grup untuk semua fitur Admin (URL menggunakan /admin/..., Name menggunakan admin....)
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('categories', CategoryController::class)->except(['show']);
        Route::resource('posts', PostController::class)->except(['show']);
        
        // Rute CRUD untuk Dokumen Unduhan
        Route::resource('downloads', DownloadController::class)->except(['show']);
    });
});

require __DIR__.'/auth.php';