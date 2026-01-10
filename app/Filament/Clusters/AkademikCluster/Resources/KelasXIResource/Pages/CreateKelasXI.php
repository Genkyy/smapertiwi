<?php

namespace App\Filament\Clusters\AkademikCluster\Resources\KelasXIResource\Pages;

use App\Filament\Clusters\AkademikCluster\Resources\KelasXIResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKelasXI extends CreateRecord
{
    protected static string $resource = KelasXIResource::class;
    protected function getRedirectUrl(): string
    {
        return session()->pull(
            'kelasxi_return_url',
            $this->getResource()::getUrl('index')
        );
    }
}
