<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use App\Models\CalendarEvent;
use Carbon\Carbon;

class AgendaWidget extends Widget
{
    protected static string $view = 'filament.widgets.agenda-widget';

    protected int | string | array $columnSpan = 4;
    protected static ?int $sort = 3;

    protected function getViewData(): array
    {
        $today = Carbon::today();

        $agendas = CalendarEvent::query()
            ->whereDate('tanggal', '>=', $today)   // 🔥 EVENT KE DEPAN
            ->orderBy('tanggal', 'asc')            // 🔥 PALING DEKAT DULU
            ->limit(3)                              // 🔥 SESUAI REFERENSI
            ->get();

        return [
            'agendas' => $agendas,
        ];
    }
}
