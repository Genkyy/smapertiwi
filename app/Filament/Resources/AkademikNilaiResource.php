<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AkademikNilaiResource\Pages;
use App\Models\NilaiAkademik;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;

class AkademikNilaiResource extends Resource
{
    protected static ?string $model = NilaiAkademik::class;

    protected static ?string $navigationGroup = 'Manajemen Siswa';
    protected static ?string $navigationParentItem = 'Data Siswa';
    protected static ?string $navigationLabel = 'Akademik Nilai';
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\Select::make('student_id')
                ->relationship('siswa', 'nama_lengkap')
                ->searchable()
                ->required(),

            Forms\Components\TextInput::make('mapel')->required(),
            Forms\Components\TextInput::make('nilai')->numeric()->required(),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('siswa.nama_lengkap')->label('Siswa'),
                Tables\Columns\TextColumn::make('mapel'),
                Tables\Columns\TextColumn::make('nilai'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAkademikNilais::route('/'),
            'create' => Pages\CreateAkademikNilai::route('/create'),
            'edit' => Pages\EditAkademikNilai::route('/{record}/edit'),
        ];
    }
}
