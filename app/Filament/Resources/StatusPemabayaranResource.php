<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StatusPemabayaranResource\Pages;
use App\Filament\Resources\StatusPemabayaranResource\RelationManagers;
use App\Models\PembayaranSpp;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StatusPemabayaranResource extends Resource
{
    protected static ?string $model = PembayaranSpp::class;

    protected static ?string $navigationGroup = 'Keuangan';
    protected static ?string $navigationLabel = 'StatusPembayaran';
    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

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
                Tables\Columns\TextColumn::make('tagihan.student.nama_lengkap')
                    ->label('Siswa'),

                Tables\Columns\TextColumn::make('invoice'),

                Tables\Columns\TextColumn::make('amount')
                    ->money('IDR'),

                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'verified',
                        'danger'  => 'rejected',
                    ]),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('kwitansi')
                ->label('Kwitansi')
                ->icon('heroicon-o-printer')
                ->color('success')
                ->visible(fn ($record) => $record->status === 'verified')
                ->url(fn ($record) => route('kwitansi.cetak', $record))
                ->openUrlInNewTab(),

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
            'index' => Pages\ListStatusPemabayarans::route('/'),
            'create' => Pages\CreateStatusPemabayaran::route('/create'),
            'edit' => Pages\EditStatusPemabayaran::route('/{record}/edit'),
        ];
    }
}
