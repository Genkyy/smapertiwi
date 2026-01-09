<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AkademikNilaiResource\Pages;
use App\Models\NilaiAkademik;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Pages\SubNavigationPosition;
use Filament\Navigation\NavigationItem;


class AkademikNilaiResource extends Resource
{
    protected static ?string $model = NilaiAkademik::class;

    protected static ?string $navigationGroup = 'Manajemen Siswa';
    protected static ?string $navigationLabel = 'Akademik Nilai';
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static SubNavigationPosition $subNavigationPosition =
        SubNavigationPosition::Start;


public static function getSubNavigation(): array
    {
        return [
            NavigationItem::make('XA')->url(static::getUrl('index', ['kelas' => 'XA'])),
            NavigationItem::make('XB')->url(static::getUrl('index', ['kelas' => 'XB'])),
            NavigationItem::make('XI')->url(static::getUrl('index', ['kelas' => 'XI'])),
            NavigationItem::make('XII')->url(static::getUrl('index', ['kelas' => 'XII'])),
        ];
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