<?php

namespace App\Filament\Clusters\Akademik\Resources\NilaiXAResource\Pages;

use App\Filament\Clusters\Akademik\Resources\NilaiXAResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNilaiXAs extends ListRecords
{
    protected static string $resource = NilaiXAResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
