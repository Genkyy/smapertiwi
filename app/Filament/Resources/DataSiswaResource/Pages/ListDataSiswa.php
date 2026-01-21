<?php

namespace App\Filament\Resources\DataSiswaResource\Pages;

use App\Filament\Resources\DataSiswaResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Filament\Tables\Columns\TextColumn;
use App\Models\Student;
use App\Models\NilaiAkademik;
use App\Models\Presensi;
use App\Filament\Resources\DataSiswaResource\Widgets\DataSiswaStats;
use Illuminate\Database\Eloquent\Builder;


class ListDataSiswa extends ListRecords
{
    protected static string $resource = DataSiswaResource::class;

    public function getTabs(): array
    {
        return [
            Tab::make('Aktif')
            ->modifyQueryUsing(fn ($query) =>
                $query->where('status', 'aktif')
            ),

            Tab::make('Baru')
                ->modifyQueryUsing(fn ($query) =>
                    $query->where('status', 'baru')
                ),
            Tab::make('Lulus')
            ->modifyQueryUsing(fn ($query) =>
                $query->where('status', 'lulus')
            ),

            Tab::make('Nonaktif')
            ->modifyQueryUsing(fn ($query) =>
                $query->where('status', 'nonaktif')
            ),
        ];
    }


    protected function getHeaderWidgets(): array
    {
        return [
            DataSiswaStats::class,
        ];
    }
    
    protected function getTableQuery(): Builder
    {
        return match ($this->activeTab) {
            'akademik' => NilaiAkademik::query()->with('student'),
            'presensi' => Presensi::query()->with('student'),
            default    => Student::query(),
        };
    }

protected function getTableColumns(): array
    {
        return match ($this->activeTab) {
            'akademik' => [
                Tables\Columns\TextColumn::make('student.nama_lengkap')
                    ->label('Siswa'),

                Tables\Columns\TextColumn::make('mapel'),
                Tables\Columns\TextColumn::make('nilai'),
            ],

            'presensi' => [
                Tables\Columns\TextColumn::make('student.nama_lengkap'),
                Tables\Columns\TextColumn::make('tanggal'),
                Tables\Columns\TextColumn::make('status'),
            ],

            default => [
                Tables\Columns\TextColumn::make('nama_lengkap'),
                Tables\Columns\TextColumn::make('nisn'),
                Tables\Columns\TextColumn::make('jurusan'),
            ],
        };
    }

    protected function getTableActions(): array
    {
        // ❗ penting: kosongkan action agar tidak error
        return $this->activeTab === 'siswa'
            ? parent::getTableActions()
            : [];
    }
}

    