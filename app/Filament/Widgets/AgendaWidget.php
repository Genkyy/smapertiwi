<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use App\Models\CalendarEvent as Agenda;
use Carbon\Carbon;

class AgendaWidget extends Widget
{
    protected static string $view = 'filament.widgets.agenda-widget';

    protected static ?int $sort = 4;

    protected int | string | array $columnSpan = 'full';

    protected function getViewData(): array
    {
        return [
            'agendas' => Agenda::orderBy('tanggal')
                ->limit(5)
                ->get(),
        ];
    }
}
