<?php

namespace App\Filament\Widgets;

use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Database\Eloquent\Builder;

class ActivityLogWidget extends BaseWidget
{
    protected static ?string $heading = 'Aktivitas Terakhir';

    protected int | string | array $columnSpan = 1;

    protected function getTableQuery(): Builder
    {
        // Tampilkan semua aktivitas kecuali yang berhubungan dengan model User
        return Activity::query()
            ->where(function ($query) {
                $query->whereNull('subject_type')
                      ->orWhere('subject_type', '<>', \App\Models\User::class);
            })
            ->latest()
            ->limit(10);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('created_at')
                ->label('Waktu')
                ->dateTime('d M H:i')
                ->sortable(),

            Tables\Columns\TextColumn::make('description')
                ->label('Aktivitas')
                ->wrap()
                ->limit(30), 
        ];
    }
}
