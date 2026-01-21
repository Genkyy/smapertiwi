<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Student;
use App\Models\GuruStaff as Guru;
use App\Models\Presensi as Attendance;
use Carbon\Carbon;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $totalSiswa = Student::count();
        $siswaLaki = Student::where('jenis_kelamin', 'Laki-laki')->count();
        $siswaPerempuan = Student::where('jenis_kelamin', 'Perempuan')->count();

        $totalGuru = Guru::count();
        $guruLaki = Guru::where('jenis_kelamin', 'Laki-laki')->count();
        $guruPerempuan = Guru::where('jenis_kelamin', 'Perempuan')->count();

        $hadirHariIni = Attendance::whereDate('tanggal', today())
            ->where('status', 'hadir')
            ->count();

        $totalAbsensiHariIni = Attendance::whereDate('tanggal', today())->count();

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
