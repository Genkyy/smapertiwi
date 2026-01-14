<?php

namespace App\Filament\Resources\GuruStaffResource\Pages;

use App\Filament\Resources\GuruStaffResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGuruStaff extends EditRecord
{
    protected static string $resource = GuruStaffResource::class;

    protected function getRedirectUrl(): string
    {
        return session()->pull(
            'gurustaff_return_url',
            $this->getResource()::getUrl('index')
        );
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
