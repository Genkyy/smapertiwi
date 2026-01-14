<?php

namespace App\Filament\Clusters\AkademikCluster\Resources\KelasXResource\Pages;

use App\Filament\Clusters\AkademikCluster\Resources\KelasXResource;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Clusters\AkademikCluster\Resources\KelasXResource\Widgets\KelasXStats;

class ListKelasX extends ListRecords
{
    protected static string $resource = KelasXResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
            KelasXStats::class,
        ];
    }
}
