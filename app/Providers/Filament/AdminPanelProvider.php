<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;

use App\Filament\Pages\Dashboard;
use App\Filament\Pages\MeusAgendamentosPage;

use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\Alignment;
use Filament\Support\Enums\VerticalAlignment;

use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;

use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->brandName(fn () => match(auth()->user()?->role) {
                'barbeiro' => 'Barbearia - Barbeiro',
                'vendedor' => 'Barbearia - Vendedor',
                default => 'Barbearia Pro',
            })
            ->brandLogo(asset('img/pbar.png'))
            ->brandLogoHeight(fn () => auth()->check() && auth()->user()->role === 'barbeiro' ? '2.5rem' : '3rem')
            ->favicon(asset('img/favicon.ico'))
            ->colors([
                'primary' => [
                    50 => '#fef9e7',
                    100 => '#fdf0c3',
                    200 => '#fbe48c',
                    300 => '#f8d755',
                    400 => '#f6c91e',
                    500 => '#d4a412', // Dourado principal
                    600 => '#b8890f',
                    700 => '#996c0c',
                    800 => '#7a5509',
                    900 => '#5c4107',
                    950 => '#3e2b04',
                ],
                'gray' => Color::Slate,
                'danger' => Color::Rose,
                'info' => Color::Sky,
                'success' => Color::Emerald,
                'warning' => Color::Amber,
            ])
            ->font('Poppins')
            ->sidebarCollapsibleOnDesktop()
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->pages([
                Dashboard::class,
                ...(auth()->check() && auth()->user()->role === 'barbeiro' ? [MeusAgendamentosPage::class] : []),
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
            ])
            ->spa();
    }
}
