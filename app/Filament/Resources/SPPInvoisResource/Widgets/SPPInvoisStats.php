<?php

namespace App\Filament\Resources\SPPInvoisResource\Widgets;

use App\Models\TagihanSpp;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class SPPInvoisStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $data = Cache::remember('filament.spp_invois_stats', 300, function () {
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

            return compact('totalNominal', 'siswaBelumBayar', 'totalTagihan', 'totalPaid', 'progress', 'bulanSekarang', 'jatuhTempo');
        });

        return [

            Stat::make('Total Tagihan SPP', 'Rp ' . number_format($data['totalNominal'], 0, ',', '.'))
                ->description("Siswa belum bayar: {$data['siswaBelumBayar']} orang")
                ->icon('heroicon-o-banknotes')
                ->color($data['siswaBelumBayar'] > 0 ? 'danger' : 'success'),

            Stat::make('Progress Pembayaran', $data['progress'] . '%')
                ->description("Lunas: {$data['totalPaid']} dari {$data['totalTagihan']} tagihan")
                ->icon('heroicon-o-chart-bar')
                ->color($data['progress'] >= 75 ? 'success' : 'warning')
                ->chart([
                    $data['progress'],
                    100 - $data['progress'],
                ]),

            Stat::make('Bulan Berjalan', $data['bulanSekarang'])
                ->description(
                    $data['jatuhTempo']
                        ? 'Jatuh tempo: ' . Carbon::parse($data['jatuhTempo'])->translatedFormat('d F Y')
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
