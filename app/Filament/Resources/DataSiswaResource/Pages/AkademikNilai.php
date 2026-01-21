<?php

namespace App\Filament\Resources\DataSiswaResource\Pages;

use App\Filament\Resources\DataSiswaResource;
use App\Models\NilaiAkademik;
use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\DataSiswaResource\Widgets\AkademikNilaiStats;

class AkademikNilai extends Page implements HasTable
{
    use InteractsWithTable;

    protected static string $resource = DataSiswaResource::class;
    protected static ?string $title = 'Akademik Siswa';
    protected static string $view = 'filament.resources.data-siswa.pages.akademik-nilai';

    protected function getTableQuery(): Builder
    {
        return NilaiAkademik::query()
            ->with('siswa'); // relasi ke student
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
                ->numeric()
                ->sortable()
                ->badge()
                ->color(fn ($state) =>
                    $state >= 85 ? 'success' :
                    ($state >= 70 ? 'warning' : 'danger')
                ),
        ];
    }

    /**
     * 🔝 Widget di atas tabel
     */
    protected function getHeaderWidgets(): array
    {
        return [
            AkademikNilaiStats::class,
        ];
    }
}
