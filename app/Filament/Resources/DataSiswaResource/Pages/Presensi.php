<?php

namespace App\Filament\Resources\DataSiswaResource\Pages;

use App\Filament\Resources\DataSiswaResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables;
use App\Models\Presensi as PresensiModel;
use Illuminate\Database\Eloquent\Builder;

class Presensi extends ListRecords
{
    protected static string $resource = DataSiswaResource::class;

    protected static ?string $navigationLabel = 'Presensi';

    protected function getTableQuery(): Builder
    {
        return PresensiModel::query();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('siswa.nama_lengkap'),
            Tables\Columns\TextColumn::make('tanggal'),
            Tables\Columns\TextColumn::make('status'),
        ];
    }
}
