<?php

namespace App\Filament\Clusters\AkademikCluster\Resources\KelasXResource\Pages;

use App\Filament\Clusters\AkademikCluster\Resources\KelasXResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKelasX extends CreateRecord
{
    protected static string $resource = KelasXResource::class;

    protected function getRedirectUrl(): string
    {
        return session()->pull(
            'kelasx_return_url',
            $this->getResource()::getUrl('index')
        );
    }
    }
