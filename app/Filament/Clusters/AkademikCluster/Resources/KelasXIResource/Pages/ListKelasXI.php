<?php

namespace App\Filament\Clusters\AkademikCluster\Resources\KelasXIResource\Pages;

use App\Filament\Clusters\AkademikCluster\Resources\KelasXIResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Clusters\AkademikCluster\Resources\KelasXIResource\Widgets\KelasXIStats;


class ListKelasXI extends ListRecords
{
    protected static string $resource = KelasXIResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
            KelasXIStats::class,
        ];
    }
}
