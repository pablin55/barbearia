<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\DashboardStats;
use App\Filament\Widgets\FaturamentoStats;
use App\Filament\Widgets\MeusAgendamentosWidget;

class Dashboard extends BaseDashboard
{
    protected function getHeaderWidgets(): array
    {
        $widgets = [
            DashboardStats::class,
            FaturamentoStats::class,
        ];

        // Adiciona widget de agendamentos para barbeiros
        $role = auth()->user()?->role;
        if ($role === 'barbeiro') {
            $widgets[] = MeusAgendamentosWidget::class;
        }

        return $widgets;
    }
}

