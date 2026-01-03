<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Siswa', '1.240')
                ->description('600 Laki-Laki • 640 Perempuan')
                ->icon('heroicon-o-users')
                ->color('primary'),

            Stat::make('Total Guru', '25')
                ->icon('heroicon-o-academic-cap'),

            Stat::make('Total Kelas', '8')
                ->icon('heroicon-o-building-office'),

            Stat::make('Kehadiran', '94%')
                ->description('+1.2%')
                ->color('success'),
        ];
    }
}
