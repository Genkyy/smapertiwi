<?php

namespace App\Filament\Resources\SPPInvoisResource\Pages;

use App\Filament\Resources\SPPInvoisResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSPPInvois extends ListRecords
{
    protected static string $resource = SPPInvoisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
