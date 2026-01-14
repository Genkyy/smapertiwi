<?php

namespace App\Http\Controllers;

use App\Models\JadwalPelajaran;
use Barryvdh\DomPDF\Facade\Pdf;

class JadwalPelajaranController extends Controller
{
    /**
     * Cetak Jadwal Pelajaran per Kelas (PDF)
     */
    public function cetak(string $kelas)
    {
        $jadwal = JadwalPelajaran::where('kelas', $kelas)
            ->orderByRaw("
                FIELD(hari, 'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu')
            ")
            ->orderBy('jam_mulai')
            ->get();

        return Pdf::loadView('pdf.jadwal', [
                'jadwal' => $jadwal,
                'kelas'  => $kelas,
            ])
            ->stream("Jadwal-Pelajaran-$kelas.pdf");
    }
}
