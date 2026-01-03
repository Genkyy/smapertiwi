<?php

namespace App\Filament\Widgets;

use Filament\Widgets\LineChartWidget;

class AttendanceChart extends LineChartWidget
{
    protected static ?string $heading = 'Grafik Kehadiran';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Kehadiran',
                    'data' => [88, 90, 92, 94],
                    'borderColor' => '#137fec',
                ],
            ],
            'labels' => ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'],
        ];
    }
}
