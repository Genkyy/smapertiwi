<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\KalenderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PdfSiswaController;
use App\Http\Controllers\PdfRaporSiswaController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Cek Laravel
Route::get('/cek', function () {
    return " Laravel hidup dan route berfungsi";
});

// Halaman utama
Route::get('/', [HomeController::class, 'index'])->name('home');

// Artikel
Route::get('/artikel', [SectionController::class, 'index'])->name('artikel.index');
Route::get('/artikel/{id}', [SectionController::class, 'show'])->name('artikel.show');

// Kalender
Route::get('/kalender', [KalenderController::class, 'index'])->name('kalender');

//pendaftaran
Route::get('/pendaftaran', [PendaftaranController::class, 'create']);
Route::post('/pendaftaran', [PendaftaranController::class, 'store'])
    ->name('pendaftaran.store');

    Route::get('/pembayaran/{student}', [PaymentController::class, 'show'])
    ->name('payment.show');

Route::post('/pembayaran/{student}', [PaymentController::class, 'store'])
    ->name('payment.store');

    Route::get('/siswa/{student}/cv', [PdfSiswaController::class, 'cv'])
    ->name('siswa.cv');

Route::get('/rapor/{student}/{rapor}', [PdfRaporSiswaController::class, 'rapor'])
    ->name('siswa.rapor');

// Halaman lainnya
Route::view('/galeri', 'galeri')->name('galeri');
Route::view('/fasilitas', 'fasilitas')->name('fasilitas');
Route::view('/profil', 'profil')->name('profil');
Route::view('/tenagapendidik', 'tenagapendidik')->name('tenagapendidik');
Route::view('/visimisi', 'visimisi')->name('visimisi');
Route::view('/kontak', 'kontak')->name('kontak');
Route::view('/spmb', 'spmb')->name('spmb');
Route::view('/hasilspmb', 'hasilspmb')->name('hasilspmb');
Route::view('/sambutan', 'sambutan')->name('sambutan');
Route::view('/formpendaftaran', 'formpendaftaran')->name('formpendaftaran');
Route::view('/hasilspmb', 'hasilspmb')->name('hasilspmb');
Route::view('/pembayaran', 'pembayaran')->name('pembayaran');
Route::view('/eskul', 'eskul')->name('eskul');
