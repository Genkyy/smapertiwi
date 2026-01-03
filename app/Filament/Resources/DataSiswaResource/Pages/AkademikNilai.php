<?php

namespace App\Filament\Resources\DataSiswaResource\Pages;

use App\Filament\Resources\DataSiswaResource;
use App\Models\NilaiAkademik;
use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use Illuminate\Database\Eloquent\Builder;

class AkademikNilai extends Page implements HasTable
{
    use InteractsWithTable;

    protected static string $resource = DataSiswaResource::class;
    protected static ?string $title = 'Akademik Nilai';

    protected static string $view = 'filament.resources.data-siswa.pages.akademik-nilai';

    protected function getTableQuery(): Builder
    {
        return NilaiAkademik::query()->with('siswa');
    }

    protected function getTableColumns(): array
    {
        return [    
            Tables\Columns\TextColumn::make('siswa.nama_lengkap')
                ->label('Nama Siswa')
                ->searchable(),

            Tables\Columns\TextColumn::make('mapel')
                ->label('Mata Pelajaran'),

            Tables\Columns\TextColumn::make('nilai')
                ->label('Nilai'),
        ];
    }
}
