<?php
namespace App\Filament\Resources;

use App\Filament\Resources\PresensiResource\Pages;
use App\Models\Presensi;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;

class PresensiResource extends Resource
{
    protected static ?string $model = Presensi::class;

    protected static ?string $navigationGroup = 'Manajemen Siswa';
    protected static ?string $navigationParentItem = 'Data Siswa';
    protected static ?string $navigationLabel = 'Presensi';
    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\Select::make('student_id')
                ->relationship('siswa', 'nama_lengkap')
                ->required(),

            Forms\Components\DatePicker::make('tanggal')->required(),

            Forms\Components\Select::make('status')
                ->options([
                    'hadir' => 'Hadir',
                    'izin' => 'Izin',
                    'alpha' => 'Alpha',
                ])
                ->required(),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('siswa.nama_lengkap'),
                Tables\Columns\TextColumn::make('tanggal'),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'success' => 'hadir',
                        'warning' => 'izin',
                        'danger' => 'alpha',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPresensis::route('/'),
            'create' => Pages\CreatePresensi::route('/create'),
            'edit' => Pages\EditPresensi::route('/{record}/edit'),
        ];
    }
}

