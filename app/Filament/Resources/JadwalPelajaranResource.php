<?php

namespace App\Filament\Resources;

use App\Models\JadwalPelajaran;
use App\Filament\Resources\JadwalPelajaranResource\Pages;

use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;

class JadwalPelajaranResource extends Resource
{
    protected static ?string $model = JadwalPelajaran::class;

    protected static ?string $navigationGroup = 'Akademik';
    protected static ?string $navigationLabel = 'Jadwal Pelajaran';
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('kelas')
                ->options([
                    'XA'  => 'X A',
                    'XB'  => 'X B',
                    'XI'  => 'XI',
                    'XII' => 'XII',
                ])
                ->required(),

            Forms\Components\Select::make('hari')
                ->options([
                    'Senin'  => 'Senin',
                    'Selasa' => 'Selasa',
                    'Rabu'   => 'Rabu',
                    'Kamis'  => 'Kamis',
                    'Jumat'  => 'Jumat',
                    'Sabtu'  => 'Sabtu',
                ])
                ->required(),

            Forms\Components\TimePicker::make('jam_mulai')
                ->required(),

            Forms\Components\TimePicker::make('jam_selesai')
                ->required(),

            Forms\Components\TextInput::make('mata_pelajaran')
                ->required(),

            Forms\Components\TextInput::make('guru')
                ->label('Nama Guru')
                ->required(),

            Forms\Components\TextInput::make('ruang')
                ->placeholder('Ruang / Lab / Aula'),
        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(
                JadwalPelajaran::query()
                    ->when(
                        request('kelas'),
                        fn ($q) => $q->where('kelas', request('kelas'))
                    )
            )
            ->columns([
                Tables\Columns\TextColumn::make('hari')
                    ->badge()
                    ->color('primary'),

                Tables\Columns\TextColumn::make('jam_mulai')
                    ->label('Mulai'),

                Tables\Columns\TextColumn::make('jam_selesai')
                    ->label('Selesai'),

                Tables\Columns\TextColumn::make('mata_pelajaran')
                    ->searchable(),

                Tables\Columns\TextColumn::make('guru'),
                Tables\Columns\TextColumn::make('ruang'),
            ])
            ->defaultSort('jam_mulai')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

                
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListJadwalPelajarans::route('/'),
            'create' => Pages\CreateJadwalPelajaran::route('/create'),
            'edit'   => Pages\EditJadwalPelajaran::route('/{record}/edit'),
        ];
    }
}
