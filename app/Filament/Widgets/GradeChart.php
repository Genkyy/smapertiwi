<?php

namespace App\Filament\Widgets;

use Filament\Widgets\BarChartWidget;

class GradeChart extends BarChartWidget
{
    protected static ?string $heading = 'Distribusi Nilai';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Nilai Rata-rata',
                    'data' => [85, 78, 92, 88, 80],
                    'backgroundColor' => '#3b82f6',
                ],
            ],
            'labels' => ['Mat', 'IPA', 'Bhs', 'IPS', 'Seni'],
        ];
    }
}
