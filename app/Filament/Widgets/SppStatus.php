<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\TagihanSpp;

class SppStatus extends ChartWidget
{
    protected static ?string $heading = 'Status SPP';

    // Supaya widget ini bisa berdampingan dengan widget lain
    protected int | string | array $columnSpan = 1; // 'full', 1, 2, dll. sesuai layout

    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $lunas = TagihanSpp::where('status', 'paid')->count();
        $belum = TagihanSpp::where('status', 'unpaid')->count();

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
                'Belum',
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
        'cutout' => '80%', // bikin ring lebih tipis
        'responsive' => true,
        'maintainAspectRatio' => false, // paksa chart mengikuti container
        'plugins' => [
            'legend' => [
                'position' => 'bottom',
                'labels' => [
                    'boxWidth' => 12,
                    'padding' => 8,
                ],
            ],
        ],
        // pastikan skala hilang, Doughnut biasanya gak perlu, tapi aman
        'scales' => [
            'x' => ['display' => false],
            'y' => ['display' => false],
        ],
    ];
}
}
