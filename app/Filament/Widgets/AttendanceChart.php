<?php

namespace App\Filament\Widgets;

use Filament\Widgets\LineChartWidget;
use App\Models\Student;
use Carbon\Carbon;

class AttendanceChart extends LineChartWidget
{
    protected static ?string $heading = 'Statistik Murid Baru';

    protected function getData(): array
    {
        $months = collect(range(1, 12))->map(function ($month) {
            return Carbon::create()->month($month)->translatedFormat('F');
        });

        $studentPerMonth = collect(range(1, 12))->map(function ($month) {
            return Student::whereMonth('created_at', $month)
                ->whereYear('created_at', now()->year)
                ->count();
        });

        return [
            'datasets' => [
                [
                    'label' => 'Murid Baru ' . now()->year,
                    'data' => $studentPerMonth->toArray(),
                    'fill' => false,
                    'tension' => 0.17,
                ],
            ],
            'labels' => $months->toArray(),
        ];
    }
}
