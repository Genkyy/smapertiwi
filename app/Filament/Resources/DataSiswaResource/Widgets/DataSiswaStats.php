<?php

namespace App\Filament\Resources\DataSiswaResource\Widgets;

use App\Models\Student;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DataSiswaStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $totalSiswa = Student::count();
        $siswaAktif = Student::whereIn('status', ['aktif','baru'])->count();

        $kelasX   = Student::where('kelas', 'X')->count();
        $kelasXI  = Student::where('kelas', 'XI')->count();
        $kelasXII = Student::where('kelas', 'XII')->count();

        return [
            // 🔵 TOTAL SISWA
            Stat::make('Total Seluruh Siswa', $totalSiswa)
                ->description('Semua siswa terdaftar')
                ->icon('heroicon-o-users')
                ->color('primary'),

            // 🟢 SISWA AKTIF
            Stat::make('Siswa Aktif', $siswaAktif)
                ->description('Masih aktif belajar')
                ->icon('heroicon-o-check-badge')
                ->color('success'),

            // 🟣 DISTRIBUSI KELAS
            Stat::make(
                'Distribusi Kelas',
                "X: {$kelasX}  •  XI: {$kelasXI}  •  XII: {$kelasXII}"
            )
                ->description('Jumlah siswa per jenjang')
                ->icon('heroicon-o-chart-pie')
                ->color('warning'),
        ];
    }

    /**
     * Biar tampilan rapi 3 kolom
     */
    protected function getColumns(): int
    {
        return 3;
    }
}
