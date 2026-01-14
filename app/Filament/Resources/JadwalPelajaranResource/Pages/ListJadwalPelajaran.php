<?php

namespace App\Filament\Resources\JadwalPelajaranResource\Pages;

use App\Filament\Resources\JadwalPelajaranResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;


class ListJadwalPelajarans extends ListRecords
{
    protected static string $resource = JadwalPelajaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

 protected function getTableQuery(): ?Builder
    {
        $kelas = request()->get('kelas');

        return parent::getTableQuery()
            ?->when(
                $kelas,
                fn (Builder $query) => $query->where('kelas', $kelas)
            );
    }

}
