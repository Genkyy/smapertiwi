<?php

namespace App\Filament\Resources\AkademikNilaiResource\Pages;

use App\Filament\Resources\AkademikNilaiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;


class ListAkademikNilais extends ListRecords
{
    protected static string $resource = AkademikNilaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

protected function getTableQuery(): Builder
{
    return parent::getTableQuery()
        ->whereHas('siswa', fn ($q) =>
            $q->when(
                request('kelas'),
                fn ($qq) => $qq->where('kelas', request('kelas'))
            )
        );
}

}
