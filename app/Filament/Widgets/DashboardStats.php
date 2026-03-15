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
        $semana = Carbon::now()->startOfWeek();
        $mes = Carbon::now()->startOfMonth();
        
        $user = auth()->user();
        $barbeiroId = $user?->barbeiro_id;

        $baseQuery = Agendamento::query();

        // Se for barbeiro mostra apenas os dados dele
        $isBarbeiro = $user && $user->role === 'barbeiro';
        $isVendedor = $user && $user->role === 'vendedor';
        
        if ($isBarbeiro) {
            $baseQuery->whereRaw('LOWER(barbeiro) = ?', [strtolower($user->name)]);
        } elseif ($isVendedor && $user->barbeiros) {
            $baseQuery->whereIn('barbeiro_id', $user->barbeiros);
        }

        // =====================
        // ESTATÍSTICAS DO DIA
        // =====================
        
        // Agendamentos hoje
        $agendamentosHoje = (clone $baseQuery)
            ->whereDate('data_agendamento', $hoje)
            ->count();

        // Clientes atendidos hoje
        $clientesHoje = (clone $baseQuery)
            ->whereDate('data_agendamento', $hoje)
            ->where('status', 'completed')
            ->count();

        // =====================
        // ESTATÍSTICAS DA SEMANA
        // =====================
        
        // Agendamentos da semana
        $agendamentosSemana = (clone $baseQuery)
            ->whereBetween('data_agendamento', [$semana, $hoje])
            ->count();

        // =====================
        // ESTATÍSTICAS DO MÊS
        // =====================
        
        // Agendamentos do mês
        $agendamentosMes = (clone $baseQuery)
            ->whereBetween('data_agendamento', [$mes, $hoje])
            ->count();

        // =====================
        // TOP CORTES POPULARES (Top 3)
        // =====================
        
        // Top 3 serviços mais realizados no mês
        $topCortes = Agendamento::select('servico', DB::raw('count(*) as total'))
            ->whereBetween('data_agendamento', [$mes, $hoje])
            ->whereIn('status', ['completed', 'confirmed'])
            ->groupBy('servico')
            ->orderByDesc('total')
            ->limit(3)
            ->get();

        // Formatar os Top 3 para exibição
        $topCortesFormatted = [];
        $topCortePrincipal = 'Nenhum';
        $topCorteQtd = 0;
        
        foreach ($topCortes as $index => $corte) {
            $nomeCorte = \App\Models\Agendamento::getServiceOptions()[$corte->servico]['name'] ?? ucwords(str_replace('_', ' ', $corte->servico));
            $topCortesFormatted[] = ($index + 1) . 'º - ' . $nomeCorte . ': ' . $corte->total;
            
            if ($index === 0) {
                $topCortePrincipal = $nomeCorte;
                $topCorteQtd = $corte->total;
            }
        }

        $descricaoTopCortes = !empty($topCortesFormatted) 
            ? implode(' | ', $topCortesFormatted) 
            : 'Sem dados este mês';

        // =====================
        // PRÓXIMOS AGENDAMENTOS
        // =====================
        
        $proximos = (clone $baseQuery)
            ->whereIn('status', ['pending', 'confirmed'])
            ->whereDate('data_agendamento', '>=', $hoje)
            ->orderBy('data_agendamento')
            ->orderBy('horario_agendamento')
            ->limit(5)
            ->get();

        // =====================
        // ESTATÍSTICAS DE ADMIN
        // =====================
        
        $faturamentoMes = 0;
        $barbeiroTop = null;
        $barbeiroTopQtd = 0;

        if (!$isBarbeiro) {
            // Faturamento do mês
            $faturamentoMes = Agendamento::whereBetween('data_agendamento', [$mes, $hoje])
                ->where('status', 'completed')
                ->sum('preco');

            // Top Barbeiro do mês
            $barbeiroTop = Agendamento::select('barbeiro', DB::raw('count(*) as total'))
                ->whereBetween('data_agendamento', [$mes, $hoje])
                ->whereIn('status', ['completed', 'confirmed'])
                ->groupBy('barbeiro')
                ->orderByDesc('total')
                ->first();

            if ($barbeiroTop?->barbeiro) {
                $barbeiroTopNome = \App\Models\Agendamento::getBarberOptions()[$barbeiroTop->barbeiro]['name'] ?? $barbeiroTop->barbeiro;
                $barbeiroTop = (object) ['barbeiro' => $barbeiroTopNome, 'total' => $barbeiroTop->total];
            }

            $barbeiroTopQtd = $barbeiroTop->total ?? 0;
        }

        // =====================
        // MONTAR O DASHBOARD
        // =====================

        // Linha 1: Hoje (métricas do dia)
        $stats = [
            Stat::make('Agendamentos Hoje', $agendamentosHoje)
                ->description('Total agendado para hoje')
                ->descriptionIcon('heroicon-o-calendar')
                ->color('primary')
                ->chart([$agendamentosSemana, $agendamentosMes]),

            Stat::make('Atendimentos Hoje', $clientesHoje)
                ->description('Clientes atendidos')
                ->descriptionIcon('heroicon-o-check-circle')
                ->color('success'),

            Stat::make('Esta Semana', $agendamentosSemana)
                ->description('Total da semana')
                ->descriptionIcon('heroicon-o-clock')
                ->color('info'),

            Stat::make('Este Mês', $agendamentosMes)
                ->description('Total de agendamentos')
                ->descriptionIcon('heroicon-o-chart-bar')
                ->color('warning'),
        ];

        // Linha 2: Top Cortes e Top Barbeiro (para admin)
        if (!$isBarbeiro) {
            $stats[] = Stat::make(
                'Top Cortes Populares',
                $topCortePrincipal
            )
                ->description($topCorteQtd > 0 ? $topCorteQtd . 'x este mês (Top 3)' : 'Sem dados')
                ->descriptionIcon('heroicon-o-scissors')
                ->color('danger');

            $stats[] = Stat::make(
                'Top Barbeiro do Mês',
                $barbeiroTop?->barbeiro ?? 'Nenhum'
            )
                ->description($barbeiroTopQtd > 0 ? $barbeiroTopQtd . ' atendimentos' : 'Sem dados')
                ->descriptionIcon('heroicon-o-trophy')
                ->color('warning');

            $stats[] = Stat::make(
                'Faturamento do Mês',
                'R$ ' . number_format($faturamentoMes, 2, ',', '.')
            )
                ->description('Total recebido')
                ->descriptionIcon('heroicon-o-currency-dollar')
                ->color('success');
        } else {
            // Para barbeiros, mostrar apenas o Top Cortes
            $stats[] = Stat::make(
                'Corte Mais Realizado',
                $topCortePrincipal
            )
                ->description($topCorteQtd > 0 ? $topCorteQtd . 'x este mês' : 'Sem dados')
                ->descriptionIcon('heroicon-o-scissors')
                ->color('danger');
        }

        return $stats;
    }
}
