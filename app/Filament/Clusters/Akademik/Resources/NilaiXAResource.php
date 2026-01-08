<?php

namespace App\Filament\Clusters\Akademik\Resources;

use App\Filament\Clusters\Akademik\Resources\NilaiXAResource\Pages;
use App\Models\NilaiAkademik;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class NilaiXAResource extends Resource
{
    protected static ?string $model = NilaiAkademik::class;
    protected static ?string $navigationLabel = 'Kelas XA';

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('siswa.nama_lengkap'),
            Tables\Columns\TextColumn::make('mapel'),
            Tables\Columns\TextColumn::make('nilai'),
        ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->whereHas('siswa', fn ($q) => $q->where('kelas', 'XA'));
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNilaiXAs::route('/'),
        ];
    }
}

