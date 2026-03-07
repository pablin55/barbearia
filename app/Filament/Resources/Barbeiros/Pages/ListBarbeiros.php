<?php

namespace App\Filament\Resources\Barbeiros\Pages;

use App\Filament\Resources\Barbeiros\BarbeiroResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\CreateAction;

class ListBarbeiros extends ListRecords
{
    protected static string $resource = BarbeiroResource::class;

    protected function getHeaderActions(): array
    {
        if (auth()->user()?->role !== 'admin') {
            return [];
        }

        return [
            CreateAction::make(),
        ];
    }
}