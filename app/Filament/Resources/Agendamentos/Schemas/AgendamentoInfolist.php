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
                TextEntry::make('nome_cliente'),
                TextEntry::make('telefone'),
                TextEntry::make('email')
                    ->label('Email address')
                    ->placeholder('-'),
                TextEntry::make('servico'),
                TextEntry::make('preco')
                    ->numeric(),
                TextEntry::make('barbeiro')
                    ->placeholder('-'),
                TextEntry::make('data_agendamento')
                    ->date(),
                TextEntry::make('horario_agendamento')
                    ->time(),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('forma_pagamento')
                    ->placeholder('-'),
                TextEntry::make('status_pagamento')
                    ->badge(),
                TextEntry::make('stripe_payment_id')
                    ->placeholder('-'),
                TextEntry::make('valor_pago')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('observacoes')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                    TextEntry::make('pago')
                    ->label('Pagamento')
                    ->formatStateUsing(fn ($state) => $state ? 'Pago ✅' : 'Não pago ❌'),
            ]);
    }
}
