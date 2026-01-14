<?php

namespace App\Filament\Clusters\AkademikCluster\Resources\KelasXIIResource\Pages;

use App\Filament\Clusters\AkademikCluster\Resources\KelasXIIResource;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Clusters\AkademikCluster\Resources\KelasXIIResource\Widgets\KelasXIIStats;

class ListKelasXII extends ListRecords
{
    protected static string $resource = KelasXIIResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
            KelasXIIStats::class,
        ];
    }
}
