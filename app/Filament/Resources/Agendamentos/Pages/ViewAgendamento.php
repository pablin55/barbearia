<?php

namespace App\Filament\Resources\Agendamentos\Pages;

use App\Filament\Resources\Agendamentos\AgendamentoResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\ViewRecord;
use App\Models\Faturamento;

class ViewAgendamento extends ViewRecord
{
    protected static string $resource = AgendamentoResource::class;

    protected function getHeaderActions(): array
    {
        $actions = [];

        // Verifica se é admin, vendedor ou barbeiro
        $canManage = in_array(auth()->user()?->role, ['admin', 'vendedor', 'barbeiro']);
        
        if ($canManage) {
            // Botão Pago - alterna entre Pago e Não Pago
            $actions[] = Action::make('toggle_pago')
                ->label(fn ($record) => $record->pago ? 'Não Pagou' : 'Pago')
                ->color(fn ($record) => $record->pago ? 'danger' : 'success')
                ->icon(fn ($record) => $record->pago ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle')
                ->requiresConfirmation()
                ->action(function ($record) {
                    if ($record->pago) {
                        // Marcar como não pago
                        $record->update(['pago' => false, 'status_pagamento' => 'pending']);
                        Faturamento::where('agendamento_id', $record->id)->delete();
                    } else {
                        // Marcar como pago
                        $record->update(['pago' => true, 'status_pagamento' => 'paid']);

                        Faturamento::updateOrCreate(
                            ['agendamento_id' => $record->id],
                            [
                                'cliente' => $record->nome_cliente,
                                'valor' => $record->preco,
                                'forma_pagamento' => $record->forma_pagamento ?? 'pix',
                            ]
                        );
                    }
                })
                ->visible(fn ($record) => in_array($record->status, ['pending', 'confirmed', 'completed']));

            // Botão Confirmar
            $actions[] = Action::make('confirmar')
                ->label('Confirmar')
                ->color('info')
                ->icon('heroicon-o-check-circle')
                ->requiresConfirmation()
                ->action(function ($record) {
                    $record->update(['status' => 'confirmed']);
                })
                ->visible(fn ($record) => $record->status === 'pending');

            // Botão Concluído
            $actions[] = Action::make('concluir')
                ->label('Concluído')
                ->color('success')
                ->icon('heroicon-o-check')
                ->requiresConfirmation()
                ->action(function ($record) {
                    $record->update(['status' => 'completed']);
                })
                ->visible(fn ($record) => in_array($record->status, ['pending', 'confirmed']));

            // Botão Cliente Cancelou
            $actions[] = Action::make('cancelar')
                ->label('Cliente Cancelou')
                ->color('danger')
                ->icon('heroicon-o-x-mark')
                ->requiresConfirmation()
                ->action(function ($record) {
                    $record->update(['status' => 'cancelled']);
                })
                ->visible(fn ($record) => in_array($record->status, ['pending', 'confirmed']));

            // Botão Não Compareceu
            $actions[] = Action::make('nao_compareceu')
                ->label('Não Compareceu')
                ->color('gray')
                ->icon('heroicon-o-user-minus')
                ->requiresConfirmation()
                ->action(function ($record) {
                    $record->update(['status' => 'no_show']);
                })
                ->visible(fn ($record) => in_array($record->status, ['pending', 'confirmed']));
        }

        // Somente admin vê Edit
        if (auth()->user()?->role === 'admin') {
            $actions[] = Actions\EditAction::make();
        }

        return $actions;
    }
}
