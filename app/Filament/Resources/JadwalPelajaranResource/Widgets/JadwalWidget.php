<?php

namespace App\Filament\Resources\JadwalPelajaranResource\Widgets;

use App\Models\JadwalPelajaran;
use Filament\Widgets\Widget;

class JadwalWidget extends Widget
{
    protected static string $view = 'filament.widgets.calendar-grid';

    protected int|string|array $columnSpan = 'full';

    protected function getViewData(): array
    {
        $kelas = 'XA'; // fokus kelas

        $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];

        $jamList = [
            '07:30 - 09:00',
            '09:00 - 10:30',
            '11:00 - 12:30',
        ];

        // ambil jadwal kelas XA
        $jadwal = JadwalPelajaran::query()
            ->where('kelas', $kelas)
            ->orderBy('jam_mulai')
            ->get()
            ->groupBy('hari');

        return [
            'kelas'    => $kelas,
            'hariList' => $hariList,
            'jamList'  => $jamList,
            'jadwal'   => $jadwal,
        ];
    }
}
