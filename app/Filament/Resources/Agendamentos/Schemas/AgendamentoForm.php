<?php

namespace App\Filament\Resources\Agendamentos\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AgendamentoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                
                TextInput::make('nome_cliente')
                    ->label('Cliente')
                    ->required(),

                TextInput::make('telefone')
                    ->tel()
                    ->required(),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->default(null),

                TextInput::make('servico')
                    ->required(),

                TextInput::make('preco')
                    ->required()
                    ->numeric(),

                TextInput::make('barbeiro')
                    ->label('Barbeiro')
                    ->default(null),

                DatePicker::make('data_agendamento')
                    ->required(),

                TimePicker::make('horario_agendamento')
                    ->required(),

                Select::make('status')
                    ->options([
                        'pending' => 'Pendente',
                        'confirmed' => 'Confirmado',
                        'completed' => 'Concluído',
                        'cancelled' => 'Cancelado',
                        'no_show' => 'Não compareceu',
                    ])
                    ->default('pending')
                    ->required(),

                TextInput::make('forma_pagamento')
                    ->label('Forma de pagamento')
                    ->default(null),

                Select::make('status_pagamento')
                    ->label('Status do pagamento')
                    ->options([
                        'pending' => 'Pendente',
                        'paid' => 'Pago',
                        'failed' => 'Falhou',
                        'refunded' => 'Reembolsado'
                    ])
                    ->default('pending')
                    ->required(),

                TextInput::make('stripe_payment_id')
                    ->label('ID do Stripe')
                    ->default(null),

                TextInput::make('valor_pago')
                    ->numeric()
                    ->default(null),

                Textarea::make('observacoes')
                    ->label('Observações')
                    ->default(null)
                    ->columnSpanFull(),

                Toggle::make('pago')
                    ->label('Cliente pagou?')
                    ->default(false),
            ]);
    }
}