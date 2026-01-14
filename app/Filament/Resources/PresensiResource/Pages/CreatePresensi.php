<?php

namespace App\Filament\Resources\PresensiResource\Pages;

use App\Filament\Resources\PresensiResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePresensi extends CreateRecord
{
    protected static string $resource = PresensiResource::class;

    protected function getRedirectUrl(): string
    {
        return session()->pull(
            'presensi_return_url',
            $this->getResource()::getUrl('index')
        );
    }
}
