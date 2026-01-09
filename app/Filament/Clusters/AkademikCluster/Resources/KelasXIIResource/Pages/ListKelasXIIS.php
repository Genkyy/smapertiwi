<?php

namespace App\Filament\Clusters\AkademikCluster\Resources\KelasXIIResource\Pages;

use App\Filament\Clusters\AkademikCluster\Resources\KelasXIIResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKelasXIIS extends ListRecords
{
    protected static string $resource = KelasXIIResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
