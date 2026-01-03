<?php

namespace App\Filament\Resources\AkademikNilaiResource\Pages;

use App\Filament\Resources\AkademikNilaiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAkademikNilai extends EditRecord
{
    protected static string $resource = AkademikNilaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
