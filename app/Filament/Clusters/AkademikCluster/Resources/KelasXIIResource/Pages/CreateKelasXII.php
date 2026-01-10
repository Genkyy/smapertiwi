<?php

namespace App\Filament\Clusters\AkademikCluster\Resources\KelasXIIResource\Pages;

use App\Filament\Clusters\AkademikCluster\Resources\KelasXIIResource;
use Filament\Resources\Pages\CreateRecord;

class CreateKelasXII extends CreateRecord
{
    protected static string $resource = KelasXIIResource::class;

    protected function getRedirectUrl(): string
    {
        return session()->pull(
            'kelasxii_return_url',
            $this->getResource()::getUrl('index')
        );
    }
}
