<?php

namespace App\Filament\Widgets;

use App\Models\Agendamento;
use Filament\Actions\Action;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Support\Facades\Auth;

class MeusAgendamentosWidget extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';

    public static function canView(): bool
    {
        return auth()->check() && auth()->user()->role === 'barbeiro';
    }

    protected function getTableHeading(): string
    {
        return 'Agendamentos Próximos (0-3 dias)';
    }

    public function table(Table $table): Table
    {
        $user = Auth::user();
        
        $query = Agendamento::query()
            ->whereRaw('LOWER(barbeiro) = ?', [strtolower($user->name)])
            ->whereIn('status', ['pending', 'confirmed'])
            ->whereDate('data_agendamento', '>=', now()->toDateString())
            ->orderBy('data_agendamento')
            ->orderBy('horario_agendamento')
            ->limit(10);
        
        return $table
            ->query($query)
            ->poll('60s')
            ->columns([
                TextColumn::make('horario_agendamento')
                    ->label('Horário')
                    ->time('H:i')
                    ->sortable()
                    ->weight('bold')
                    ->color('primary'),

                TextColumn::make('data_agendamento')
                    ->label('Data')
                    ->date('d/m')
                    ->sortable(),

                TextColumn::make('nome_cliente')
                    ->label('Cliente')
                    ->searchable()
                    ->weight('bold'),

                TextColumn::make('telefone')
                    ->label('Telefone')
                    ->icon('heroicon-o-phone')
                    ->copyable(),

                TextColumn::make('servico')
                    ->label('Serviço')
                    ->formatStateUsing(fn ($state) => ucwords(str_replace('_', ' ', $state)))
                    ->badge()
                    ->color('secondary'),

                TextColumn::make('preco')
                    ->label('Valor')
                    ->money('BRL')
                    ->color('success')
                    ->weight('font-bold'),

                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'warning' => 'pending',
                        'info' => 'confirmed',
                    ])
                    ->icons([
                        'pending' => 'heroicon-o-clock',
                        'confirmed' => 'heroicon-o-check-circle',
                    ])
                    ->iconPosition('before'),
            ])
            ->actions([
                Action::make('concluir')
                    ->label('Concluir')
                    ->color('success')
                    ->icon('heroicon-o-check')
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        $record->update(['status' => 'completed']);
                    })
                    ->visible(fn ($record) => in_array($record->status, ['pending', 'confirmed'])),

                Action::make('cancelar')
                    ->label('Cancelar')
                    ->color('danger')
                    ->icon('heroicon-o-x-mark')
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        $record->update(['status' => 'cancelled']);
                    })
                    ->visible(fn ($record) => in_array($record->status, ['pending', 'confirmed'])),
            ])
            ->emptyStateIcon('heroicon-o-calendar')
            ->emptyStateHeading('Nenhum agendamento próximo')
            ->emptyStateDescription('Você não tem agendamentos agendados.');
    }
}

