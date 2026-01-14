<?php

namespace App\Filament\Resources\StatusPemabayaranResource\Pages;

use App\Filament\Resources\StatusPemabayaranResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStatusPemabayarans extends ListRecords
{
    protected static string $resource = StatusPemabayaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
