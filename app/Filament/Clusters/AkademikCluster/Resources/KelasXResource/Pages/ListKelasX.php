<?php

namespace App\Filament\Clusters\AkademikCluster\Resources\KelasXResource\Pages;

use App\Filament\Clusters\AkademikCluster\Resources\KelasXResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKelasX extends ListRecords
{
    protected static string $resource = KelasXResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
