<?php

namespace App\Filament\Resources\Barbeiros\Pages;

use App\Filament\Resources\Barbeiros\BarbeiroResource;
use Filament\Resources\Pages\EditRecord;

class EditBarbeiro extends EditRecord
{
    protected static string $resource = BarbeiroResource::class;

    /**
     * Remove a foto dos dados do formulário para evitar que tente carregá-la
     * A foto existente será mantida automaticamente no banco de dados
     */
    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Remove o campo foto para que não tente carregar a imagem existente
        // A foto antiga será mantida automaticamente se nenhuma nova for enviada
        unset($data['foto']);
        
        return $data;
    }
}
