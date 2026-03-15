<?php

namespace App\Filament\Resources\Barbeiros\Pages;

use App\Filament\Resources\Barbeiros\BarbeiroResource;
use Filament\Resources\Pages\ViewRecord;

class ViewBarbeiro extends ViewRecord
{
    protected static string $resource = BarbeiroResource::class;

    protected function getHeaderActions(): array
    {
        // Só admins veem botão de editar
        if (auth()->user()?->role === 'admin') {
            return [
                \Filament\Actions\EditAction::make(),
            ];
        }

        return [];
    }
}