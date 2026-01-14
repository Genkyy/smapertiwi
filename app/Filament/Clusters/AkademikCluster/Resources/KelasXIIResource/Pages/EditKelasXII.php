<?php

namespace App\Filament\Clusters\AkademikCluster\Resources\KelasXIIResource\Pages;

use App\Filament\Clusters\AkademikCluster\Resources\KelasXIIResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKelasXII extends EditRecord
{
    protected static string $resource = KelasXIIResource::class;

    protected function getRedirectUrl(): string
    {
        return session()->pull(
            'kelasxii_return_url',
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
