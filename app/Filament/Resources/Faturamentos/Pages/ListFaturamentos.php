<?php

namespace App\Filament\Resources\Faturamentos\Pages;

use App\Filament\Resources\Faturamentos\FaturamentoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFaturamentos extends ListRecords
{
    protected static string $resource = FaturamentoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
