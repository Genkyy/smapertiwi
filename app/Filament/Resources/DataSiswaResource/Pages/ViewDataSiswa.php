<?php

namespace App\Filament\Resources\DataSiswaResource\Pages;

use App\Filament\Resources\DataSiswaResource;
use Filament\Resources\Pages\ViewRecord;

class ViewDataSiswa extends ViewRecord
{
    protected static string $resource = DataSiswaResource::class;

    public static function getNavigationLabel(): string
    {
        return 'Data Siswa';
    }
}
