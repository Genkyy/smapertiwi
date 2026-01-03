<?php

namespace App\Filament\Resources\AkademikNilaiResource\Pages;

use App\Filament\Resources\AkademikNilaiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAkademikNilais extends ListRecords
{
    protected static string $resource = AkademikNilaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
