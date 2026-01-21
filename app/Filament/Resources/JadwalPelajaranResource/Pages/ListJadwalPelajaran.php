<?php

namespace App\Filament\Resources\JadwalPelajaranResource\Pages;

use App\Filament\Resources\JadwalPelajaranResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\View\View;

class ListJadwalPelajarans extends ListRecords
{
    protected static string $resource = JadwalPelajaranResource::class;

    /**
     * HEADER CUSTOM (Info kelas + Jadwal)
     */
    public function getHeader(): ?View
    {
        return view('filament.widgets.calendar-grid');
    }

    /**
     * TAB KELAS
     */
    public function getTabs(): array
    {
        return [
            Tab::make('Kelas X')
                ->modifyQueryUsing(fn (Builder $query) =>
                    $query->where('kelas', 'X')
                ),

            Tab::make('Kelas XI')
                ->modifyQueryUsing(fn (Builder $query) =>
                    $query->where('kelas', 'XI')
                ),

            Tab::make('Kelas XII')
                ->modifyQueryUsing(fn (Builder $query) =>
                    $query->where('kelas', 'XII')
                ),
        ];
    }

    protected function getTableQuery(): ?Builder
    {
        return parent::getTableQuery();
    }
}
