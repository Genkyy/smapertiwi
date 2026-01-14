<?php

namespace App\Filament\Resources\SPPInvoisResource\Pages;

use App\Filament\Resources\SPPInvoisResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSPPInvois extends EditRecord
{
    protected static string $resource = SPPInvoisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
