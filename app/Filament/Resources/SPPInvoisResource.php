<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SPPInvoisResource\Pages;
use App\Filament\Resources\SPPInvoisResource\RelationManagers;
use App\Models\TagihanSpp;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SPPInvoisResource extends Resource
{
    protected static ?string $model = TagihanSPP::class;

    protected static ?string $navigationGroup = 'Keuangan';
    protected static ?string $navigationLabel = 'Tagihan SPP';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function getNavigationBadge(): ?string
    {
        return (string) static::getModel()::count();
    }
    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::count() > 10 ? 'danger' : 'danger';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student.nama_lengkap')
                ->label('Siswa')
                ->searchable(),

            Tables\Columns\TextColumn::make('bulan'),
            Tables\Columns\TextColumn::make('tahun_ajaran'),

            Tables\Columns\TextColumn::make('nominal')
                ->money('IDR'),

            Tables\Columns\BadgeColumn::make('status')
                ->colors([
                    'danger' => 'unpaid',
                    'success'=> 'paid',
                ]),
            Tables\Columns\TextColumn::make('jatuh_tempo')
                            //
            ])
            ->filters([
                //
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
            'index' => Pages\ListSPPInvois::route('/'),
            'create' => Pages\CreateSPPInvois::route('/create'),
            'edit' => Pages\EditSPPInvois::route('/{record}/edit'),
        ];
    }
}
