<?php

namespace App\Filament\Clusters\AkademikCluster\Resources;

use App\Filament\Clusters\AkademikCluster;
use App\Filament\Clusters\AkademikCluster\Resources\KelasXIIResource\Pages;
use App\Filament\Clusters\AkademikCluster\Resources\KelasXIIResource\RelationManagers;
use App\Models\KelasXII;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KelasXIIResource extends Resource
{
    protected static ?string $model = KelasXII::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $cluster = AkademikCluster::class;

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
            'index' => Pages\ListKelasXIIS::route('/'),
            'create' => Pages\CreateKelasXII::route('/create'),
            'edit' => Pages\EditKelasXII::route('/{record}/edit'),
        ];
    }
}
