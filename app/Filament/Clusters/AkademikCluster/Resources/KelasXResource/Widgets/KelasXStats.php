<?php

namespace App\Filament\Clusters\AkademikCluster\Resources\KelasXResource\Widgets;

use App\Models\KelasX;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class KelasXStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $data = KelasX::whereHas('student', fn ($q) => $q->where('kelas', 'X'))->get();

        $totalMurid = $data->count();

        // hitung rata-rata nilai manual
        $totalNilai = $data->sum(function ($row) {
            return (
                $row->pai +
                $row->ppkn +
                $row->bahasa_indonesia +
                $row->matematika +
                $row->bahasa_inggris
            ) / 5;
        });

        $rataRata = $totalMurid > 0
            ? round($totalNilai / $totalMurid, 2)
            : 0;

        return [
            Stat::make('Total Murid Kelas X', $totalMurid)
                ->icon('heroicon-o-users')
                ->color('success'),

            Stat::make('Rata-rata Nilai', $rataRata)
                ->icon('heroicon-o-chart-bar')
                ->color('warning'),

            Stat::make('Total Rapor', $totalMurid)
                ->icon('heroicon-o-document-text')
                ->color('primary'),
        ];
    }
}
