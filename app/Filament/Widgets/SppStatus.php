<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class SppStatus extends ChartWidget
{
    protected static ?string $heading = 'Status Pembayaran SPP';

    protected static ?int $sort = 3;

    protected function getData(): array
    {
        // contoh data (nanti bisa dari database)
        $lunas = 930;
        $belum = 310;

        return [
            'datasets' => [
                [
                    'data' => [$lunas, $belum],
                    'backgroundColor' => [
                        '#078838', // hijau
                        '#ef4444', // merah
                    ],
                ],
            ],
            'labels' => [
                'Lunas',
                'Belum Lunas',
            ],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }

    protected function getOptions(): array
    {
        return [
            'cutout' => '70%',
            'plugins' => [
                'legend' => [
                    'position' => 'bottom',
                ],
            ],
        ];
    }
}
