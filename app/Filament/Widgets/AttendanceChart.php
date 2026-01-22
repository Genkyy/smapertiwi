<?php

namespace App\Filament\Widgets;

use Filament\Widgets\LineChartWidget;
use App\Models\Student;
use Carbon\Carbon;

use Illuminate\Support\Facades\Cache;

class AttendanceChart extends LineChartWidget
{
    protected static ?string $heading = 'Statistik Murid Baru';
    protected int | string | array $columnSpan = 8;

    protected function getData(): array
    {
        $months = collect(range(1, 12))->map(function ($month) {
            return Carbon::create()->month($month)->translatedFormat('F');
        });

        $year = now()->year;

        $cacheKey = "students_per_month:{$year}";

        $studentPerMonth = Cache::remember($cacheKey, 60, function () use ($year) {
            $rows = Student::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
                ->whereYear('created_at', $year)
                ->groupBy('month')
                ->pluck('total', 'month')
                ->toArray();

            return collect(range(1, 12))->map(function ($m) use ($rows) {
                return isset($rows[$m]) ? (int) $rows[$m] : 0;
            })->toArray();
        });

        return [
            'datasets' => [
                [
                    'label' => 'Murid Baru ' . now()->year,
                    'data' => is_array($studentPerMonth) ? $studentPerMonth : (is_object($studentPerMonth) ? $studentPerMonth->toArray() : []),
                    'fill' => false,
                    'tension' => 0.17,
                ],
            ],
            'labels' => $months->toArray(),
        ];
    }
}
