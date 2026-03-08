<?php

namespace App\Filament\Pages;

use App\Models\Agendamento;
use Filament\Actions\Action;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class MeusAgendamentosPage extends Page
{
    protected static ?string $title = 'Meus Agendamentos';

    protected static ?string $navigationLabel = 'Meus Agendamentos';

    protected static string $view = 'filament.pages.meus-agendamentos';

    public $agendamentos = [];
    public $filtroData = 'todos';

    public function mount(): void
    {
        $this->carregarAgendamentos();
    }

    public function carregarAgendamentos(): void
    {
        $user = Auth::user();
        
        $query = Agendamento::query()
            ->where('barbeiro', $user->name)
            ->orderBy('data_agendamento')
            ->orderBy('horario_agendamento');

        // Aplicar filtros
        match ($this->filtroData) {
            'hoje' => $query->whereDate('data_agendamento', now()->toDateString()),
            'amanha' => $query->whereDate('data_agendamento', now()->addDay()->toDateString()),
            'semana' => $query->whereBetween('data_agendamento', [now()->startOfWeek(), now()->endOfWeek()]),
            'pendentes' => $query->whereIn('status', ['pending', 'confirmed']),
            default => $query->whereDate('data_agendamento', '>=', now()->toDateString()),
        };

        $this->agendamentos = $query->limit(50)->get()->groupBy('data_agendamento');
    }

    public function updatedFiltroData(): void
    {
        $this->carregarAgendamentos();
    }

    public function confirmarAgendamento(Agendamento $agendamento): void
    {
        $agendamento->update(['status' => 'confirmed']);
        $this->carregarAgendamentos();
    }

    public function concluirAgendamento(Agendamento $agendamento): void
    {
        $agendamento->update(['status' => 'completed']);
        $this->carregarAgendamentos();
    }

    public function cancelarAgendamento(Agendamento $agendamento): void
    {
        $agendamento->update(['status' => 'cancelled']);
        $this->carregarAgendamentos();
    }

    public function naoCompareceu(Agendamento $agendamento): void
    {
        $agendamento->update(['status' => 'no_show']);
        $this->carregarAgendamentos();
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('atualizar')
                ->label('Atualizar')
                ->icon('heroicon-o-arrow-path')
                ->action(fn () => $this->carregarAgendamentos()),
        ];
    }

    public function getAgendamentosPorDataAttribute(): array
    {
        return $this->agendamentos;
    }
}

