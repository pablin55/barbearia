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
use Filament\Tables\Table;

class AgendamentosTable
{
    public static function configure(Table $table): Table
    {
        // Colunas
        $table = $table->columns([
            TextColumn::make('nome_cliente')->searchable(),
            TextColumn::make('telefone')->searchable(),
            TextColumn::make('email')->label('Email address')->searchable(),
            TextColumn::make('servico')->searchable(),
            TextColumn::make('preco')->numeric()->money('BRL')->sortable(),
            TextColumn::make('barbeiro')->searchable(),
            TextColumn::make('data_agendamento')->date()->sortable(),
            TextColumn::make('horario_agendamento')->time()->sortable(),
            TextColumn::make('status')->badge(),
            TextColumn::make('forma_pagamento')->searchable(),
            TextColumn::make('valor_pago')->numeric()->money('BRL')->sortable(),
            IconColumn::make('pago')
                ->label('Pagamento')
                ->boolean()
                ->trueIcon('heroicon-o-check-circle')
                ->falseIcon('heroicon-o-x-circle')
                ->trueColor('success')
                ->falseColor('danger'),
            TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
        ]);

        // Ações por registro
        $recordActions = [
            ViewAction::make(),
        ];

        // Apenas admins podem editar ou marcar pagamento
        if (auth()->user()?->role === 'admin') {
            $recordActions[] = EditAction::make();

            $recordActions[] = Action::make('marcar_pago')
                ->label('Marcar Pago')
                ->color('success')
                ->icon('heroicon-o-check')
                ->action(function ($record) {
                    $record->update(['pago' => true]);

                    Faturamento::create([
                        'agendamento_id' => $record->id,
                        'cliente' => $record->nome_cliente,
                        'valor' => $record->preco,
                        'forma_pagamento' => $record->forma_pagamento,
                    ]);
                });

            $recordActions[] = Action::make('marcar_nao_pago')
                ->label('Marcar Não Pago')
                ->color('danger')
                ->icon('heroicon-o-x-mark')
                ->action(function ($record) {
                    $record->update(['pago' => false]);
                });
        }

        // Toolbar (bulk actions)
        $toolbarActions = [];
        if (auth()->user()?->role === 'admin') {
            $toolbarActions = [
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ];
        }

        return $table
            ->recordActions($recordActions)
            ->toolbarActions($toolbarActions);
    }
}