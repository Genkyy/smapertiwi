<?php

namespace App\Filament\Clusters\AkademikCluster\Resources\KelasXIResource\Pages;

use App\Filament\Clusters\AkademikCluster\Resources\KelasXIResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKelasXI extends ListRecords
{
    protected static string $resource = KelasXIResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
