<?php
namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\ActivityLogMiniWidget;
use App\Filament\Widgets\StatistikMuridBaruWidget;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    public function getWidgets(): array
    {
        return [
            StatistikMuridBaruWidget::class,  // widget statistik murid baru
            ActivityLogMiniWidget::class,     // widget aktivitas terakhir kecil
        ];
    }
}
