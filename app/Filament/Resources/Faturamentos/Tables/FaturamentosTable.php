<?php

namespace App\Filament\Resources\Faturamentos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Table;

class FaturamentosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // ID do Agendamento
                TextColumn::make('agendamento_id')
                    ->label('ID')
                    ->numeric()
                    ->sortable()
                    ->color('secondary'),

                // Cliente em destaque
                TextColumn::make('cliente')
                    ->label('Cliente')
                    ->searchable()
                    ->weight('bold')
                    ->size('lg'),

                // Valor em destaque
                TextColumn::make('valor')
                    ->label('Valor')
                    ->money('BRL')
                    ->sortable()
                    ->weight('font-bold')
                    ->color('success')
                    ->size('lg'),

                // Forma de pagamento formatada
                BadgeColumn::make('forma_pagamento')
                    ->label('Pagamento')
                    ->searchable()
                    ->colors([
                        'success' => 'Dinheiro',
                        'info' => 'PIX',
                        'warning' => 'Cartão de Crédito',
                        'primary' => 'Cartão de Débito',
                        'gray' => fn ($state) => !in_array($state, ['Dinheiro', 'PIX', 'Cartão de Crédito', 'Cartão de Débito']),
                    ])
                    ->icons([
                        'heroicon-o-banknotes' => 'Dinheiro',
                        'heroicon-o-currency-dollar' => 'PIX',
                        'heroicon-o-credit-card' => 'Cartão',
                    ])
                    ->size('md'),

                // Data de criação
                TextColumn::make('created_at')
                    ->label('Data do Pagamento')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->icon('heroicon-o-calendar')
                    ->color('primary'),

                // Data de atualização
                TextColumn::make('updated_at')
                    ->label('Atualizado em')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])

            ->filters([
                // Filtro por data
                \Filament\Tables\Filters\Filter::make('created_at')
                    ->label('Data')
                    ->form([
                        \Filament\Forms\Components\DatePicker::make('de')
                            ->label('De'),
                        \Filament\Forms\Components\DatePicker::make('ate')
                            ->label('Até'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['de'], fn($query) => $query->whereDate('created_at', '>=', $data['de']))
                            ->when($data['ate'], fn($query) => $query->whereDate('created_at', '<=', $data['ate']));
                    }),

                // Filtro por forma de pagamento
                \Filament\Tables\Filters\SelectFilter::make('forma_pagamento')
                    ->label('Forma de Pagamento')
                    ->options([
                        'Dinheiro' => 'Dinheiro',
                        'PIX' => 'PIX',
                        'Cartão de Crédito' => 'Cartão de Crédito',
                        'Cartão de Débito' => 'Cartão de Débito',
                    ]),
            ])

            ->recordActions([
                ViewAction::make()
                    ->label('Ver')
                    ->color('info'),
                EditAction::make()
                    ->label('Editar')
                    ->color('primary'),
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label('Excluir Selecionados'),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->striped()
            ->emptyStateIcon('heroicon-o-currency-dollar')
            ->emptyStateHeading('Nenhum faturamento encontrado')
            ->emptyStateDescription('Os pagamentos aparecem aqui quando forem recebidos.');
    }
}
