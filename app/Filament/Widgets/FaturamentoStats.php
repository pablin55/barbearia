<?php

namespace App\Filament\Widgets;

use App\Models\Faturamento;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Carbon\Carbon;

class FaturamentoStats extends BaseWidget
{
    public static function canView(): bool
    {
            return in_array(auth()->user()->role, ['admin','barbeiro']);
    }

    protected function getStats(): array
    {
        $hoje = Faturamento::whereDate('created_at', Carbon::today())
            ->sum('valor');

        $mes = Faturamento::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('valor');

        return [
            Stat::make('Faturamento hoje', 'R$ ' . number_format($hoje, 2, ',', '.'))
                ->description('Total recebido hoje')
                ->color('success'),

            Stat::make('Faturamento do mês', 'R$ ' . number_format($mes, 2, ',', '.'))
                ->description('Total recebido este mês')
                ->color('primary'),
        ];
        $barbeiroId = auth()->user()->barbeiro_id;

if (auth()->user()->role === 'barbeiro') {
    $hoje = Agendamento::where('barbeiro_id', $barbeiroId)
        ->whereDate('data_agendamento', today())
        ->sum('preco');

    $mes = Agendamento::where('barbeiro_id', $barbeiroId)
        ->whereMonth('data_agendamento', now()->month)
        ->sum('preco');
} else {

    $hoje = Agendamento::whereDate('data_agendamento', today())->sum('preco');

    $mes = Agendamento::whereMonth('data_agendamento', now()->month)->sum('preco');

}
    }
}