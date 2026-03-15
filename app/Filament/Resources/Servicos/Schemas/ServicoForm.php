<?php

namespace App\Filament\Resources\Servicos\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ServicoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nome')
                    ->required(),
                TextInput::make('preco')
                    ->required()
                    ->numeric(),
            ]);
    }
}
