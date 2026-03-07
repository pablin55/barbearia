<?php

namespace App\Filament\Resources\Barbeiros\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BarbeiroForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nome')
                    ->required(),
                TextInput::make('telefone')
                    ->tel()
                    ->default(null),
            ]);
    }
}
