<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Section;        // model artikel
use App\Models\Gallery;        // model galeri 
use App\Models\CalendarEvent;  // model kalender 

/*
|-------------------------------------------------------------------
| Public API endpoints (read-only) untuk frontend
|-------------------------------------------------------------------
*/

Route::get('/artikel', function () {
    // kembalikan daftar artikel terbaru
    return response()->json(Section::latest('published_at')->get());
});

Route::get('/artikel/{id}', function ($id) {
    $artikel = Section::find($id);
    if (!$artikel) return response()->json(['message' => 'Artikel tidak ditemukan'], 404);
    return response()->json($artikel);
});

Route::get('/galeri', function () {
    return response()->json(Gallery::latest()->get());
});

Route::get('/kalender', function () {
    return response()->json(CalendarEvent::orderBy('start_date', 'asc')->get());
});
