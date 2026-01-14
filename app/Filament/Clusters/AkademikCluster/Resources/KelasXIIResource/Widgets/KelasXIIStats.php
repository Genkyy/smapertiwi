<?php

namespace App\Filament\Clusters\AkademikCluster\Resources\KelasXIIResource\Widgets;

use App\Models\KelasXII;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class KelasXIIStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $data = KelasXII::whereHas('student', fn ($q) => $q->where('kelas', 'XII'))->get();

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
            Stat::make('Total Murid Kelas XII', $totalMurid)
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
