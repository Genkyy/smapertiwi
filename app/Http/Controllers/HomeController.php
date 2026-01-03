<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil 3 terbaru per kategori
        $latestBerita = Section::where('post_as', 'berita')->latest('published_at')->take(3)->get();
        $latestPengumuman = Section::where('post_as', 'pengumuman')->latest('published_at')->take(3)->get();
        $latestArtikel = Section::where('post_as', 'artikel')->latest('published_at')->take(3)->get();

        // Gabungkan semua tanpa duplikasi
        $artikels = $latestBerita->merge($latestPengumuman)->merge($latestArtikel)->unique('id')->sortByDesc('published_at');

        // Ambil **6 item terbaru** untuk "Semua"
        $artikelsSemua = Section::latest('published_at')->take(6)->get(); // ambil langsung dari DB

        return view('index', compact('artikels', 'artikelsSemua'));
    }
}
