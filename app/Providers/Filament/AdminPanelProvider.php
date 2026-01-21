<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Filament\Widgets\StatsOverview;
use App\Filament\Widgets\AttendanceChart;
use App\Filament\Widgets\GradeChart;
use App\Filament\Widgets\FinanceWidget;
use App\Filament\Widgets\ActivityLogWidget;
use App\Filament\Widgets\SppStatus;
use App\Filament\Widgets\AgendaWidget;
use Saade\FilamentFullCalendar\FilamentFullCalendarPlugin;




class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')

            //HILANGKAN SEMUA BRAND FILAMENT
            ->brandName('SIP')
            ->brandLogo(null)
            ->brandLogoHeight('0px')
            ->favicon(null)

            // LOGIN PAGE
            ->login()
            ->authGuard('web')

            ->colors([
                'primary' => Color::Amber,
            ])

            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->discoverClusters(in: app_path('Filament/Clusters'), for: 'App\\Filament\\Clusters')

            ->plugins([
            FilamentFullCalendarPlugin::make()
                ->selectable()
                ->editable()
                ->timezone('Asia/Jakarta')
                ->locale('id'),
            

        ])


            ->pages([
                Pages\Dashboard::class,
            ])
            ->widgets([
                StatsOverview::class,
                AttendanceChart::class,
                SppStatus::class,
                ActivityLogWidget::class,
                AgendaWidget::class,
            ])

            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])

            ->authMiddleware([
                Authenticate::class,
            ]);
            
    }
    
}
