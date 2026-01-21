<?php

namespace App\Filament\Resources\GuruStaffResource\Widgets;

use App\Models\Student;
use App\Models\GuruStaff;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class GuruStaffStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $totalGuruStaff = GuruStaff::count();
        $guruAktif = GuruStaff::whereIn('jabatan', ['guru', 'wali kelas'])
        ->where('aktif', 'aktif')
        ->count();
        $staffAktif = GuruStaff::whereIn('jabatan', ['kepala sekolah', 'kurikulum', 'kesiswaan', 'sarana prasarana','operator', 'bendahara', 'tata usaha'])
        ->where('aktif', 'aktif')
        ->count();

        return [
            // 🔵 TOTAL GURU & STAFF
            Stat::make('Total Seluruh Guru & Staff', $totalGuruStaff)
                ->description('Semua guru dan staff terdaftar')
                ->icon('heroicon-o-users')
                ->color('primary'),

            // 🟢 GURU & STAFF AKTIF
            Stat::make('Guru Aktif', $guruAktif)
                ->description('Masih aktif bekerja')
                ->icon('heroicon-o-check-badge')
                ->color('success'),

                        // 🟢 GURU & STAFF AKTIF
            Stat::make('Staff Aktif', $staffAktif)
                ->description('Masih aktif bekerja')
                ->icon('heroicon-o-check-badge')
                ->color('info'),
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
