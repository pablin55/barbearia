<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Agendamento;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardStats extends BaseWidget
{
    public static function canView(): bool
    {
        return auth()->check();
    }

    protected function getStats(): array
    {
        $hoje = Carbon::today();
        $user = auth()->user();

        $query = Agendamento::query();

        // Se for barbeiro mostra apenas os dados dele
        if ($user->role === 'barbeiro') {
            $query->where('barbeiro', $user->name);
        }

        // Agendamentos hoje
        $agendamentosHoje = (clone $query)
            ->whereDate('data_agendamento', $hoje)
            ->count();

        // Clientes atendidos hoje
        $clientesHoje = (clone $query)
            ->whereDate('data_agendamento', $hoje)
            ->where('status', 'concluido')
            ->count();

        // Serviço mais vendido
        $servicoMaisVendido = (clone $query)
            ->select('servico', DB::raw('count(*) as total'))
            ->groupBy('servico')
            ->orderByDesc('total')
            ->first();

        // Barbeiro top (só faz sentido para admin)
        $barbeiroTop = null;

        if ($user->role === 'admin') {
            $barbeiroTop = Agendamento::select('barbeiro', DB::raw('SUM(preco) as total'))
                ->groupBy('barbeiro')
                ->orderByDesc('total')
                ->first();
        }

        return [

            Stat::make('Agendamentos hoje', $agendamentosHoje)
                ->description('Total de agendamentos hoje')
                ->color('primary'),

            Stat::make('Clientes atendidos hoje', $clientesHoje)
                ->description('Atendimentos concluídos')
                ->color('success'),

            Stat::make(
                'Serviço mais vendido',
                $servicoMaisVendido?->servico ?? 'Nenhum'
            )
                ->description('Serviço com mais agendamentos')
                ->color('warning'),

            Stat::make(
                'Barbeiro que mais faturou',
                $barbeiroTop?->barbeiro ?? '-'
            )
                ->description('Maior faturamento')
                ->color('danger'),

        ];
    }
}