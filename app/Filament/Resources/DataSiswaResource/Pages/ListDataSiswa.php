<?php

namespace App\Filament\Resources\DataSiswaResource\Pages;

use App\Filament\Resources\DataSiswaResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Filament\Tables\Columns\TextColumn;
use App\Models\Student;
use App\Models\NilaiAkademik;
use App\Models\Presensi;

class ListDataSiswa extends ListRecords
{
    protected static string $resource = DataSiswaResource::class;

    public function getTabs(): array
    {
        return [
            'siswa' => Tab::make('Data Siswa')
                ->modifyQueryUsing(fn () => Student::query()),

            'akademik' => Tab::make('Akademik Nilai')
                ->modifyQueryUsing(fn () => NilaiAkademik::query()),

            'presensi' => Tab::make('Presensi')
                ->modifyQueryUsing(fn () => Presensi::query()),
        ];
    }

    protected function getTableColumns(): array
    {
        return match ($this->activeTab) {
            'akademik' => [
                TextColumn::make('siswa.nama_lengkap')->label('Siswa'),
                TextColumn::make('mapel'),
                TextColumn::make('nilai'),
            ],

            'presensi' => [
                TextColumn::make('siswa.nama_lengkap'),
                TextColumn::make('tanggal'),
                TextColumn::make('status'),
            ],

            default => [
                TextColumn::make('nama_lengkap'),
                TextColumn::make('nisn'),
                TextColumn::make('jurusan'),
            ],
        };
    }
}
    