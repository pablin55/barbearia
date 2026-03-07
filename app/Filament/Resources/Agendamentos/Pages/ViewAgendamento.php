<?php

namespace App\Filament\Resources\Agendamentos\Pages;

use App\Filament\Resources\Agendamentos\AgendamentoResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use App\Models\Faturamento;

class ViewAgendamento extends ViewRecord
{
    protected static string $resource = AgendamentoResource::class;

    protected function getHeaderActions(): array
    {
        $actions = [
            // Botão Marcar como Pago
            Actions\Action::make('marcar_pago')
                ->label('Marcar como Pago')
                ->color('success')
                ->icon('heroicon-o-check-circle')
                ->visible(fn ($record) => !$record->pago)
                ->action(function ($record) {
                    $record->update(['pago' => true]);

                    Faturamento::updateOrCreate(
                        ['agendamento_id' => $record->id],
                        [
                            'cliente' => $record->nome_cliente,
                            'valor' => $record->preco,
                            'forma_pagamento' => $record->forma_pagamento ?? 'pix',
                        ]
                    );
                }),

            // Botão Marcar como Não Pago
            Actions\Action::make('marcar_nao_pago')
                ->label('Marcar como Não Pago')
                ->color('danger')
                ->icon('heroicon-o-x-circle')
                ->visible(fn ($record) => $record->pago)
                ->action(function ($record) {
                    $record->update(['pago' => false]);
                    Faturamento::where('agendamento_id', $record->id)->delete();
                }),
        ];

        // Somente admin vê Edit
        if (auth()->user()?->role === 'admin') {
            $actions[] = Actions\EditAction::make();
        }

        return $actions;
    }
}