<?php

namespace App\Filament\Resources\DataSiswaResource\Pages;

use App\Filament\Resources\DataSiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDataSiswa extends CreateRecord
{
    protected static string $resource = DataSiswaResource::class;

    protected function getRedirectUrl(): string
    {
        return session()->pull(
            'datasiswa_return_url',
            $this->getResource()::getUrl('index')
        );
    }
}
