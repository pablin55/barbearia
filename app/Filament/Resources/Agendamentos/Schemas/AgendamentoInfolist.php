<?php

namespace App\Filament\Resources\Agendamentos\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class AgendamentoInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nome_cliente')
                    ->label('Cliente'),
                TextEntry::make('telefone'),
                TextEntry::make('email')
                    ->label('E-mail')
                    ->placeholder('-'),
                TextEntry::make('servico')
                    ->label('Serviço')
                    ->formatStateUsing(fn ($state) => \App\Models\Agendamento::getServiceOptions()[$state]['name'] ?? ucwords(str_replace('_', ' ', $state))),
                TextEntry::make('preco')
                    ->label('Valor')
                    ->numeric()
                    ->money('BRL'),
                TextEntry::make('barbeiro')
                    ->label('Barbeiro')
                    ->placeholder('-'),
                TextEntry::make('data_agendamento')
                    ->label('Data')
                    ->date('d/m/Y'),
                TextEntry::make('horario_agendamento')
                    ->label('Horário')
                    ->time('H:i'),
                TextEntry::make('status')
                    ->label('Status')
                    ->badge()
                    ->colors([
                        'warning' => 'pending',
                        'info' => 'confirmed',
                        'success' => 'completed',
                        'danger' => 'cancelled',
                        'gray' => 'no_show',
                    ])
                    ->formatStateUsing(fn ($state) => match($state) {
                        'pending' => 'Pendente',
                        'confirmed' => 'Confirmado',
                        'completed' => 'Concluído',
                        'cancelled' => 'Cancelado',
                        'no_show' => 'Não Compareceu',
                        default => $state,
                    }),
                TextEntry::make('forma_pagamento')
                    ->label('Forma de Pagamento')
                    ->placeholder('-'),
                TextEntry::make('status_pagamento')
                    ->label('Status Pagamento')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match($state) {
                        'pending' => 'Pendente',
                        'paid' => 'Pago',
                        'failed' => 'Falhou',
                        'refunded' => 'Reembolsado',
                        default => $state,
                    }),
                TextEntry::make('stripe_payment_id')
                    ->label('ID Pagamento Stripe')
                    ->placeholder('-'),
                TextEntry::make('valor_pago')
                    ->label('Valor Pago')
                    ->numeric()
                    ->money('BRL')
                    ->placeholder('-'),
                TextEntry::make('observacoes')
                    ->label('Observações')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y H:i')
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->label('Atualizado em')
                    ->dateTime('d/m/Y H:i')
                    ->placeholder('-'),
                TextEntry::make('pago')
                    ->label('Pagamento')
                    ->formatStateUsing(fn ($state) => $state ? 'Pago ✅' : 'Não pago ❌'),
            ]);
    }
}
