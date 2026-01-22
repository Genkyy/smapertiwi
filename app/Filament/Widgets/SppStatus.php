<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\TagihanSpp;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class SppStatus extends ChartWidget
{
    protected static ?string $heading = 'Status Pembayaran SPP';

    public ?string $filter = null;
    protected int | string | array $columnSpan = 4;

    protected function getFilters(): ?array
    {
        return collect(range(1, 12))->mapWithKeys(function ($bulan) {
            return [
                str_pad($bulan, 2, '0', STR_PAD_LEFT)
                    => Carbon::create()->month($bulan)->translatedFormat('F'),
            ];
        })->toArray();
    }

    protected function getData(): array
    {
        $bulan = $this->filter;

        if (! $bulan) {
            $bulan = TagihanSpp::selectRaw('MONTH(created_at) as bulan')
                ->latest('created_at')
                ->value('bulan') ?? now()->month;
        }

        $cacheKey = sprintf('spp_status:%s', $bulan);

        [$lunas, $belum] = Cache::remember($cacheKey, 60, function () use ($bulan) {
            $start = Carbon::now()->month($bulan)->startOfMonth()->toDateTimeString();
            $end = Carbon::now()->month($bulan)->endOfMonth()->toDateTimeString();

            $result = TagihanSpp::query()
                ->whereBetween('created_at', [$start, $end])
                ->selectRaw("SUM(CASE WHEN status = 'paid' THEN 1 ELSE 0 END) as lunas, SUM(CASE WHEN status = 'unpaid' THEN 1 ELSE 0 END) as belum")
                ->first();

            return [ (int) ($result->lunas ?? 0), (int) ($result->belum ?? 0) ];
        });

        return [
            'datasets' => [
                [
                    'data' => [$lunas, $belum],
                    'backgroundColor' => ['#16a34a', '#e5e7eb'],
                    'borderWidth' => 0,
                    'borderRadius' => 12,
                    'spacing' => 4,
                ],
            ],
            'labels' => ['Lunas', 'Belum'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }

    protected function getOptions(): array
    {
        return [
            'cutout' => '82%',
            'maintainAspectRatio' => false,

            'scales' => [
                'x' => ['display' => false],
                'y' => ['display' => false],
                'r' => [
                    'display' => false,
                    'ticks' => ['display' => false],
                    'grid' => ['display' => false],
                ],
            ],

            'plugins' => [
                'legend' => ['display' => false],
                'tooltip' => ['enabled' => true],
            ],
        ];
    }
}
