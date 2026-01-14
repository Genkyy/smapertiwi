<?php

namespace App\Filament\Resources\SiswaBaruResource\Pages;

use App\Filament\Resources\SiswaBaruResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSiswaBaru extends CreateRecord
{
    protected static string $resource = SiswaBaruResource::class;
    
    protected function getRedirectUrl(): string
    {
        return session()->pull(
            'siswabaru_return_url',
            $this->getResource()::getUrl('index')
        );
    }
}
