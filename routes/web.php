<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\KalenderController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Cek Laravel
Route::get('/cek', function () {
    return "✅ Laravel hidup dan route berfungsi";
});

// Halaman utama
Route::get('/', [HomeController::class, 'index'])->name('home');

// Artikel
Route::get('/artikel', [SectionController::class, 'index'])->name('artikel.index');
Route::get('/artikel/{id}', [SectionController::class, 'show'])->name('artikel.show');

// Kalender
Route::get('/kalender', [KalenderController::class, 'index'])->name('kalender');

// Halaman lainnya
Route::view('/galeri', 'galeri')->name('galeri');
Route::view('/fasilitas', 'fasilitas')->name('fasilitas');
Route::view('/profil', 'profil')->name('profil');
Route::view('/tenagapendidik', 'tenagapendidik')->name('tenagapendidik');
Route::view('/visimisi', 'visimisi')->name('visimisi');
Route::view('/kontak', 'kontak')->name('kontak');
Route::view('/spmb', 'spmb')->name('spmb');
Route::view('/sambutan', 'sambutan')->name('sambutan');
Route::view('/hasilspmb', 'hasilspmb')->name('hasilspmb');
Route::view('/eskul', 'eskul')->name('eskul');
