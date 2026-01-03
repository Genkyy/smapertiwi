<?php

namespace App\Filament\Resources\SiswaBaruResource\Pages;

use App\Filament\Resources\SiswaBaruResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSiswaBaru extends EditRecord
{
    protected static string $resource = SiswaBaruResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
