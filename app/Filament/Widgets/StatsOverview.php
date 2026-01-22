<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Student;
use App\Models\GuruStaff as Guru;
use App\Models\Presensi as Attendance;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class StatsOverview extends StatsOverviewWidget
{
    protected int | string | array $columnSpan = 8;
    protected function getStats(): array
    {
        $cacheKey = 'stats_overview:' . today()->toDateString();

        [$studentTotals, $guruTotals, $attendanceTotals] = Cache::remember($cacheKey, 60, function () {
            $studentTotals = Student::selectRaw("COUNT(*) as total, SUM(CASE WHEN jenis_kelamin = 'Laki-laki' THEN 1 ELSE 0 END) as laki, SUM(CASE WHEN jenis_kelamin = 'Perempuan' THEN 1 ELSE 0 END) as perempuan")->first();

            $guruTotals = Guru::selectRaw("COUNT(*) as total, SUM(CASE WHEN jenis_kelamin = 'Laki-laki' THEN 1 ELSE 0 END) as laki, SUM(CASE WHEN jenis_kelamin = 'Perempuan' THEN 1 ELSE 0 END) as perempuan")->first();

            $attendanceTotals = Attendance::whereDate('tanggal', today())
                ->selectRaw("SUM(CASE WHEN status = 'hadir' THEN 1 ELSE 0 END) as hadir, COUNT(*) as total")
                ->first();

            return [ $studentTotals, $guruTotals, $attendanceTotals ];
        });

        $totalSiswa = (int) ($studentTotals->total ?? 0);
        $siswaLaki = (int) ($studentTotals->laki ?? 0);
        $siswaPerempuan = (int) ($studentTotals->perempuan ?? 0);

        $totalGuru = (int) ($guruTotals->total ?? 0);
        $guruLaki = (int) ($guruTotals->laki ?? 0);
        $guruPerempuan = (int) ($guruTotals->perempuan ?? 0);

        $hadirHariIni = (int) ($attendanceTotals->hadir ?? 0);
        $totalAbsensiHariIni = (int) ($attendanceTotals->total ?? 0);

        $persentaseHadir = $totalAbsensiHariIni > 0
            ? round(($hadirHariIni / $totalAbsensiHariIni) * 100)
            : 0;

        return [
            Stat::make('Total Siswa', $totalSiswa)
                ->description("{$siswaLaki} Laki-Laki • {$siswaPerempuan} Perempuan")
                ->icon('heroicon-o-users')
                ->color('primary'),

            Stat::make('Total Guru', $totalGuru)
                ->description("{$guruLaki} Laki-Laki • {$guruPerempuan} Perempuan")
                ->icon('heroicon-o-academic-cap')
                ->color('info'),

            Stat::make('Kehadiran', '-')
                ->description('Belum tersedia')
                ->icon('heroicon-o-clock')
                ->color('gray'),

        ];
    }
}
