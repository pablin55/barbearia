<?php

namespace App\Filament\Widgets;

use App\Models\Agendamento;
use App\Models\Faturamento;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Carbon\Carbon;

class FaturamentoStats extends BaseWidget
{
    public static function canView(): bool
    {
        return in_array(auth()->user()?->role, ['admin', 'vendedor', 'barbeiro']);
    }

    protected function getStats(): array
    {
        $user = auth()->user();
        $isBarbeiro = $user && $user->role === 'barbeiro';
        $barbeiroId = $user?->barbeiro_id;
        $hoje = Carbon::today();
        
        // Usar tabela de faturamento para admin, ou agendamentos para barbeiros
        if (!$isBarbeiro) {
            // Admin vê todos os faturamentos
            $faturamentoHoje = Faturamento::whereDate('created_at', $hoje)
                ->sum('valor');

            $faturamentoMes = Faturamento::whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->sum('valor');

            // Também calcular de agendamentos concluídos
            $agendamentosHoje = Agendamento::whereDate('data_agendamento', $hoje)
                ->where('status', 'completed')
                ->sum('preco');

            $agendamentosMes = Agendamento::whereMonth('data_agendamento', Carbon::now()->month)
                ->whereYear('data_agendamento', Carbon::now()->year)
                ->where('status', 'completed')
                ->sum('preco');

            // Usar o maior valor entre faturamento e agendamentos
            $faturamentoHoje = max($faturamentoHoje, $agendamentosHoje);
            $faturamentoMes = max($faturamentoMes, $agendamentosMes);
        } else {
            // Barbeiro vê apenas seus dados usando barbeiro_id
            $barbeiroQuery = Agendamento::query()
                ->whereRaw('LOWER(barbeiro) = ?', [strtolower($user->name)]);

            $faturamentoHoje = (clone $barbeiroQuery)
                ->whereDate('data_agendamento', $hoje)
                ->where('status', 'completed')
                ->sum('preco');

            $faturamentoMes = (clone $barbeiroQuery)
                ->whereMonth('data_agendamento', Carbon::now()->month)
                ->whereYear('data_agendamento', Carbon::now()->year)
                ->where('status', 'completed')
                ->sum('preco');
        }

        return [
            Stat::make('Faturamento Hoje', 'R$ ' . number_format($faturamentoHoje, 2, ',', '.'))
                ->description($isBarbeiro ? 'Seus ganhos de hoje' : 'Total recebido hoje')
                ->descriptionIcon('heroicon-o-currency-dollar')
                ->color('success')
                ->chart([$faturamentoHoje / 2, $faturamentoHoje]),

            Stat::make('Faturamento do Mês', 'R$ ' . number_format($faturamentoMes, 2, ',', '.'))
                ->description($isBarbeiro ? 'Seus ganhos deste mês' : 'Total recebido este mês')
                ->descriptionIcon('heroicon-o-banknotes')
                ->color('primary'),
        ];
    }
}

