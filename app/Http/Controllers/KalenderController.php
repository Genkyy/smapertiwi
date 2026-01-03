<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalendarEvent;
use Carbon\Carbon;

class KalenderController extends Controller
{
    public function index(Request $request)
    {
        // Ambil tahun dari query atau default ke tahun sekarang
        $tahun = (int) $request->query('tahun', date('Y'));

        // Ambil semua event pada tahun itu
        $rows = CalendarEvent::whereYear('tanggal', $tahun)->get();

        // Susun data event berdasarkan tanggal
        $events = [];

        foreach ($rows as $r) {
            // tanggal dikonversi ke Carbon (meski di model belum cast)
            $tanggal = Carbon::parse($r->tanggal)->format('Y-m-d');

            $events[$tanggal][] = [
                'judul' => $r->judul,
                'kategori' => $r->kategori,
            ];
        }

        return view('kalender', [
            'tahun' => $tahun,
            'events' => $events,
        ]);
    }
}
