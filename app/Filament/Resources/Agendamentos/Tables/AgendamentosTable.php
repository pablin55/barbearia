<?php

namespace App\Filament\Resources\Agendamentos\Tables;

use App\Models\Faturamento;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Table;

class AgendamentosTable
{
    public static function configure(Table $table): Table
    {
        // Colunas otimizadas para admin
        $table = $table->columns([
            // Horário em destaque
            TextColumn::make('horario_agendamento')
                ->label('Horário')
                ->time('H:i')
                ->sortable()
                ->weight('bold')
                ->color('primary')
                ->size('lg'),

            // Data
            TextColumn::make('data_agendamento')
                ->label('Data')
                ->date('d/m/Y')
                ->sortable()
                ->icon('heroicon-o-calendar'),

            // Cliente em destaque
            TextColumn::make('nome_cliente')
                ->label('Cliente')
                ->searchable()
                ->sortable()
                ->weight('bold')
                ->size('lg'),

            // Telefone com ícone
            TextColumn::make('telefone')
                ->label('Telefone')
                ->searchable()
                ->icon('heroicon-o-phone')
                ->copyable()
                ->color('secondary'),

            // Serviço formatado - usa o nome em português do modelo
            TextColumn::make('servico')
                ->label('Serviço')
                ->searchable()
                ->formatStateUsing(fn ($state) => \App\Models\Agendamento::getServiceOptions()[$state]['name'] ?? ucwords(str_replace('_', ' ', $state)))
                ->badge()
                ->color('info')
                ->limit(30)
                ->tooltip(fn ($record) => \App\Models\Agendamento::getServiceOptions()[$record->servico]['name'] ?? ucwords(str_replace('_', ' ', $record->servico))),

            // Valor em destaque
            TextColumn::make('preco')
                ->label('Valor')
                ->numeric()
                ->money('BRL')
                ->sortable()
                ->weight('font-bold')
                ->color('success')
                ->size('lg'),

            // Barbeiro
            BadgeColumn::make('barbeiro')
                ->label('Barbeiro')
                ->color('warning')
                ->searchable(),

            // Status com cores e ícones
            BadgeColumn::make('status')
                ->label('Status')
                ->colors([
                    'warning' => 'pending',
                    'info' => 'confirmed',
                    'success' => 'completed',
                    'danger' => 'cancelled',
                    'gray' => 'no_show',
                ])
                ->icons([
                    'pending' => 'heroicon-o-clock',
                    'confirmed' => 'heroicon-o-check-circle',
                    'completed' => 'heroicon-o-check',
                    'cancelled' => 'heroicon-o-x-circle',
                    'no_show' => 'heroicon-o-user-minus',
                ])
                ->iconPosition('before')
                ->size('md'),

            // Indicador de pagamento
            IconColumn::make('pago')
                ->label('Pago')
                ->boolean()
                ->trueIcon('heroicon-o-check-circle')
                ->falseIcon('heroicon-o-x-circle')
                ->trueColor('success')
                ->falseColor('danger'),

            // Forma de pagamento
            TextColumn::make('forma_pagamento')
                ->label('Pagamento')
                ->searchable()
                ->badge()
                ->color('secondary'),

            // Valor pago
            TextColumn::make('valor_pago')
                ->label('Pago')
                ->numeric()
                ->money('BRL')
                ->sortable()
                ->color('success'),

            // Data de criação
            TextColumn::make('created_at')
                ->label('Criado em')
                ->dateTime('d/m/Y H:i')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ]);

        // Ações por registro - organizadas de forma mais clara
        $recordActions = [
            ViewAction::make(),
        ];

        // Apenas admins e vendedores podem editar ou gerenciar pagamento
        $canManage = in_array(auth()->user()?->role, ['admin', 'vendedor']);
        
        if ($canManage) {
            $recordActions[] = EditAction::make();

            // Botão Pago - apenas um botão que alterna
            $recordActions[] = Action::make('toggle_pago')
                ->label(fn ($record) => $record->pago ? 'Não Pagou' : 'Pago')
                ->color(fn ($record) => $record->pago ? 'danger' : 'success')
                ->icon(fn ($record) => $record->pago ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle')
                ->requiresConfirmation()
                ->action(function ($record) {
                    if ($record->pago) {
                        // Marcar como não pago
                        $record->update(['pago' => false, 'status_pagamento' => 'pending']);
                    } else {
                        // Marcar como pago
                        $record->update(['pago' => true, 'status_pagamento' => 'paid']);
                        
                        // Criar faturamento
                        Faturamento::create([
                            'agendamento_id' => $record->id,
                            'cliente' => $record->nome_cliente,
                            'valor' => $record->preco,
                            'forma_pagamento' => $record->forma_pagamento ?? 'Dinheiro',
                        ]);
                    }
                })
                ->visible(fn ($record) => in_array($record->status, ['pending', 'confirmed', 'completed']));

            // Botão Confirmar
            $recordActions[] = Action::make('confirmar')
                ->label('Confirmar')
                ->color('info')
                ->icon('heroicon-o-check-circle')
                ->requiresConfirmation()
                ->action(function ($record) {
                    $record->update(['status' => 'confirmed']);
                })
                ->visible(fn ($record) => $record->status === 'pending');

            // Botão Concluído
            $recordActions[] = Action::make('concluir')
                ->label('Concluído')
                ->color('success')
                ->icon('heroicon-o-check')
                ->requiresConfirmation()
                ->action(function ($record) {
                    $record->update(['status' => 'completed']);
                })
                ->visible(fn ($record) => in_array($record->status, ['pending', 'confirmed']));

            // Botão Cliente Cancelou
            $recordActions[] = Action::make('cancelar')
                ->label('Cliente Cancelou')
                ->color('danger')
                ->icon('heroicon-o-x-mark')
                ->requiresConfirmation()
                ->action(function ($record) {
                    $record->update(['status' => 'cancelled']);
                })
                ->visible(fn ($record) => in_array($record->status, ['pending', 'confirmed']));

            // Botão Não Compareceu
            $recordActions[] = Action::make('nao_compareceu')
                ->label('Não Compareceu')
                ->color('gray')
                ->icon('heroicon-o-user-minus')
                ->requiresConfirmation()
                ->action(function ($record) {
                    $record->update(['status' => 'no_show']);
                })
                ->visible(fn ($record) => in_array($record->status, ['pending', 'confirmed']));
        }

        // Filtros
        $table = $table->filters([
            // Filtro por data
            \Filament\Tables\Filters\Filter::make('data_agendamento')
                ->label('Data')
                ->form([
                    \Filament\Forms\Components\DatePicker::make('de')
                        ->label('De'),
                    \Filament\Forms\Components\DatePicker::make('ate')
                        ->label('Até'),
                ])
                ->query(function ($query, array $data) {
                    return $query
                        ->when($data['de'], fn($query) => $query->whereDate('data_agendamento', '>=', $data['de']))
                        ->when($data['ate'], fn($query) => $query->whereDate('data_agendamento', '<=', $data['ate']));
                }),

            // Filtro por status
            \Filament\Tables\Filters\SelectFilter::make('status')
                ->label('Status')
                ->options([
                    'pending' => 'Pendente',
                    'confirmed' => 'Confirmado',
                    'completed' => 'Concluído',
                    'cancelled' => 'Cancelado',
                    'no_show' => 'Não Compareceu',
                ]),

            // Filtro por barbeiro
            \Filament\Tables\Filters\SelectFilter::make('barbeiro')
                ->label('Barbeiro')
                ->options([
                    'pablo' => 'Pablo Apolinario',
                    'juan' => 'Juan Pablo',
                    'wesley' => 'Wesley "WS"',
                    'vinicius' => 'Vinícius "VN"',
                    'any' => 'Qualquer Barbeiro',
                ]),

            // Filtro por pagamento
            \Filament\Tables\Filters\Filter::make('pagos')
                ->label('Somente pagos')
                ->query(fn ($query) => $query->where('pago', true)),

            // Filtro por hoje
            \Filament\Tables\Filters\Filter::make('hoje')
                ->label('Hoje')
                ->query(fn ($query) => $query->whereDate('data_agendamento', now()->toDateString())),

            // Filtro por amanhã
            \Filament\Tables\Filters\Filter::make('amanha')
                ->label('Amanhã')
                ->query(fn ($query) => $query->whereDate('data_agendamento', now()->addDay()->toDateString())),

            // Filtro esta semana
            \Filament\Tables\Filters\Filter::make('semana')
                ->label('Esta Semana')
                ->query(fn ($query) => $query->whereBetween('data_agendamento', [now()->startOfWeek(), now()->endOfWeek()])),
        ]);

        // Toolbar (bulk actions)
        $toolbarActions = [];
        if ($canManage) {
            $toolbarActions = [
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ];
        }

        return $table
            ->recordActions($recordActions)
            ->toolbarActions($toolbarActions)
            ->defaultSort('data_agendamento')
            ->defaultSort('horario_agendamento')
            ->striped()
            ->emptyStateIcon('heroicon-o-calendar')
            ->emptyStateHeading('Nenhum agendamento encontrado')
            ->emptyStateDescription('Agende um novo cliente para começar.');
    }
}
