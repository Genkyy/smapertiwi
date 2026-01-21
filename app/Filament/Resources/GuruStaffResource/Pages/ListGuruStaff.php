<?php

namespace App\Filament\Resources\GuruStaffResource\Pages;

use App\Filament\Resources\GuruStaffResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\GuruStaffResource\Widgets\GuruStaffStats;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\ListRecords\Tab;


class ListGuruStaff extends ListRecords
{
    protected static string $resource = GuruStaffResource::class;

    public function getTabs(): array
    {
        return [
            Tab::make('Guru Aktif')
            ->modifyQueryUsing(fn ($query) =>
                $query->where('aktif', 'aktif')
            ),

            Tab::make('Guru Nonaktif')
            ->modifyQueryUsing(fn ($query) =>
                $query->where('aktif', 'nonaktif')
            ),
        ];
    }

        protected function getHeaderWidgets(): array
    {
        return [
            GuruStaffStats::class,
        ];
    }

}
