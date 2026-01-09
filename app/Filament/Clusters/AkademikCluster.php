<?php

namespace App\Filament\Clusters;

use App\Filament\Clusters\Akademik\Resources\NilaiXResource;
use App\Filament\Clusters\AkademikCluster\Resources\KelasXIResource;
use Filament\Clusters\Cluster;

class AkademikCluster extends Cluster
{
    protected static ?string $navigationLabel = 'Akademik Nilai';
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'Akademik';

    public static function getResources(): array
    {
        return [
            NilaiXResource::class,
            NilaiXIResource::class,
        ];
    }
}
