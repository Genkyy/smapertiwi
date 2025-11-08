<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Halaman artikel (daftar) + search + pagination
     */
    public function index(Request $request)
    {
        // Ambil keywords pencarian
        $search = $request->input('search');

        // Query dasar
        $artikels = Section::select('id', 'tittle', 'thumbnail', 'post_as', 'published_at', 'content')
            ->when($search, function ($q) use ($search) {
                $q->where('tittle', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            })
            // jika published_at null, maka fallback ke created_at
            ->orderByRaw('COALESCE(published_at, created_at) DESC')
            ->paginate(6);

        // Supaya pagination ikut query search
        $artikels->appends(['search' => $search]);

        return view('artikel', compact('artikels', 'search'));
    }

    /**
     * Halaman detail artikel (show)
     */
    public function show($id)
    {
        $artikel = Section::findOrFail($id);

        return view('isiartikel', compact('artikel'));
    }
}
