<?php

namespace App\Filament\Resources\DataSiswaResource\Pages;

use Filament\Resources\Pages\Page;
use App\Filament\Resources\DataSiswaResource;

class DataSiswa extends Page
{
    protected static string $resource = DataSiswaResource::class;

    protected static string $view = 'filament.resources.student-resource.pages.data-siswa';
        protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    
}
