<?php

namespace App\Filament\Resources\Faturamentos\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class FaturamentoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                
                TextInput::make('cliente')
                    ->label('Cliente')
                    ->required(),

                TextInput::make('agendamento_id')
                    ->numeric()
                    ->required(),

                TextInput::make('valor')
                    ->numeric()
                    ->required(),

                TextInput::make('forma_pagamento')
                    ->label('Forma de pagamento')
                    ->required(),
            ]);
    }
}