<?php

namespace App\Filament\Resources\JadwalPelajaranResource\Pages;

use App\Filament\Resources\JadwalPelajaranResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateJadwalPelajaran extends CreateRecord
{
    protected static string $resource = JadwalPelajaranResource::class;

    protected function getRedirectUrl(): string
    {
        return session()->pull(
            'jadwalpelajaran_return_url',
            $this->getResource()::getUrl('index')
        );
    }
}
