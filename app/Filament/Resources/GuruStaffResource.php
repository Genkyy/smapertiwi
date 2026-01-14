<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GuruStaffResource\Pages;
use App\Filament\Resources\GuruStaffResource\RelationManagers;
use App\Models\GuruStaff;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\TableAction;

class GuruStaffResource extends Resource
{
    protected static ?string $model = GuruStaff::class;

    protected static ?string $navigationGroup = 'Manajemen Guru & Staff';
    protected static ?string $navigationLabel = 'Guru & Staff';
    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function getNavigationBadge(): ?string
    {
        return (string) static::getModel()::count();
    }
    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::count() > 10 ? 'warning' : 'warning';
    }

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            forms\Components\TextInput::make('nama')
                ->label('Nama Lengkap')
                ->required()
                ->maxLength(255),

            forms\Components\TextInput::make('nip')
                ->label('NIP')
                ->required()
                ->maxLength(100),

            forms\Components\Select::make('jenis')
                ->label('Jenis Kelamin')
                ->options([
                    'Laki-laki' => 'Laki-laki',
                    'Perempuan' => 'Perempuan',
                ])
                ->required(),

            forms\Components\TextInput::make('email')
                ->label('Email')
                ->email()
                ->required()
                ->maxLength(255),

            forms\Components\TextInput::make('no_hp')
                ->label('Nomor HP')
                ->required()
                ->maxLength(20),

            forms\Components\TextInput::make('jabatan')
                ->label('Jabatan')
                ->required()
                ->maxLength(100),

            forms\Components\Select::make('aktif')
                ->label('Status')
                ->options([
                    'aktif' => 'Aktif',
                    'nonaktif' => 'Nonaktif',
                ])
                ->required(),

            forms\Components\FileUpload::make('foto')
                ->label('Foto')
                ->image()
                ->maxSize(1024)
                ->directory('guru_staff_foto')
                ->nullable(),
        ]);
}

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            Tables\Columns\TextColumn::make('nama')->label('Nama')
            ->searchable()
            ->sortable(),

            Tables\Columns\ImageColumn::make('foto')->label('Foto')
            ->rounded()
            ->size(50),

            Tables\Columns\TextColumn::make('jabatan')->label('Jabatan')
            ->searchable()
            ->sortable(),

            Tables\Columns\TextColumn::make('aktif')
            ->label('status')
            ->color(fn ($state) => $state === 'aktif' ? 'success' : 'danger')
            ->searchable()
            ->sortable(),
            ])  

            ->filters([
                Tables\Filters\SelectFilter::make('jabatan')
                    ->options([
                        'aktif' => 'Aktif',
                        'nonaktif' => 'Nonaktif',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGuruStaff::route('/'),
            'create' => Pages\CreateGuruStaff::route('/create'),
            'edit' => Pages\EditGuruStaff::route('/{record}/edit'),
        ];
    }
}
