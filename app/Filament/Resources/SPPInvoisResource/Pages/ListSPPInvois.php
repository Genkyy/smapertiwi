<?php

namespace App\Filament\Resources\SPPInvoisResource\Pages;

use App\Filament\Resources\SPPInvoisResource;
use App\Filament\Resources\SPPInvoisResource\Widgets\SPPInvoisStats;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Filament\Actions\Action;
use Illuminate\Support\Facades\Artisan;

class ListSPPInvois extends ListRecords
{
    protected static string $resource = SPPInvoisResource::class;

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('Semua'),

            'paid' => Tab::make('Sudah Bayar')
                ->modifyQueryUsing(fn ($query) =>
                    $query->where('status', 'paid')
                ),

            'unpaid' => Tab::make('Belum Bayar')
                ->modifyQueryUsing(fn ($query) =>
                    $query->where('status', 'unpaid')
                ),
        ];
    }

    public function getHeaderWidgets(): array
    {
        return [
            SPPInvoisStats::class,
        ];
    }

    public function getHeaderActions(): array
    {
        return [
            Action::make('generate')
                ->label('Generate Tagihan Bulan Ini')
                ->icon('heroicon-o-arrow-path')
                ->color('primary')
                ->requiresConfirmation()
                ->modalHeading('Generate Tagihan SPP')
                ->modalDescription('Tagihan SPP bulan berjalan akan dibuat untuk semua siswa aktif.')
                ->action(function () {
                    Artisan::call('spp:generate');
                }),
        ];
    }
}
