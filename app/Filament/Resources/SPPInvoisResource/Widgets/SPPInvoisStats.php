<?php

namespace App\Filament\Resources\SPPInvoisResource\Widgets;

use App\Models\TagihanSpp;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Carbon\Carbon;

class SPPInvoisStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $totalNominal = TagihanSpp::sum('nominal');

        $siswaBelumBayar = TagihanSpp::where('status', 'unpaid')
            ->distinct('student_id')
            ->count('student_id');

        $totalTagihan = TagihanSpp::count();
        $totalPaid = TagihanSpp::where('status', 'paid')->count();

        $progress = $totalTagihan > 0
            ? round(($totalPaid / $totalTagihan) * 100)
            : 0;

        $bulanSekarang = Carbon::now()->translatedFormat('F Y');

        $jatuhTempo = TagihanSpp::whereMonth('jatuh_tempo', now()->month)
            ->whereYear('jatuh_tempo', now()->year)
            ->orderBy('jatuh_tempo')
            ->value('jatuh_tempo');

        return [

            Stat::make('Total Tagihan SPP', 'Rp ' . number_format($totalNominal, 0, ',', '.'))
                ->description("Siswa belum bayar: {$siswaBelumBayar} orang")
                ->icon('heroicon-o-banknotes')
                ->color($siswaBelumBayar > 0 ? 'danger' : 'success'),

            Stat::make('Progress Pembayaran', $progress . '%')
                ->description("Lunas: {$totalPaid} dari {$totalTagihan} tagihan")
                ->icon('heroicon-o-chart-bar')
                ->color($progress >= 75 ? 'success' : 'warning')
                ->chart([
                    $progress,
                    100 - $progress,
                ]),

            Stat::make('Bulan Berjalan', $bulanSekarang)
                ->description(
                    $jatuhTempo
                        ? 'Jatuh tempo: ' . Carbon::parse($jatuhTempo)->translatedFormat('d F Y')
                        : 'Belum ada jatuh tempo'
                )
                ->icon('heroicon-o-calendar-days')
                ->color('info'),
        ];
    }

    protected function getColumns(): int
    {
        return 3;
    }
}
